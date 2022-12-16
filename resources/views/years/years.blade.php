@extends('layouts.master')

@section('title')
    Years

@stop

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@endsection

@section('title_page1')
    Years
@endsection

@section('title_page2')
    Years
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
                                Add Year
                            </button>


                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Year name</th>
                                        <th>The Year</th>
                                        <th>The Semester</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($years as $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->year_name }}</td>
                                            <td>{{ $item->year }}</td>
                                            <td>
                                                @foreach ($item->semesters as $sem)
                                                    {{ $sem['semester_name'] }}
                                                    <br>
                                                @endforeach
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $item->id }}" title="Edit"><i
                                                        class="fa fa-edit"></i></button>

                                                {{-- Delete_modal_College --}}
                                                <div class="modal fade" id="delete{{ $item->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content bg-danger">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Year</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('years.destroy', $item->id) }}"
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


                                        {{-- Edit_modal_Department --}}
                                        <div class="modal fade" id="edit{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Year</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- edit_form -->
                                                        <form action="{{ route('years.update', $item->id) }}"
                                                            method="POST">
                                                            {{ method_field('patch') }}
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Year Name:</label>
                                                                <input type="text" class="form-control" name="year_name"
                                                                    value="{{ $item->year_name }}" required>
                                                                <input id="id" type="hidden" name="id"
                                                                    class="form-control" value="{{ $item->id }}">
                                                                <label>The Year:</label>
                                                                <input type="text" class="form-control" name="year"
                                                                    value="{{ $item->year }}" required>

                                                                <label>Semester name</label>
                                                                <select class="select2bs4" multiple="multiple"
                                                                    data-placeholder="Choose..." name="semester_id[]">
                                                                    @foreach ($item->semesters as $sem)
                                                                        <option selected value="{{ $sem['id'] }}">
                                                                            {{ $sem['semester_name'] }}</option>
                                                                    @endforeach
                                                                    @foreach ($semesters as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->semester_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>


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

        {{-- Add_modal_Department --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Year</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('years.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="col-form-label"> Year Name:</label>
                                <input name="year_name" type="text" class="form-control" placeholder="Enter ..."
                                    required>

                                <label class="col-form-label">The Year:</label>
                                <input name="year" type="text" class="form-control" placeholder="Enter ..."
                                    required>


                                <label>Semester name</label>
                                <select class="select2bs4" multiple="multiple" data-placeholder="Choose..."
                                    name="semester_id[]">
                                    @foreach ($semesters as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->semester_name }}
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

            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <!-- Select2 -->
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })


        })
    </script>

@endsection
