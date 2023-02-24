@extends('layouts.master')

@section('title')
    Edit Department
@stop

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('title_page1')
    Edit Department
@endsection

@section('title_page2')
    Edit Department
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

                            <form action="{{ route('departments.update', $department->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input id="id" type="hidden" name="id" class="form-control"
                                        value="{{ $department->id }}">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Department Name:</label>
                                            <input type="text" class="form-control"name="department_name"
                                                value="{{ $department->department_name }}" required>

                                        </div>
                                        <div class="col-sm-6">
                                            <label>College name
                                                :</label>
                                            <select class="form-control" name="colleges_id">
                                                <option value="{{ $department->colleges->id }}">
                                                    {{ $department->colleges->college_name }}
                                                </option>
                                                @foreach ($colleges as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->college_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>



                                <!-- select -->
                                <div class="form-group">
                                    <label>Years:</label>
                                    <select class="select2bs4" multiple="multiple" data-placeholder="Choose..."
                                        name="clas_id[]" style="width: 100%;">
                                        @foreach ($department->classes as $sem)
                                            <option selected value="{{ $sem['id'] }}">
                                                {{ $sem['class_name'] }}</option>
                                        @endforeach
                                        @foreach ($classes as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->class_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br><br>
                                <div class="form-group">

                                    <button type="submit" class="btn btn-primary ">Save changes</button>
                                    <a class="btn btn-secondary" href="{{ route('departments.index') }}">Cancel</a>
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
