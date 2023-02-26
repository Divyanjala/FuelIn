@extends('layouts.station')
@section('title')
    <title>Station | Customer Request Management</title>
@endsection
@section('header')
    <div class="row  py-4">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <div class="col-lg-6 col-7">
                    <h6 class="h4 text-dark d-inline-block mb-0">Customer Request Management</h6>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card border-0 shadow">
        <div class="table-responsive py-4">
            <table id="employees" class="table align-items-center table-flush">
                <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Vehical Number</th>
                    <th>Request Qty (L)</th>
                    <th>Token</th>
                    <th>Status</th>
                    <th>Request Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                @foreach ($requests as $key => $obj)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $obj->customer->full_name }}</td>
                        <td>{{ $obj->customer->vehical_number }}</td>
                        <td>{{ $obj->qty }} L</td>
                        <td>{{ $obj->quota_index }}</td>
                        <td>
                            @switch( $obj->status)
                                @case(0)
                                <span class="badge badge-primary">Pending</span>
                                    @break
                                @case(1)
                                <span class="badge badge-success">Success</span>
                                    @break
                                @default
                                <span class="badge badge-danger">Expired</span>
                            @endswitch

                        <td>{{ date('Y-m-d', strtotime($obj->created_at)) }}</td>
                        <td>
                            {{-- <div class="dropdown no-arrow mb-1">
                                <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in"
                                     aria-labelledby="dropdownMenuButton" x-placement="bottom-start"
                                     style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">

                                    <a class="dropdown-item delete-customer" href="{{url('station/customer/'.$obj->id.'/vehicle')}}" class="btn btn-danger">
                                        Vehicle List
                                    </a>
                                    <a class="dropdown-item delete-customer" href="{{url('station/customer/edit/'.$obj->id)}}" class="btn btn-danger">
                                        Edit Info
                                    </a>

                                </div>
                            </div> --}}
                        </td>

                    </tr>
                @endforeach


            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#employees').dataTable({
                "language": {
                    "emptyTable": "No data available in the table",
                    "paginate": {
                        "previous": '<i class="fas fa-chevron-left text-dark"></i>',
                        "next": '<i class="fas fa-chevron-right text-dark"></i>'
                    },
                    "sEmptyTable": "No data available in the table"
                }
            });
        });



    </script>
@endsection
