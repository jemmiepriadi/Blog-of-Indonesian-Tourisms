@extends('layouts.master')

@section('content')
                
    @foreach($bloglist as $blog)
        Title : {{$blog->title}} </br>
        Category :@if($blog->category_id == 1) Foods @endif </br>
        Description : {{$blog->description}}</br>
        <div style="white-space:nowrap;"><img src="{{ $blog->image }}"></div> </br></br>
        
    @endforeach

@stop