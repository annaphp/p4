@extends('layouts.master')

@section('title')
Projects
@endsection

@section('content')

    <h3>All Projects</h3>

        @if ($projects->count()>0)

            @foreach($projects as $project)
                <br>
                <a href='projects/confirm-delete/{{$project->id}}'> Delete</a>
                <br>
                <a href='/tasks/show/{{$project->id}}'>
                <li id="project">{{ $project->title}} </li>
                </a>
                <br>
            @endforeach
        @else
            <p>
                {{ Auth::user()->name }}, you don't have any created projects!
            </p>
        @endif
@endsection
