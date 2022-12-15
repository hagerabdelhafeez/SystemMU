@extends('layouts.master')

@section('title')
    Add New
@stop

@section('css')

@endsection

@section('title_page1')
    Add New
@endsection

@section('title_page2')
    Add New
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

                            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label> Title:</label>
                                    <input name="title" type="text" class="form-control" placeholder="Enter ... "
                                        required>
                                </div>
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Abstract:</label>
                                    <textarea name="abstract" class="form-control" rows="3" placeholder="Enter ..." required></textarea>
                                </div>
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Details:</label>
                                    <textarea name="details" class="form-control" rows="3" placeholder="Enter ..." required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Photo:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="photos" accept="image/*">
                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success ">Add New</button>
                                    <a class="btn btn-secondary" href="{{ route('news.index') }}">Cancel</a>
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
    <!-- bs-custom-file-input -->
    <script type="text/javascript"
        src="{{ URL::asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
