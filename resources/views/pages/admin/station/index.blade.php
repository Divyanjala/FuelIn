@extends('layouts.admin')
@section('title')
<title>Admin- Station</title>
@endsection
@section('header')
    <div class="row  py-4">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <div class="col-lg-6 col-7">
                    <h6 class="h4 text-dark d-inline-block mb-0">Filling Station Management</h6>

                </div>
                <div class="col-lg-4 text-right">

                    {{-- <a href="{{ route('admin.plant.new') }}" class=" btn btn-sm btn-primary float-right">
                        <i class="fas fa-plus-circle"></i> Add New
                    </a> --}}
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
                        <th>Station name</th>
                        <th>District</th>
                        <th>Station Code</th>
                        <th>Created At</th>
                        <th>Approved By</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @foreach ($plants as $key => $plant)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $plant->name }}</td>
                            <td>{{ $plant->code }}
                            </td>
                            <td><b>$ </b>{{ number_format($plant->price, 2, '.', ',') }}</td>
                            <td>{{ $plant->created_at }}</td>
                            <td>{{$plant->approved_by?$plant->approve->name:'-'}}</td>
                            <td>
                                @switch($plant->status)
                                    @case(0)
                                        <span class="badge badge-pill badge-danger">Pending</span>
                                    @break

                                    @case(1)
                                        <span class="badge badge-pill badge-primary">Approve</span>
                                    @break
                                @endswitch
                            </td>
                            <td>
                                <div class="dropdown no-arrow mb-1">
                                    <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cog"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuButton" x-placement="bottom-start"
                                        style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        @if ($plant->status == 0)
                                            <a class="dropdown-item delete-customer" href="javascript:void(0)"
                                                class="btn btn-danger" title=""
                                                onclick="approve('{{ route('admin.plant.approve', $plant->id) }}')">
                                                <i class="fas fa-check text-primary"></i>&nbsp;&nbsp;&nbsp;Approve
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody> --}}
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


        function approve(url, title = "Do You Want To Approve It") {
            $.confirm({
                title: 'Are you sure,',
                content: title,
                autoClose: 'cancel|8000',
                type: 'green',
                theme: 'material',
                backgroundDismiss: false,
                backgroundDismissAnimation: 'glow',
                buttons: {
                    'Yes, Publish IT': function() {
                        window.location.href = url;
                        confirmButton: "Yes";
                        cancelButton: "Cancel";
                    },
                    cancel: function() {

                    },

                }
            });
        }
    </script>
@endsection
