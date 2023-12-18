@extends('layouts.master')

@section('title','WEBHUB |Edit Blogs')

@section('navbar')
@parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto mt-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Blogs</h2>
                    </div>

                    

                    <div class="card-body">
                        <form action="{{route('blogs.update',['id' => $blog->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" placeholder="Title" value="{{$blog->title}} " id="title" name="title" class="form-control">
                            </div>
                            @error('title')
                                <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="mb-3">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" class="form-control" placeholder="Description"  rows="10">{{$blog->body}}</textarea>
                            </div>
                            @error('body')
                                <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" placeholder="Image" id="image" name="image" class="form-control">
                                <img src="{{asset('images/'.$blog->image_url)}}" class="card-img-top " style="width:100%;height:300px" alt="">
                            </div>
                            @error('image')
                                <p class="text-danger">{{$message}}</p>
                            @enderror

                            <button class="btn btn-dark" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
