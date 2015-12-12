@extends('layouts.master')

@section('title')
Projects
@endsection

@section('content')

    @if (Auth::check())
         Hello, {{ Auth::user()->name }}!
    @else
        Hello, stranger!
    @endif

    <h1>All Projects</h1>
    @if ($projects->count()>0)

     @foreach($projects as $project)
           <a href='projects/confirm-delete/{{$project->id}}'> Delete</a>
           <a href='/tasks/show/{{$project->id}}'>

            <div class='project'> {{ $project->title}} </div>

             {{--   <input type='hidden' name='project_id' value='{{ $project->id }}'> --}}
             {{--  <input type='sumbit' value='{{ $project->title}}'> --}}

         </a>



       </br>

   @endforeach
   @else
    <p>
        {{ Auth::user()->name }}, you don't have any created projects!
    </p>
    @endif
@endsection
