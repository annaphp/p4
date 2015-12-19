@extends('layouts.master')

@section('title')
Welcome to Projects &#38 Tasks
@endsection

@section('content')


<div id="wlcm_msg">
    <p id="wlcm_msg"> Welcome to Projects&#38Tasks - project management tool where you can keep track of all important things.</p>
</div>
<div>
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

        <div class='form-group'>
            <input type='checkbox' name='remember' >
            <label for='remember' class='checkboxLabel'>Remember me</label>
        </div>

        <button type='submit' class='btn btn-primary'>Login</button>

    </form>
</div>

@endsection
