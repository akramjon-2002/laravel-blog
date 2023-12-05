
@extends('personal.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Comments</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">main page</li>
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


                    <form action="{{route('personal.comment.update', $comment->id)}}" method="post" class="w-50">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">


                          <textarea name="message" class="form-control" cols="30" rows="10"> {{$comment->message}}</textarea>


                        </div>
                        @error('message')
                        <div class="text-danger mb-4" >These fields must be filled out</div>
                        @enderror
                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>


                </div>

                <div class="row">

                </div>

            </div>
        </section>

    </div>


@endsection
