@extends('layouts.usermaster')

@section('content')
    <form action="/user/blog/create/{{ auth()->user()->id }}" method="POST">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descriptions</label>
                                    <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Categories</label>
                                        <select class="form-control" name="name" id="exampleFormControlSelect1">
                                            <option value='Beach'>Beach</option>
                                            <option value='Mountain'>Mountain</option>
                                            <option value='Foods'>Foods</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Image Link</label>
                                    <input class="form-control" name="image" id="exampleFormControlTextarea1"rows="3" placeholder="Enter Image Link Here"></input>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                             
    </form>
@stop