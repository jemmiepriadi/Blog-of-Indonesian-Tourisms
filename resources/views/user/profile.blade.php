@extends('layouts.usermaster')

@section('content')
    <form action="/user/profile/{{auth()->user()->id}}/edit" method="POST">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ auth()->user()->name }}" aria-describedby="emailHelp" placeholder="Nama Depan" value="">
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                    <input class="form-control py-4" name="email" id="inputEmailAddress" type="email" value ="{{ auth()->user()->email }}" placeholder="Enter email address" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Phone</label>
                                    <input class="form-control" name="phone" id="exampleFormControlTextarea1" value="{{ auth()->user()->phone }}" rows="3"></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                             
    </form>
@stop