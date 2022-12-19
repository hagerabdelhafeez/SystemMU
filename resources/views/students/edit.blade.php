@extends('layouts.master')

@section('title')
    Edit Student
@stop

@section('css')

@endsection

@section('title_page1')
    Edit Student
@endsection

@section('title_page2')
    Edit Student
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

                            <form action="{{ route('students.update', $student->id) }}" method="POST" autocomplete="off">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label> Student name:</label>
                                            <input type="hidden" value="{{ $student->id }}" name="id">
                                            <input name="student_name" value="{{ $student->student_name }}" type="text"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label> Mobile number:</label>
                                            <input name="mobile_number" value="{{ $student->mobile_number }}" type="tel"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Gender:</label>
                                            <select class="form-control" name="genders_id">
                                                <option value="{{ $student->genders_id }}">
                                                    {{ $student->genders->genders_name }}
                                                </option>
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
                                            <input name="email" value="{{ $student->email }}" type="email"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Password:</label>
                                            <input name="password" value="{{ $student->password }}" type="password"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Student ID:</label>
                                            <input name="student_no" value="{{ $student->student_no }}" type="text"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label>Birth Date:</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" name="date_birth"
                                                    value="{{ $student->date_birth }}" required />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label>Blood Type:</label>
                                            <select class="form-control" name="blood_id">
                                                <option value="{{ $student->blood_id }}">
                                                    {{ $student->blood->blood_name }}
                                                </option>
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
                                                <option value="{{ $student->religons_id }}">
                                                    {{ $student->religons->religons_name }}
                                                </option>
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
                                                <option value="{{ $student->nationalities_id }}">
                                                    {{ $student->nationalities->nationalities_name }}
                                                </option>
                                                @foreach ($nationalities as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nationalities_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-4">
                                            <label for="colleges_id">Colleges:</label>
                                            <select class="form-control" name="colleges_id">
                                                <option value="{{ $student->colleges_id }}">
                                                    {{ $student->colleges->college_name }}
                                                </option>
                                                @foreach ($colleges as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->college_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-4">
                                            <label>Departments:</label>
                                            <select class="form-control" name="departments_id">
                                                <option value="{{ $student->departments_id }}">
                                                    {{ $student->departments->department_name }}
                                                </option>
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
                                            <label>Classes:</label>
                                            <select class="form-control" name="class_id">
                                                <option value="{{ $student->class_id }}">
                                                    {{ $student->classes->class_name }}
                                                </option>
                                                @foreach ($classes as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->class_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col">
                                            <label>Academic Year:</label>
                                            <select class="form-control" name="years_id">
                                                <option value="{{ $student->years_id }}">
                                                    {{ $student->years->year_name }}</option>
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
                                    <label>Address:</label>
                                    <textarea name="Address" class="form-control" rows="2" required>{!! $student->Address !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary ">Save changes</button>
                                    <a class="btn btn-secondary" href="{{ route('students.index') }}">Cancel</a>
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
