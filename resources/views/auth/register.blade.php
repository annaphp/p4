@extends('layouts.master')

@section('content')


    <h1>Register</h1>

    <form method='POST' action='/register'>
        {!! csrf_field() !!}

        <div>
            <label for='name'>Name</label>
            <input type='text' name='name'  value='{{ old('name') }}'>
        </div>

        <div>
            <label for='email'>Email</label>
            <input type='text' name='email'  value='{{ old('email') }}'>
        </div>

        <div>
            <label for='password'>Password</label>
            <input type='password' name='password'>
        </div>

        <div class>
            <label for='password_confirmation'>Confirm Password</label>
            <input type='password' name='password_confirmation'>
        </div>
        <br>
        <button type='submit' class='btn btn-primary'>Register</button>

    </form>

@stop
