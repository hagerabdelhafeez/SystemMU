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

                            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label> Employee name:</label>
                                            <input type="hidden" value="{{ $employee->id }}" name="id">
                                            <input name="employee_name" value="{{ $employee->employee_name }}"
                                                type="text" class="form-control" required>
                                        </div>

                                        <div class="col">
                                            <label>Gender name:</label>
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
                                        <div class="col">
                                            <label>Email:</label>
                                            <input name="email" type="email" value="{{ $employee->email }}"
                                                class="form-control" required>
                                        </div>
                                        <div class="col">
                                            <label>Password:</label>
                                            <input name="password" value="{{ $employee->password }}" type="password"
                                                class="form-control" required>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label> Mobile number:</label>
                                    <input name="mobile_number" value="{{ $employee->mobile_number }}" type="tel"
                                        class="form-control" required>
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

@endsection
