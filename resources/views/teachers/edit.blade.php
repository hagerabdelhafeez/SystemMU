@extends('layouts.master')

@section('title')
    Edit Teacher
@stop

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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

                            <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" autocomplete="off">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label> Teacher name:</label>
                                            <input type="hidden" value="{{ $teacher->id }}" name="id">
                                            <input name="teacher_name" value="{{ $teacher->teacher_name }}" type="text"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label> Mobile number:</label>
                                            <input name="mobile_number" value="{{ $teacher->mobile_number }}" type="tel"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Gender:</label>
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
                                            <select class="select2bs4" multiple="multiple" data-placeholder="Choose..."
                                                name="course_id[]" style="width: 100%;">
                                                @foreach ($teacher->courses as $sem)
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

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label>Birth Date:</label>
                                                <div class="input-group date" id="reservationdate"
                                                    data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input"
                                                        data-target="#reservationdate" name="date_birth"
                                                        value="{{ $teacher->date_birth }}" required />
                                                    <div class="input-group-append" data-target="#reservationdate"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label>Blood Type:</label>
                                                <select class="form-control" name="blood_id">
                                                    <option value="{{ $teacher->blood_id }}">
                                                        {{ $teacher->blood->blood_name }}</option>
                                                    @foreach ($bloods as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->blood_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-4">
                                                <label>Religon :</label>
                                                <select class="form-control" name="religons_id">
                                                    <option value="{{ $teacher->religons_id }}">
                                                        {{ $teacher->religons->religons_name }}</option>
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
                                                    <option value="{{ $teacher->nationalities_id }}">
                                                        {{ $teacher->nationalities->nationalities_name }}</option>
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
                                                    <option value="{{ $teacher->departments_id }}">
                                                        {{ $teacher->departments->department_name }}</option>
                                                    @foreach ($departments as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->department_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label>Degree:</label>
                                                <input name="degree" value="{{ $teacher->degree }}" type="text"
                                                    class="form-control" required>
                                            </div>
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
