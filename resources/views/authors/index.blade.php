@extends('layout.tabslayout')

@section('content')
    <h1>Authors</h1>
    @if (!empty($authors))
    <table class="table">
        <thead>
        <td>#</td>
        <td>Name</td>
        <td><a href="/authors/books">Books</a></td>
        <td><a href="/authors/rating">Average books rating</a></td>
        </thead>

        @foreach($authors as $key => $author)
            <tr>
                <td>{{++$key}}</td>
                <td><a href="/authors/{{$author->id}}">{{$author->name}} {{$author->surname}}</a></td>
                <td>
                    @if (!empty($author->books))
                        {{$author->books}}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if ($author->rating > 0)
                        {{$author->rating}}
                    @else
                        -
                    @endif
                </td>
            </tr>
        @endforeach

    </table>
    @else
        <p>Sorry, we did not find the authors</p>
    @endif
@endsection