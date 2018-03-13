@extends('layout.tabslayout')

@section('content')
    <h1>Genres</h1>
    @if (!empty($genres))
        <table class="table">
            @foreach($genres as $genre)
                <tr>
                    <td>{{$genre->id}}</td>
                    <td>
                        <a href="/genre/{{$genre->id}}">{{$genre->name}}</a>

                        @if (!empty($genre->authors))
                            <table class="table table--inside">
                                <thead>
                                <td>#</td>
                                <td>Authors name</td>
                                <td><a href="#">Average books rating</a></td>
                                </thead>

                                @foreach($genre->authors as $key => $author)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td><a href="/author/{{$author->author_id}}">{{$author->author_name}} {{$author->author_surname}}</a></td>
                                        <td class="td--center">
                                            @if ($author->author_rating > 0)
                                                {{$author->author_rating}}
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

                    </td>
                </tr>
            @endforeach

        </table>
    @else
        <p>Sorry, we did not find the genres</p>
    @endif
@endsection