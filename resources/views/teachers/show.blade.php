@extends('layouts.master')

@section('title')
    Show
@stop

@section('css')

@endsection

@section('title_page1')
    Teacher Information
@endsection

@section('title_page2')
    Teacher Information
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
                                        <td>{{ $teacher->teacher_name }}</td>
                                        <th scope="row">Email</th>
                                        <td>{{ $teacher->email }}</td>
                                        <th scope="row">Gender</th>
                                        <td>{{ $teacher->genders->genders_name }}</td>

                                    </tr>

                                    <th scope="row">Nationality</th>
                                    <td> {{ $teacher->nationalities->nationalities_name }}</td>
                                    <th scope="row">Mobile number</th>
                                    <td> {{ $teacher->mobile_number }}</td>
                                    <th scope="row">Birth Date</th>
                                    <td> {{ $teacher->date_birth }}</td>



                                    <tr>
                                        <th scope="row">Blood Type</th>
                                        <td> {{ $teacher->blood->blood_name }}</td>
                                        <th scope="row">Degree</th>
                                        <td> {{ $teacher->degree }}</td>
                                        <th scope="row">Religon</th>
                                        <td> {{ $teacher->religons->religons_name }}</td>


                                    </tr>

                                    <tr>
                                        <th scope="row">Department</th>
                                        <td> {{ $teacher->departments->department_name }}</td>
                                        <th scope="row">Address</th>
                                        <td> {!! $teacher->Address !!}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Courses</th>
                                        <td colspan="5">
                                            @foreach ($teacher->courses as $sem)
                                                {{ $sem['course_name'] }}</option>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                            @endforeach
                                        </td>


                                    </tr>
                                </tbody>
                            </table>
                            <br><br>
                            <div class="form-group">
                                <a class="btn btn-info" href="{{ route('teachers.index') }}">Back</a>
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
