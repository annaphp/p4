@extends('layouts.master')

@section('title')
Incompleted Tasks
@endsection

@section('extra_navigation')

    <li><a href='/tasks/new/{{$project_id}}'> Add Task </a></li>
    <li><a href='/tasks/show/{{$project_id}}'>View Tasks</a></li>
    <li><a href='/tasks/show/incompleted/{{$project_id}}'>Incomplete Tasks</a></li>

@endsection

@section('content')
    <h1>Completed Tasks</h1>

    @if ($tasks->count()>0)
        @foreach($tasks as $task)

                <a href='/tasks/edit/{{$task->id}}'>Edit</a>
                <a href='/tasks/confirm-delete/{{$task->id}}'>Delete</a>
                <input type='hidden' name='task_id' value='{{ $task->id }}'>

                <div class='task'>
                <p>
                    {{ $task->description }} <br>
                    Task created on: {{$task->created_at->format('F j, Y')}}<br>
                    Task completed?
                    @if($task->completed ==1)
                        Yes
                    @else
                        No
                    @endif
                </p>
                </div>
        @endforeach
    @else
        <p>
            {{ Auth::user()->name }}, you don't have completed tasks!
        </p>
    @endif


@endsection
