@extends('layout.app')
@section('content')
<ul style="">
    @foreach($posts as $post)
        <a href="{{route('posts.show',$post->id)}}">
           {{ $post->title}}
           </a>
        <br/>
        @endforeach
</ul>
<a style="display: block" href="{{route('posts.create')}}">افزودن پست</a>

@endsection