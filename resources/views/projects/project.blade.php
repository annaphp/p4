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
            <input type='text' name='title'
                   value='{{ old('title','Clean Bathroom') }}'            >
        </div>
        <div class='form-block'>
            <label for='title'>Due Date:</label>
                @include('partials.date_input');
        </div>

        <button type="submit" class="">Add Project</button>
    </form>

@endsection
