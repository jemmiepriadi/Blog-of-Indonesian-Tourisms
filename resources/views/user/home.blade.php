@extends('layouts.usermaster')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content h1">
            Welcome Mr. {{ auth()->user()->name }}!
        </div>
    </div>
@stop