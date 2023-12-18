@extends('layouts.master')

@section('title','WEBHUB | Blogs')

@section('navbar')
@parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <h1 class="my-3">All Blogs</h1>

                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif

                @foreach ($blogs as $blog)
                    <div class="card my-3">
                        <img src="{{asset('images/'.$blog->image_url)}}" class="card-img-top " style="width:100%;height:300px" alt="">
                        <div class="card-body">
                            <a href="{{route('blogs.show',['id' => $blog->id])}}">
                                <h2 class="card-title">
                                    {{$blog->title}}
                                </h2>
                            </a>
                        </div>
                    </div>
                @endforeach

                {{$blogs-> links()}}

            </div>
        </div>
    </div>
@endsection
