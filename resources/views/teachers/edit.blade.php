@extends('layouts.master')

@section('title')
    Edit Teacher
@stop

@section('css')

@endsection

@section('title_page1')
    Edit Teacher
@endsection

@section('title_page2')
    Edit Teacher
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

                            <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label> Teacher name:</label>
                                            <input type="hidden" value="{{$teacher->id}}" name="id">
                                            <input name="teacher_name" value="{{ $teacher->teacher_name }}" type="text"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label> Mobile number:</label>
                                            <input name="mobile_number" value="{{ $teacher->mobile_number }}" type="tel"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Gender name:</label>
                                            <select class="form-control" name="genders_id">
                                                <option value="{{ $teacher->genders_id }}">
                                                    {{ $teacher->genders->genders_name }}</option>
                                                @foreach ($genders as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->genders_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label>Email:</label>
                                            <input name="email" type="email" value="{{ $teacher->email }}"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Password:</label>
                                            <input name="password" value="{{ $teacher->password }}" type="password"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Courses:</label>
                                            <input name="" type="text" class="form-control">
                                        </div>
                                    </div>


                                </div>
                                <div class="form-group">
                                    <label>Address:</label>
                                    <textarea name="Address" class="form-control" rows="2" required>{!! $teacher->Address !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary ">Save changes</button>
                                    <a class="btn btn-secondary" href="{{ route('teachers.index') }}">Cancel</a>
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
