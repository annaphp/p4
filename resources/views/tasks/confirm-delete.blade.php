@extends('layouts.master')

@section('title')
    Delete Task
@endsection


@section('content')

    <h1>Delete selected task</h1>

    <div>
        <p> Are you sure you want to delete this task?</p>
        <a href='/tasks/show/{{$task->project_id}}'> No go back to tasks</a>
        <a href='/tasks/delete/{{$task->id}}'> Yes </a>
    </div>

@endsection
