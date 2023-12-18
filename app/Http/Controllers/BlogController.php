<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::paginate(3);
        return view('blogs.index',['blogs'=> $blogs]);
    }

    public function show($id){
        $blog = Blog::find($id);

        $comments = $blog->comments;

        return view('blogs.show',['blog'=> $blog,'comments'=>$comments]);
    }

    public function create(){
        return view('blogs.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=> 'required|min:3|max:255',
            'body'=>'required|min:3|max:10000',
            'image'=>'required'

        ]);

        $blog = new Blog();

        $blog->title = $request->title;

        $blog->body = $request->body;

        $image = $request->file('image');

        $imgName = $image->hashName();

        $image->storeAs('images',$imgName);

        $blog ->image_url = $imgName;

        $blog->save();

        return back()->with('success',"Blog Create successfully");


    }

    public function edit($id){
        $blog = Blog::find($id);
        return view('blogs.edit',['blog' => $blog]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'title'=> 'required|min:3|max:255',
            'body'=>'required|min:3|max:10000',


        ]);

        $blog = Blog::find($id);

        $blog->title = $request->title;

        $blog->body = $request->body;

        $image = $request->file('image');

        if($image){

        $imgName = $image->hashName();

        $image->storeAs('images',$imgName);

        $blog ->image_url = $imgName;
        }

        $blog->save();

        return to_route('blogs.index')->with('success',"Blog Updated successfully");
    }

    public function destory($id){
        $blog = Blog::where('id',$id)->first();
        Storage::delete('images/'.$blog->image_url);
        $blog->delete();
        return to_route('blogs.index')->with('success',"Blog Delete successfully");
    }

    public function addComment(Request $request, $id){
        $blog = Blog::find($id);

        $comment = new Comment();
        $comment->comments = $request->comment;

        $blog->comments()->save($comment);

        return 'Add Comment Successfully';
    }
}
