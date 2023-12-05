@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit user</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('user.index')}}">Users</a></li>
                            <li class="breadcrumb-item active">Edit user</li>

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
                    <form action="{{route('admin.user.update', $user->id)}}" method="post" class="col-4">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Name</label>

                            <input type="text" class="form-control" name="name" placeholder="category name" value="{{$user->name}}" >

                        </div>
                        @error('title')
                        <div class="text-danger mb-4" >{{$message}}</div>
                        @enderror

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" value="{{$user->email}}" class="form-control" name="email" placeholder="email">
                        </div>
                        @error('email')
                        <div class="text-danger mb-4" >{{$message}}</div>
                        @enderror

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Role</label>
                                <select class="form-control" name="role"  data-placeholder="Select role" >
                                    @foreach($roles as $id => $role)
                                        <option  {{ $id == $user->role ? 'selected' : "" }}  value="{{$id}}">{{$role}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
   <div class="col-md-6">
                            <div class="form-group ">
                                <input type="hidden" name="user_id" value="{{$user->id}}" >
                        </div>


                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
