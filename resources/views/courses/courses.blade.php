@extends('layouts.master')

@section('title')
    Courses
@stop

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('title_page1')
    Courses
@endsection

@section('title_page2')
    Courses
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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                Add Course
                            </button>
                            <br><br>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course name</th>
                                        <th>Course code</th>
                                        <th>Course credit hours</th>
                                        <th>College name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($courses as $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->course_name }}</td>
                                            <td>{{ $item->course_code }}</td>
                                            <td>{{ $item->courses_credit_hours }}</td>
                                            <td>{{ $item->colleges->college_name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $item->id }}" title="Edit"><i
                                                        class="fa fa-edit"></i></button>

                                                {{-- Delete_modal --}}
                                                <div class="modal fade" id="delete{{ $item->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content bg-danger">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Course</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('courses.destroy', $item->id) }}"
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

                                                <button type="text" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $item->id }}" title="Delete"><i
                                                        class="fa fa-trash"></i></button>

                                            </td>
                                        </tr>
                                        {{-- Edit_modal --}}
                                        <div class="modal fade" id="edit{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Course</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- edit_form -->
                                                        <form action="{{ route('courses.update', $item->id) }}"
                                                            method="POST">
                                                            {{ method_field('patch') }}
                                                            @csrf
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <label> Course name:</label>
                                                                        <input name="course_name" type="text"
                                                                            class="form-control"
                                                                            value="{{ $item->course_name }}" required>
                                                                        <input id="id" type="hidden" name="id"
                                                                            class="form-control"
                                                                            value="{{ $item->id }}">
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <label> Course code:</label>
                                                                        <input name="course_code" type="text"
                                                                            class="form-control"
                                                                            value="{{ $item->course_code }}" required>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <label>credit hours:</label>
                                                                        <input name="courses_credit_hours" type="text"
                                                                            class="form-control"
                                                                            value="{{ $item->courses_credit_hours }}"required>
                                                                    </div>
                                                                </div>
                                                                <label>College name
                                                                    :</label>
                                                                <select class="form-control" name="colleges_id">
                                                                    <option value="{{ $item->colleges->id }}">
                                                                        {{ $item->colleges->college_name }}
                                                                    </option>
                                                                    @foreach ($colleges as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->college_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>



                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Edit</button>
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

        {{-- Add_modal --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Course</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('courses.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label> Course name:</label>
                                        <input name="course_name" type="text" class="form-control" required>
                                    </div>
                                    <div class="col-4">
                                        <label> Course code:</label>
                                        <input name="course_code" type="text" class="form-control" required>
                                    </div>
                                    <div class="col-4">
                                        <label>credit hours:</label>
                                        <input name="courses_credit_hours" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <label>College name:</label>
                                <select class="form-control" name="colleges_id">
                                    <option selected>Choose...</option>
                                    @foreach ($colleges as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->college_name }}
                                        </option>
                                    @endforeach
                                </select>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Add</button>
                                </div>
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
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

@endsection
