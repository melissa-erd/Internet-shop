@extends('app')
@section('content')
<h1>Genres</h1>
<a href="{{ route('admin.index') }}">Back</a>
    <form action="{{ route('genres.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="name">
        <input type="submit">
    </form>

    <table>
        <thead>
        <tr>
            <th>Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($genres as $genre)
            <tr>
                <td>{{ $genre->name }}</td>
            </tr>
            <tr>
                <td><a href="{{ route('genres.destroy', $genre) }}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
