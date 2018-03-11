@extends('layout.tabslayout')

@section('content')
    <h1>Authors</h1>
    @if (!empty($authors))
    <table class="table">
        <thead>
        <td>#</td>
        <td>Name</td>
        <td>Books</td>
        <td>Genre prevail</td>
        <td>Average books rating</td>
        </thead>

        @foreach($authors as $author)
            <tr>
                <td>{{$author->id}}</td>
                <td><a href="/author/{{$author->id}}">{{$author->name}} {{$author->surname}}</a></td>
                <td>
                    @if (!empty($author->books))
                        {{$author->books}}
                    @else
                        -
                    @endif
                </td>
                <td>-</td>
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