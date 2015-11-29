@extends('layouts.master')

@section('title')
Welcome to Projects and Tasks
@endsection

@section('content')

    @if (Auth::check())
         Hello, {{ Auth::user()->name }}!
    @else
        Hello, stranger! 
    @endif
@endsection
