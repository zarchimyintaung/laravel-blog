@extends('layouts.master')

@section('title','WEBHUB | Blogs')

@section('navbar')
@parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">

                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif

                <h1 class="my-3">{{$blog->title}}</h1>
                <img src="{{asset('images/'.$blog->image_url)}}" class="card-img-top " style="width:100%;height:300px" alt="">
                <p class="text-justify">
                    {{$blog->body}}
                    <strong>{{Carbon\Carbon::parse($blog->created_at)->format('d/m/y')}}</strong>
                </p>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Comments</h2>
                            @foreach ($comments as $comment)
                                <div class="alert alert-info">
                                    {{$comment->comments}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <form action="{{route('blogs.comment',['id'=>$blog->id])}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="cmt">Comment</label>
                        <textarea name="comment" id="cmt" class="form-control" rows="5"></textarea>
                        <button type="submit" class="btn btn-dark mb-3">Submit</button>
                    </div>
                </form>
                <a href="{{route('blogs.edit',['id'=>$blog->id])}}" class="btn btn-primary">Edit</a>
                <a href="{{route('blogs.destory',['id'=>$blog->id])}}" class="btn btn-danger">Delete</a>

            </div>
        </div>
    </div>
@endsection
