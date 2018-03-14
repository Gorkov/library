@extends('layout.tabslayout')

@section('content')
    <h1>Genres</h1>
    @if (!empty($genres))
        <table class="table">
            @foreach($genres as $genre)
                <tr>
                    <td class="genre__link">{{$genre->id}}</td>
                    <td>
                        <a href="/genre/{{$genre->id}}">{{$genre->name}}</a>

                        @if (!empty($genre->authors))
                            <table class="table table--inside">
                                <thead>
                                <td>#</td>
                                <td>Authors name</td>
                                <td><a href="/genres/sort/" ref="{{$genre->id}}">Average books rating</a></td>
                                </thead>
                                <tbody id="genre_{{$genre->id}}">
                                    @foreach($genre->authors as $key => $author)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td><a href="/author/{{$author->author_id}}">{{$author->author_name}} {{$author->author_surname}}</a></td>
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

                    </td>
                </tr>
            @endforeach

        </table>
    @else
        <p>Sorry, we did not find the genres</p>
    @endif
@endsection