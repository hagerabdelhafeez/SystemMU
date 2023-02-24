@extends('layouts.master')

@section('title')
    Add Common Courses
@stop

@section('css')

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('title_page1')
    Add Common Courses
@endsection

@section('title_page2')
    Add Common Courses
@endsection

@section('content')
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

                            <form action="{{ route('commons.store') }}" method="POST" autocomplete="off">
                                @csrf

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label>Colleges:</label>
                                            <select class="form-control" name="colleges_id">
                                                <option selected>Choose...</option>
                                                @foreach ($departments as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->colleges->college_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label>Departments:</label>
                                            <select class="form-control" name="departments_id">
                                                <option selected>Choose...</option>
                                                @foreach ($departments as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->department_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label>Semesters:</label>
                                            <select class="form-control" name="semesters_id">
                                                <option selected>Choose...</option>
                                                @foreach ($semesters as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->semester_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label> Academic Years:</label>
                                            <select class="form-control" name="years_id">
                                                <option selected>Choose...</option>
                                                @foreach ($years as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->year_name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label>Courses:</label>
                                    <select class="select2bs4" multiple="multiple" data-placeholder="Choose..."
                                        name="course_id[]" style="width: 100%;">
                                        @foreach ($courses as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->course_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- <select class="form-control" name="course_id[]">
                                        <option selected>Choose...</option>
                                        @foreach ($courses as $item)
                                            <option value="">
                                                {{ $item->course_name }}
                                            </option>
                                        @endforeach
                                    </select> --}}

                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success ">Add Courses</button>
                                    <a class="btn btn-secondary" href="{{ route('commons.index') }}">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
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
