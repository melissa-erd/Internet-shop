@extends('app')

@section('content')

    <h1>User</h1><br>
    <h3>Login: {{ $user->login }}</h3><br>
    <h3>Name: {{ $user->name }}</h3><br>

    <a href="{{ route('logout') }}">Logout</a>
@endsection
