@extends('layouts.master')

@section('title')
    Create New Task
@endsection


@section('content')

    <h1>Add a new task</h1>

    <form method='POST' action='/tasks/new'>
        <div>{{ $project_id}}</div>
        <input type='hidden' name='_token' value='{{ csrf_token() }}' >
        <input type='hidden' name='project_id' value='{{ $project_id }}'>

        <div class='form-block'>
            <label>Description:</label>
            <input type='text'  name='description'
                value='{{ old('description','buy soap') }}'
            >
        </div>

        <div class='form-block'>
            <label>Due Date:</label>
            @include('partials.date_input');
        </div>

        <button type="submit" class="">Add Task</button>
    </form>

@endsection
