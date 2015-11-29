@extends('layouts.master')

@section('title')
    Create New Project
@endsection


@section('content')

    <h1>Add a new project</h1>



    <form method='POST' action='/projects/new'>

        <input type='hidden' name='_token' value='{{ csrf_token() }}' >

        <div class='form-block'>
            <label>Title:</label>
            <input type='text' id='title' name='title'
                   value='{{ old('title','Clean Bathroom') }}'
            >
        </div>

        <div class='form-block'>
            <label for='title'>Due Date:</label>
            <input
                type='date'
                id='due_date'
                name="due_date"
                value='{{ old('due_date','12/23/2015') }}'
            >
        </div>

        <button type="submit" class="">Add Project</button>
    </form>

@endsection
