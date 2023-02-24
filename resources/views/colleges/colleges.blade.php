@extends('layouts.master')

@section('title')
    Colleges

@stop

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">


@endsection

@section('title_page1')
    Colleges
@endsection

@section('title_page2')
    Colleges
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
                            @if ($message = Session::get('Warning'))
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @endif
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                Add College
                            </button>
                            <br><br>

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>College name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($colleges as $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->college_name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $item->id }}" title="Edit"><i
                                                        class="fa fa-edit"></i></button>
                                                {{-- Delete_modal_College --}}
                                                <div class="modal fade" id="delete{{ $item->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content bg-danger">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete college</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('colleges.destroy', $item->id) }}"
                                                                    method="post">
                                                                    {{ method_field('Delete') }}
                                                                    @csrf
                                                                    Are you Sure Of The Deleting Process ?
                                                                    <input id="id" type="hidden" name="id"
                                                                        class="form-control" value="{{ $item->id }}">

                                                                    <div class="modal-footer ">
                                                                        <button type="button" class="btn btn-outline-light"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-outline-light">Delete
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                </div> <!-- /.modal -->
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $item->id }}" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>


                                        {{-- Edit_modal_College --}}
                                        <div class="modal fade" id="edit{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit College</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- edit_form -->
                                                        <form action="{{ route('colleges.update', $item->id) }}"
                                                            method="POST">
                                                            {{ method_field('patch') }}
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">College Name:</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleInputEmail1" name="college_name"
                                                                    value="{{ $item->college_name }}" required>
                                                                <input id="id" type="hidden" name="id"
                                                                    class="form-control" value="{{ $item->id }}">
                                                            </div>


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        </div> <!-- /.modal -->
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

        {{-- Add_modal_College --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add College</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('colleges.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> College
                                    Name:
                                </label>
                                <input name="college_name" type="text" class="form-control is-valid"
                                    id="inputSuccess" placeholder="Enter ..." required>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div> <!-- /.modal -->
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

            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,


            });
        });
    </script>


@endsection
