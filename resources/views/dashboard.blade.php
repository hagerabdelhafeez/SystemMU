@extends('layouts.master')

@section('title')
    Mashreq University
@stop

@section('css')

@endsection

@section('title_page1')
    Dashboard
@endsection

@section('title_page2')
    Dashboard
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\Student::count() }}</h3>

                            <p>Students Number</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-user-graduate"></i>
                        </div>
                        <a href="{{ route('students.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ \App\Models\Teacher::count() }}</h3>

                            <p>Teachers Number</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        </div>
                        <a href="{{ route('teachers.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ \App\Models\College::count() }}</h3>

                            <p>Colleges Number</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-university"></i>
                        </div>
                        <a href="{{ route('colleges.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ \App\Models\Department::count() }}</h3>

                            <p>Departments Number</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fa fa-building"></i>
                        </div>
                        <a href="{{ route('departments.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->


            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3">The last operations on the system</h3>
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item"><a class="nav-link active" href="#tab_1"
                                        data-toggle="tab">Students</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Teachers</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Scientific
                                        Affairs</a></li>

                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="table-responsive mt-15">
                                        <table style="text-align: center"
                                            class="table center-aligned-table table-hover mb-0">
                                            <thead>
                                                <tr class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>Student Name</th>
                                                    <th>Student ID</th>
                                                    <th>Department</th>
                                                    <th>Class</th>
                                                    <th>Created at</th>
                                                    <th>Updated at</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $student->student_name }}</td>
                                                        <td>{{ $student->student_no }}</td>
                                                        <td>{{ $student->departments->department_name }}</td>
                                                        <td>{{ $student->classes->class_name }}</td>
                                                        <td class="text-info">{{ $student->created_at->diffForhumans() }}
                                                        </td>
                                                        <td>{{ $student->updated_at->diffForhumans() }}</td>

                                                    @empty
                                                        <td colspan="7">..... There is no data ......</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="table-responsive mt-15">
                                        <table style="text-align: center"
                                            class="table center-aligned-table table-hover mb-0">
                                            <thead>
                                                <tr class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>Teacher Name</th>
                                                    <th>Degree</th>
                                                    <th>Department</th>
                                                    <th>Gender</th>
                                                    <th>Created at</th>
                                                    <th>Updated at</th>
                                                </tr>
                                            </thead>

                                            @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $teacher->teacher_name }}</td>
                                                        <td>{{ $teacher->degree }}</td>
                                                        <td>{{ $teacher->departments->department_name }}</td>
                                                        <td>{{ $teacher->genders->genders_name }}</td>
                                                        <td class="text-info">
                                                            {{ $teacher->created_at->diffForhumans() }}</td>
                                                        <td>{{ $teacher->updated_at->diffForhumans() }}</td>
                                                    @empty
                                                        <td colspan="7">..... There is no data ......</td>
                                                    </tr>
                                                </tbody>
                                            @endforelse
                                        </table>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
                                    <div class="table-responsive mt-15">
                                        <table style="text-align: center"
                                            class="table center-aligned-table table-hover mb-0">
                                            <thead>
                                                <tr class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>Employee Name</th>
                                                    <th>Email</th>
                                                    <th>Gender</th>
                                                    <th>Created at</th>
                                                    <th>Updated at</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse(\App\Models\Employee::latest()->take(5)->get() as $employee)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $employee->employee_name }}</td>
                                                        <td>{{ $employee->email }}</td>
                                                        <td>{{ $employee->genders->genders_name }}</td>
                                                        <td class="text-info">
                                                            {{ $employee->created_at->diffForhumans() }}</td>
                                                        <td>{{ $employee->updated_at->diffForhumans() }}</td>
                                                    @empty
                                                        <td colspan="7">..... There is no data ......</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- ./card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->




    </section>

    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('js')

@endsection
