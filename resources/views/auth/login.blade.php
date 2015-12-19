@extends('layouts.master')

@section('content')


    <h1>Login</h1>

    <form method='POST' action='/login'>

        {!! csrf_field() !!}

        <div>
            <label for='email'>Email</label>
            <input type='text' name='email' value='{{ old('email') }}'>
        </div>

        <div>
            <label for='password'>Password</label>
            <input type='password' name='password' value='{{ old('password') }}'>
        </div>

        <div>
            <input type='checkbox' name='remember'>
            <label for='remember'>Remember me</label>
        </div>

        <button type='submit' class='btn btn-primary'>Login</button>

    </form>
@stop
