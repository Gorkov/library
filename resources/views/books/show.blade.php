@extends('layout.tabslayout')

@section('content')
    <h3>Book #{{$book->id}}</h3>
    <ul>
        <legend>{{$book->name}}</legend>
        <blockquote>There might be some information on here about this book</blockquote>
    </ul>
@endsection