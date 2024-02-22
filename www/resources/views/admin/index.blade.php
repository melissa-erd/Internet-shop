@extends('app')

@section('content')

    <h1>Admin</h1>
    <a href="{{ route('genres.index') }}">Genres</a><br>
    <a href="{{ route('productions.index') }}">Productions</a><br>
    <a href="{{ route('logout') }}">Logout</a>
@endsection
