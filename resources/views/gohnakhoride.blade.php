@extends('layout.app')
@section('content')

<p>
    سلام
</p>
<h1>
    گه نخورید
</h1>
<ul>
@foreach ($peoples as $people)


<li>
    {{$people}} گه نخور
</li>

@endforeach



</ul>

@endsection
