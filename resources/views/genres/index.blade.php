@extends('layout.tabslayout')

@section('content')
    <h1>Genres</h1>
    @if (!empty($genres))
        <table class="table">
            <thead>
            <td>#</td>
            <td>Name</td>
            </thead>

            @foreach($genres as $genre)
                <tr>
                    <td>{{$genre->id}}</td>
                    <td><a href="/genre/{{$genre->id}}">{{$genre->name}}</a></td>
                </tr>
            @endforeach

        </table>
    @else
        <p>Sorry, we did not find the genres</p>
    @endif
@endsection