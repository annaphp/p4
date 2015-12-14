@extends('layouts.master')

@section('title')
    Edit Task
@endsection
@section('extra_navigation')
<li><a href='/tasks/show/{{$task->project_id}}'> View Tasks </a></li>


@endsection


@section('content')

    <h1>Edit Current Task</h1>

    <form method='POST' action='/tasks/edit'>
        <input type='hidden' name='_token' value='{{ csrf_token() }}' >
        <input type='hidden' name='task_id' value='{{ $task->id }}'>

        <div class='form-block'>
            <label>Description:</label>
            <input type='text'  name='description'
                value='{{$task->description}}'
            >
        </div>

        <div class='form-block'>
            <label>Due Date is set to:</label>
            <input type="text" value='{{$due_date->format('F j, Y')}}' readonly>
            <label>Change Due Date?</label>
            @include('partials.date_input');
        </div>

        <div class='form-block'>
            <label>Completed:</label>
            <?php
            dump($task->completed);
          ?>
            @if($task->completed === 1)
                <input type="radio" name="completed" value="1" checked="checked">Yes<br>
                <input type="radio" name="completed" value="0">No<br>
            @else
                <input type="radio" name="completed" value="1">Yes<br>
                <input type="radio" name="completed" value="0" checked="checked">No<br>
            @endif



        </div>

        <button type="submit" class="">Save Changes</button>
    </form>

@endsection
