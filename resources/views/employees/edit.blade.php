@extends('layouts.master')

@section('title')
    Edit Employee
@stop

@section('css')

@endsection

@section('title_page1')
    Edit Employee
@endsection

@section('title_page2')
    Edit Employee
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

                            <form action="{{ route('employees.update', $employee->id) }}" method="POST" autocomplete="off">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label> Employee name:</label>
                                            <input type="hidden" value="{{ $employee->id }}" name="id">
                                            <input name="employee_name" value="{{ $employee->employee_name }}"
                                                type="text" class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label> Mobile number:</label>
                                            <input name="mobile_number" value="{{ $employee->mobile_number }}"
                                                type="tel" class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Gender:</label>
                                            <select class="form-control" name="genders_id">
                                                <option value="{{ $employee->genders_id }}">
                                                    {{ $employee->genders->genders_name }}</option>
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
                                            <input name="email" value="{{ $employee->email }}" type="email"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Password:</label>
                                            <input name="password" value="{{ $employee->password }}"type="password"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Birth Date:</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" name="date_birth"
                                                    value="{{ $employee->date_birth }}" required />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label>Blood Type:</label>
                                            <select class="form-control" name="blood_id">
                                                <option value="{{ $employee->blood_id }}">
                                                    {{ $employee->blood->blood_name }}
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
                                                <option value="{{ $employee->religons_id }}">
                                                    {{ $employee->religons->religons_name }}</option>
                                                @foreach ($religons as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->religons_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label>Nationality:</label>
                                            <select class="form-control" name="nationalities_id">
                                                <option value="{{ $employee->nationalities_id }}">
                                                    {{ $employee->nationalities->nationalities_name }}</option>
                                                @foreach ($nationalities as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nationalities_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Address:</label>
                                    <textarea name="Address" class="form-control" rows="2" required>{!! $employee->Address !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary ">Save changes</button>
                                    <a class="btn btn-secondary" href="{{ route('employees.index') }}">Cancel</a>
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
