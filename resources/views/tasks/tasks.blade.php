@extends('layouts.master')

@section('title')
Tasks
@endsection

@section('extra_navigation')
<li><a href='/tasks/new/{{$project_id}}'> Add Task </a></li>

@endsection

@section('content')


    <h1>All Tasks</h1>
    @if ($tasks->count()>0)

     @foreach($tasks as $task)

           <a href='/tasks/edit/{{$task->id}}'>Edit</a>
           <a href='/tasks/confirm-delete/{{$task->id}}'>Delete</a>
            <input type='hidden' name='task_id' value='{{ $task->id }}'>

           <div class='task'> {{ $task->description }} </div>

       </br>

   @endforeach
   @else
    <p>
        {{ Auth::user()->name }}, you don't have any created tasks!
    </p>
    @endif
@endsection
