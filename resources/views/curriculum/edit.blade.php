@extends('layouts.master')

@section('title')
    Edit Curriculum
@stop

@section('css')

@endsection

@section('title_page1')
    Edit Curriculum
@endsection

@section('title_page2')
    Edit Curriculum
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

                            <form action="{{ route('curricula.update', $curriculum->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input id="id" type="hidden" name="id" class="form-control"
                                        value="{{ $curriculum->id }}">


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Department name</label>
                                                <select class="form-control" name="departments_id">
                                                    <option value="{{ $curriculum->departments->id }}">
                                                        {{ $curriculum->departments->department_name }}
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
                                                    <option value="{{ $curriculum->years->id }}">
                                                        {{ $curriculum->years->year_name }}
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
                                                    <option value="{{ $curriculum->semesters->id }}">
                                                        {{ $curriculum->semesters->semester_name }}
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
                                                <select class="form-control" name="courses_id">
                                                    <option value="{{ $curriculum->courses->id }}">
                                                        {{ $curriculum->courses->course_name }}
                                                    </option>
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
                                    <a class="btn btn-secondary" href="{{ route('curricula.index') }}">Cancel</a>


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

@endsection
