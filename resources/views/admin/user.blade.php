@extends('layouts.adminmaster')

@section('content');
    <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- penamaan $siswa bebas, bisa $siswaz -->
                <tbody>
                        @foreach($userlist as $user)
                        <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="/admin/user/{{$user->id}}/delete" class="btn btn-danger btn-sn" onclick="return confirm('Are You Sure You Want to Delete This User with id {{ $user->id }}?')">Delete</a>
                        </td>
                        </tr>
                        @endforeach
                </tbody>
        </table>
@stop