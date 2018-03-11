@extends('layout.tabslayout')

@section('content')
    <h1>Books</h1>
    <table class="table">
        <thead>
        <td>#</td>
        <td>Name</td>
        <td>Rating</td>
        <td>Author</td>
        <td>Genre</td>
        </thead>
        @foreach($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td><a href="/books/{{$book->id}}">{{$book->name}}</a></td>
                <td>{{$book->rating}}</td>
                <td><a href="/author/{{$book->author_id}}">{{$book->author_name}} {{$book->author_surname}}</a></td>
                <td><a href="/genre/{{$book->genre_id}}">{{$book->genre_name}}</a></td>
            </tr>
        @endforeach
    </table>
@endsection