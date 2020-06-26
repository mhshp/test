@extends('layout.app')
@section('content')
    <h1>{{$post->title}}</h1>
    <div class="text-justify">
        {{$post->content}}
    </div>
    <a href="{{route('posts.edit',$post->id)}}">ویرایش</a>
    <br/>
    {!! Form::model($post,['method'=>'DELETE',"action"=>["PostsController@destroy",$post->id]]) !!}
    <div class="form-group mt-5">
        {!! Form::submit("حذف",null,['class'=>'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}

@endsection