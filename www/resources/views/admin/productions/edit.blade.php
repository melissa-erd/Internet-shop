@extends('app')
@section('content')

    <h1>Edit production</h1>
    <form action="{{ route('productions.update', $production) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="file" name="picture" value="{{ $production->picture }}">
        <input type="text" name="name" value="{{ $production->name }}">
        <input type="date" name="date" value="{{ $production->date }}">
        <input type="text" name="age" value="{{ $production->age }}">
        <input type="text" name="price" value="{{ $production->price }}">
        <select name="genre[]" multiple>
            @foreach($genres as $genre)
                <option @foreach($production->genres as $g) @if($genre->id == $g->id) selected @endif @endforeach value="{{$genre->id}}">{{$genre->name}}</option>
            @endforeach
        </select>
        <input type="submit">
    </form>

@endsection
