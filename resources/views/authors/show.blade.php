@extends('layout.tabslayout')

@section('content')
    <h3>Author #{{$author->id}}</h3>
    <ul>
        <legend>{{$author->name}} {{$author->surname}}</legend>
        <blockquote>There might be some information on here about this author</blockquote>
    </ul>

    @if($similar_authors->count() > 0)
        <h4>Maybe you will be interested (similar in genre)</h4>
        <ul>
            @foreach($similar_authors as $key => $simAuthor)
                {{ $similar_authors->first()->author_id !== $simAuthor->author_id ? ' ,' : ''}}
                <a href="/author/{{$simAuthor->author_id}}">{{$simAuthor->author_name}} {{$simAuthor->author_surname}}</a>
            @endforeach
        </ul>
    @endif
@endsection