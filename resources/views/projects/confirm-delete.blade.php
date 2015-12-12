@extends('layouts.master')

@section('title')
    Delete Project
@endsection


@section('content')

    <h1>Delete selected project</h1>

    <div>
        <p> Are you sure you want to delete this project?</p>
        <a href='/projects'> No go back to tasks</a>
        <a href='/projects/delete/{{$projects->id}}'> Yes </a>
    </div>

@endsection
