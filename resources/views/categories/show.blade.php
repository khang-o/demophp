@extends('layout')
@section('title','detail')
@section('content')
    <h1>{{ $category->name }}</h1>
   
    <a href="{{ route('categories.index') }}">Back to list</a>
@endsection
