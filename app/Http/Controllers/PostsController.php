<?php

namespace App\Http\Controllers;

use App\Events\PostViewEvent;
use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->get();
       // return $posts;
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = new Post();
        if($file = $request->file('file'))
        {
            $name = $file->getClientOriginalName();
            $file->move('images',$name);
            $post->path=$name;
        }
        $post->title = $request->title;
        $post->content = $request->description;
        $post->user_id=  '1';
        $post->save();
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::findOrFail($id);
      event(new PostViewEvent($post));
     return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrfail($id);
        $user = Auth::user();
        if($user->can('update',$post))
        {
            return  view('posts.edit',compact('post'));
        }
    else
    {
        echo "شما اجازه ویرایش این پست را ندارید";
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePostRequest $request, $id)
    {
        $post = Post::findOrfail($id);
        $post->title=$request->title;
        $post->content=$request->description;
        $post->save();
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrfail($id);
        $post->delete();
        return redirect('posts');
    }
    public function save()
    {
        $posts = new Post();
        $posts->title= ("پست شماره یک");
        $posts->matn = ("این متن پست شماره یک است");
        $posts->save();
    }


    public function delete()
    {
        Post::where('id',7)->delete();
    }
    public function restore()
    {
       $posts = Post::onlyTrashed()->restore();
        return $posts;
    }
}


