@extends('admin.layout.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Image</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Image</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Upload User Image</h3>
                        </div>
                        @if (session()->has('msg'))
                        <div class="alert alert-success m-3">
                            {{session()->get('msg')}}
                            <button class="close" type="button" data-dismiss="alert">&times;</button>
                        </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" enctype="multipart/form-data" action="{{route('upload')}}">
                            @csrf
                            <div class="card-body">
                                <!-- Tabs content -->
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="general">
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputFile">Upload:</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                        id="customFile" name="image">
                                                    <label class="custom-file-label"
                                                        for="customFile">upload profile pic</label>
                                                </div>
                                            </div>
                                            <span class="text-danger">
                                                @error('image')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div> 
                                    </div>
                                </div>
                                <!-- Tabs content -->
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Image</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <div class="avatar-upload">
                        <div class="avatar-preview">
                            @if(!empty($data->image))
                            <div id="imagePreview" style="background-image: url({{asset('backend/user/'.$data->image)}});">
                            </div>
                            @else
                            <div id="imagePreview" style="background-image: url({{asset('backend/dist/img/user2-160x160.jpg')}});">
                            </div>
                            @endif
                        </div>
                        
                    </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
</div>
</section>
</div>
@endsection
