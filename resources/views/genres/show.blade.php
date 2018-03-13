@extends('layout.tabslayout')

@section('content')
    <h3>Genre #{{$genre->id}}</h3>
    <ul>
        <legend>{{$genre->name}}</legend>
        <blockquote>There might be some information on here about this genre</blockquote>
    </ul>
@endsection