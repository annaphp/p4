@extends('layouts.master')

@section('title')
    Create New Task
@endsection


@section('content')

    <h3>New task:</h3>

    <form method='POST' action='/tasks/new'>
        <input type='hidden' name='_token' value='{{ csrf_token() }}' >
        <input type='hidden' name='project_id' value='{{ $project_id }}'>

        <div>
            <label>Description:</label>
            <textarea  name='description' class='task_field'></textarea>
        </div>

        <div>
            <label>Due Date:</label>
            @include('partials.date_input');
        </div>

        <button type="submit" class='btn btn-primary'>Add Task</button>
    </form>

@endsection
