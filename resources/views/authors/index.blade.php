@extends('layout.tabslayout')

@section('content')
    <h1>Authors</h1>
    <table class="table">
        <thead>
        <td>#</td>
        <td>Name</td>
        <td>Genre prevail</td>
        <td>Average rating</td>
        </thead>
        @foreach($authors as $author)
            <tr>
                <td>{{$author->id}}</td>
                <td><a href="/author/{{$author->id}}">{{$author->name}} {{$author->surname}}</a></td>
                <td>-</td>
                <td>-</td>
            </tr>
        @endforeach
    </table>
@endsection