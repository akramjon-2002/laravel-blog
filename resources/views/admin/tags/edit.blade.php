@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit tag</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('tag.index')}}">Tags</a></li>
                            <li class="breadcrumb-item active">Edit tag</li>

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <form action="{{route('tag.update', $tag->id)}}" method="post" class="col-4">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Title</label>

                                <input type="text" class="form-control" name="title" placeholder="category name" value="{{$tag->title}}" >
                        </div>
                        @error('title')
                        <div class="text-danger mb-4" >These fields must be filled out</div>
                        @enderror
                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
