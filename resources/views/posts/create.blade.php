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



    {!! Form::open(["action"=>"PostsController@store",'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label("title","عنوان مطلب") !!}
        {!! Form::text("title",null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label("description","متن مطلب") !!}
        {!! Form::textarea("description",null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label("file","تصویرمطلب") !!}
        {!! Form::file("file",['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit("ذخیره",null,['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    {{--<form action="/posts" method="post">--}}
    {{--<input type="text" name="title" placeholder="عنوان مطلب">--}}
    {{--<textarea name="description" placeholder="مطلب خود را وارد کنید">--}}
    {{--</textarea>--}}
    {{--<button type="submit" name="submit">--}}
    {{--ذخیره--}}
    {{--</button>--}}
    {{--</form>--}}
@endsection