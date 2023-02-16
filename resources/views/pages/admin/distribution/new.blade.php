@extends('layouts.admin')
@section('header')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">NEW ORDER</h1>

    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{ route('admin.distribution.store') }}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label for="station_id"><b>Station</b></label>
                                        <select class="form-control" id="station_id" name="station_id">
                                            @foreach ($stations as $station)
                                                <option value="{{ $station->id }}">{{ $station->name }} -
                                                    {{ $station->code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="email"><b>Date</b></label>
                                        <input type="date" class="form-control form-control-alternative" name="issue_date"
                                            id="issue_date" aria-describedby="helpId" placeholder="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="des"><b>Description</b></label>
                                        <textarea name="des" class="form-control form-control-alternative" cols="30" rows="3" required></textarea>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">

                                        <h6 class="text-center responsive-moblile">
                                            <button id="product-btn" type="button" class="btn btn-secondary di"
                                                data-toggle="modal" data-target="#exampleModal">
                                                + Add Product
                                            </button>
                                            <button id="submit-btn" type="submit" class="btn btn-primary di" disabled>
                                                Save Order
                                            </button>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Product name </th>
                                                    <th scope="col">Qty (Liter)</th>
                                                </tr>
                                            </thead>
                                            <tbody id="products">


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="first_name"><b>Fuel Type</b></label>
                        <select class="form-control" id="fuel_type_id" name="fuel_type_id">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }} - {{ $type->code }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qty"><b>Qty (Liter)</b></label>
                        <input type="number" class="form-control form-control-alternative" name="qty" id="qty"
                            aria-describedby="helpId" placeholder="" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" onclick="addProduct()" class="btn btn-primary">Add</button>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>

        function addProduct() {
            qty=$('#qty').val();
            if (qty=='') {
                return false;
            }
            pro_id=$('#fuel_type_id').val();
            console.log(pro_id);
            $.ajax({
            url: "{{ route('admin.fuel-type.get') }}?id=" +pro_id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            success: function (response) {

                if (response!=[]) {
                    $('#submit-btn').attr('disabled',false);
                    html = ' <tr>'+
                        '  <th scope="row">1</th>'+
                        ' <td>'+response['name']+'</td>'+
                        ' <td>'+qty+'</td>'+
                        ' <input type="hidden" class="form-control" name="fuel_type_id[]" value="'+pro_id+'">'+
                        ' <input type="hidden" class="form-control" name="qty[]"'+' value="'+qty+'">'+
                        ' <input type="hidden" class="form-control" name="price[]"'+' value="'+response['price']+'">'+
                        ' </tr>';
                    $("#products").append(html);
                    $('#exampleModal').modal('toggle');
                }
            }
        });

        }
    </script>
@endsection
