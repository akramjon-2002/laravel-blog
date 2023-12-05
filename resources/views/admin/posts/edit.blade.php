@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('post.index')}}">Posts</a></li>
                            <li class="breadcrumb-item active">Edit post</li>

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
                    <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data" class="col-4">
                        @csrf
                        @method('PATCH')
                        <div class="form-group col-md-6">
                            <label>Select category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                        {{$category->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" value="{{$post->title}}" class="form-control" name="title" placeholder="Post name">
                        </div>
                        @error('title')
                        <div class="text-danger mb-4">{{$message}}</div>
                    @enderror
                </div>


                <div class="col-md-8">
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="summernote" name="content" class="form-control">{{$post->content}}</textarea>
                    </div>
                    @error('content')
                    <div class="text-danger mb-4">{{$message}}</div>
                    @enderror
                </div>



                {{--для фото--}}
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputFile">Update preview photo</label>

                            <div class="w-50 mb-2">
                                <img src="{{asset('storage/'.$post->preview_image)}}" alt="preview_image" class="w-50">

                            </div>

                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="preview_image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('preview_image')
                    <div class="text-danger mb-4">{{$message}}</div>
                    @enderror
                </div>
                {{-- для фото --}}


                {{--для фото--}}
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputFile">Update main photo</label>

                            <div class="w-50 mb-2">
                                <img src="{{asset('storage/'.$post->main_image)}}" alt="main_image" class="w-50">

                            </div>

                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="main_image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('main_image')
                    <div class="text-danger mb-4">{{$message}}</div>
                    @enderror
                </div>
                {{-- для фото --}}



                {{--        для тега            --}}

                <div class="col-md-12">
                    <div class="form-group w-25">
                        <label>Теги</label>
                        <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тег" style="width: 100%;">
                            @foreach($tags as $tag)
                                @php
                                    $selected = $post->tags && is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray());
                                @endphp
                                <option {{ $selected ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>



                {{--        для тега            --}}

                <div class="col-md-1">
                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary btn-block" value="Update">
                    </div>
                </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
