@extends('layout.app')
@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" >
                {{$error}}
                <br/>
            </div>
        @endforeach
    @endif
    {!! Form::model($post,['method'=>'PATCH',"action"=>["PostsController@update",$post->id]]) !!}
    <div class="form-group">
        {!! Form::label("title","عنوان مطلب") !!}
        {!! Form::text("title",$post->title,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label("description","متن مطلب") !!}
        {!! Form::textarea("description",$post->content,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit("بروزرسانی",null,['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

@endsection