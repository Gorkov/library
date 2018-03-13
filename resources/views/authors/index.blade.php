@extends('layout.tabslayout')

@section('content')
    <h1>Authors</h1>
    @if (!empty($authors))
    <table class="table">
        <thead>
        <td>#</td>
        <td>Authors name</td>
        <td>
            <a href="/authors/sort/" ref="books">Books</a>
        </td>
        <td><a href="/authors/sort/" ref="rating">Average books rating</a></td>
        </thead>
        <tbody id="authors">
            @foreach($authors as $key => $author)
                <tr>
                    <td>{{++$key}}</td>
                    <td><a href="/author/{{$author->id}}">{{$author->name}} {{$author->surname}}</a></td>
                    <td class="td--center">
                        @if (!empty($author->books))
                            {{$author->books}}
                        @else
                            -
                        @endif
                    </td>
                    <td class="td--center">
                        @if ($author->rating > 0)
                            {{$author->rating}}
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Sorry, we did not find the authors</p>
    @endif
@endsection