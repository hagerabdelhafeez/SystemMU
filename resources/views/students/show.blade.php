@extends('layouts.master')

@section('title')
    Show
@stop

@section('css')

@endsection

@section('title_page1')
    Student Information
@endsection

@section('title_page2')
    Student Information
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
                                        <td>{{ $student->student_name }}</td>
                                        <th scope="row">Email</th>
                                        <td>{{ $student->email }}</td>
                                        <th scope="row">Gender</th>
                                        <td>{{ $student->genders->genders_name }}</td>

                                    </tr>

                                    <th scope="row">Nationality</th>
                                    <td> {{ $student->nationalities->nationalities_name }}</td>
                                    <th scope="row">Student ID</th>
                                    <td> {{ $student->student_no }}</td>
                                    <th scope="row">Birth Date</th>
                                    <td> {{ $student->date_birth }}</td>



                                    <tr>
                                        <th scope="row">Blood Type</th>
                                        <td> {{ $student->blood->blood_name }}</td>
                                        <th scope="row">College</th>
                                        <td> {{ $student->colleges->college_name }}</td>
                                        <th scope="row">Religon</th>
                                        <td> {{ $student->religons->religons_name }}</td>


                                    </tr>

                                    <tr>
                                        <th scope="row">Department</th>
                                        <td> {{ $student->departments->department_name }}</td>
                                        <th scope="row">Academic Year</th>
                                        <td> {{ $student->years->year_name }}</td>
                                        <th scope="row">Class</th>
                                        <td> {{ $student->classes->class_name }}</td>


                                    </tr>

                                    <tr>
                                        <th scope="row">Address</th>
                                        <td> {!! $student->Address !!}</td>
                                        <th scope="row">Mobile number</th>
                                    <td> {{$student->mobile_number }}</td>
                                    </tr>

                                </tbody>
                            </table>
                            <br><br>
                            <div class="form-group">
                                <a class="btn btn-info" href="{{ route('students.index') }}">Back</a>
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
