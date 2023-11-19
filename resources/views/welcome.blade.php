@extends('layout')
@section('title',"Home Page")
@section('content')
<div class="container mt-5">
    @auth
    <table class="table table-hover ">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
            <td>
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                <form method="POST" action="{{ route('user.delete', $user->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                </form>
            </td>

        </tr>
        @endforeach
    </table>
    @endauth
</div>
@endsection