@extends('layouts.usermaster')

@section('content')
    <div class="col-6">
            <a href="/user/blog/create" class="btn btn-primary float-right">
                Tambah Data Siswa
            </a>
    </div>
    <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- penamaan $siswa bebas, bisa $siswaz -->
                <tbody>
                    @foreach($bloglist as $blog)
                        <tr>
                        <td><a href="/user/blog/{{ $blog->id }}/edit">{{$blog->title}}</a></td>
                        <td>
                            <a href="/user/blog/{{$blog->id}}/delete" class="btn btn-danger btn-sn" onclick="return confirm('Are You Sure You Want to Delete This blog with id {{ $blog->id }}?')">Delete</a>
                        </td>
                        </tr>
                    @endforeach
            </tbody>
    </table>
@stop