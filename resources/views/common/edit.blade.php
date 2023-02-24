@extends('layouts.master')

@section('title')
    Edit Common Courses
@stop

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('title_page1')
    Edit Common Courses
@endsection

@section('title_page2')
    Edit Common Courses
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

                            <form action="{{ route('commons.update', $common->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input id="id" type="hidden" name="id" class="form-control"
                                        value="{{ $common->id }}">


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Department name</label>
                                                <select class="form-control" name="departments_id">
                                                    <option value="{{ $common->departments->id }}">
                                                        {{ $common->departments->department_name }}
                                                    </option>
                                                    @foreach ($departments as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->department_name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Academic Years</label>
                                                <select class="form-control" name="years_id">
                                                    <option value="{{ $common->years->id }}">
                                                        {{ $common->years->year_name }}
                                                    </option>
                                                    @foreach ($years as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->year_name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Semester name</label>
                                                <select class="form-control" name="semesters_id">
                                                    <option value="{{ $common->semesters->id }}">
                                                        {{ $common->semesters->semester_name }}
                                                    </option>
                                                    @foreach ($semesters as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->semester_name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Course name</label>
                                                <select class="select2bs4" multiple="multiple" data-placeholder="Choose..."
                                                    name="course_id[]" style="width: 100%;">
                                                    @foreach ($common->courses as $sem)
                                                        <option selected value="{{ $sem['id'] }}">
                                                            {{ $sem['course_name'] }}</option>
                                                    @endforeach
                                                    @foreach ($courses as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->course_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <button type="submit" class="btn btn-primary ">Save changes</button>
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
