@extends('layouts.master')

@section('title')
    Teachers
@stop

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('title_page1')
    Teachers
@endsection

@section('title_page2')
    Teachers
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-warning">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <a class="btn btn-success" href="{{ route('teachers.create') }}"> Add Teacher</a>


                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Teacher name</th>
                                        <th>Mobile number</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Courses</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($teachers as $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->teacher_name }}</td>
                                            <td>{{ $item->mobile_number }}</td>
                                            <td>{{ $item->genders->genders_name }}</td>
                                            <td>{{ $item->Address }}</td>
                                            <td></td>
                                            <td>

                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('teachers.edit', $item->id) }}"><i
                                                        class="fa fa-edit"></i></a>


                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $item->id }}" title="Delete"><i
                                                        class="fa fa-trash"></i></button>

                                                {{-- Delete_modal --}}
                                                <div class="modal fade" id="delete{{ $item->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content bg-danger">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Teacher</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('teachers.destroy', $item->id) }}"
                                                                    method="post">
                                                                    {{ method_field('Delete') }}
                                                                    @csrf
                                                                    Are you Sure Of The Deleting Process ?
                                                                    <input id="id" type="hidden" name="id"
                                                                        class="form-control" value="{{ $item->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-light"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-outline-light">Delete
                                                                </button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </section>
    <!-- /.content -->
@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ URL::asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ URL::asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ URL::asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}">
    </script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>


@endsection
