@extends('layout.tabslayout')

@section('content')
    <h1>Books</h1>
    @if (!empty($books))
        <table class="table">
            <thead>
            <td>#</td>
            <td>Name</td>
            <td>Author</td>
            <td>Genre</td>
            <td>Rating</td>
            </thead>

            @foreach($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td><a href="/books/{{$book->id}}">{{$book->name}}</a></td>
                    <td><a href="/author/{{$book->author_id}}">{{$book->author_name}} {{$book->author_surname}}</a></td>
                    <td><a href="/genre/{{$book->genre_id}}">{{$book->genre_name}}</a></td>
                    <td>{{$book->rating}}</td>
                </tr>
            @endforeach

        </table>
    @else
        <p>Sorry, we did not find the books</p>
    @endif
@endsection