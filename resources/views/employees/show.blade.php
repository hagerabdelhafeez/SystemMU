@extends('layouts.master')

@section('title')
    Show
@stop

@section('css')

@endsection

@section('title_page1')
    Employee Information
@endsection

@section('title_page2')
Employee Information
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
                            <table class="table table-striped" style="text-align:center">

                                <tbody>
                                    <tr>
                                        <th scope="row"> Name</th>
                                        <td>{{  $employee->employee_name}}</td>
                                        <th scope="row">Email</th>
                                        <td>{{ $employee->email}}</td>
                                        <th scope="row">Gender</th>
                                        <td>{{  $employee->genders->genders_name }}</td>

                                    </tr>

                                    <th scope="row">Nationality</th>
                                    <td> {{ $employee->nationalities->nationalities_name }}</td>
                                    <th scope="row">Mobile number</th>
                                    <td> {{$employee->mobile_number }}</td>
                                    <th scope="row">Birth Date</th>
                                    <td> {{ $employee->date_birth}}</td>



                                    <tr>
                                        <th scope="row">Blood Type</th>
                                        <td> {{  $employee->blood->blood_name }}</td>
                                        <th scope="row">Religon</th>
                                        <td> {{  $employee->religons->religons_name }}</td>
                                        <th scope="row">Address</th>
                                        <td> {!! $employee->Address !!}</td>


                                    </tr>



                                    <tr>

                                    </tr>

                                </tbody>
                            </table>
                            <br><br>
                            <div class="form-group">
                                <a class="btn btn-info" href="{{ route('employees.index') }}">Back</a>
                            </div>
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

    </section>
    <!-- /.content -->



@endsection

@section('js')

@endsection
