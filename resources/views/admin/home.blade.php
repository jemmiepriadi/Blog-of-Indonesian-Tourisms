@extends('layouts.adminmaster')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content h1">
            Welcome for Admin Mr. {{ auth()->user()->name }}!
        </div>
    </div>
@stop