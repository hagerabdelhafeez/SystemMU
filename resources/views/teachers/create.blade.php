@extends('layouts.master')

@section('title')
    Add Teacher
@stop

@section('css')

@endsection

@section('title_page1')
    Add Teacher
@endsection

@section('title_page2')
    Add Teacher
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

                            <form action="{{ route('teachers.store') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label> Teacher name:</label>
                                            <input name="teacher_name" type="text" class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label> Mobile number:</label>
                                            <input name="mobile_number" type="tel" class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Gender:</label>
                                            <select class="form-control" name="genders_id">
                                                <option selected>Choose...</option>
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
                                            <input name="email" type="email" class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Password:</label>
                                            <input name="password" type="password" class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Courses:</label>
                                            <input name="" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label>Birth Date:</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" name="date_birth" required />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label>Blood Type:</label>
                                            <select class="form-control" name="blood_id">
                                                <option selected>Choose...</option>
                                                @foreach ($bloods as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->blood_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-4">
                                            <label>Religon:</label>
                                            <select class="form-control" name="religons_id">
                                                <option selected>Choose...</option>
                                                @foreach ($religons as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->religons_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label>Nationality:</label>
                                            <select class="form-control" name="nationalities_id">
                                                <option selected>Choose...</option>
                                                @foreach ($nationalities as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nationalities_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-4">
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
                                        <div class="col-4">
                                            <label>Degree:</label>
                                            <input name="degree" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Address:</label>
                                    <textarea name="Address" class="form-control" rows="2" required></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success ">Add Teacher</button>
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
    <script>
        //Date picker
        $('#reservationdate').datetimepicker({
            format: ' YYYY-MM-DD'
        });

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('YYYY-MM-DD', {
            'placeholder': 'YYYY-MM-DD'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('YYYY-MM-DD', {
            'placeholder': 'YYYY-MM-DD'
        })
    </script>
@endsection
