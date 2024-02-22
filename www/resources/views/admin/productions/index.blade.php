@extends('app')
@section('content')

    <h1>Productions</h1>
    <a href="{{ route('admin.index') }}">Back</a>
    <form action="{{ route('productions.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="picture">
        <input type="text" name="name" placeholder="name">
        <input type="date" name="date" placeholder="date">
        <input type="text" name="age" placeholder="age">
        <input type="text" name="price" placeholder="price">
        <select name="genre[]" multiple>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
        <input type="submit">
    </form>

    <table>
        <thead>
        <tr>
            <th>Picture</th>
            <th>Name</th>
            <th>Date</th>
            <th>Age</th>
            <th>Price</th>
            <th>Genre</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productions as $production)
            <tr>
                <td><img width="200px" src="{{ Storage::URL($production->picture) }}" alt=""></td>
                <td>{{ $production->name }}</td>
                <td>{{ $production->date }}</td>
                <td>{{ $production->age }}</td>
                <td>{{ $production->price }}</td>
                <td>{{ $production->genres()->implode('name', ', ') }}</td>
                <td><a href="{{ route('productions.destroy', $production) }}">Delete</a></td>
                <td><a href="{{route('productions.edit', $production)}}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
