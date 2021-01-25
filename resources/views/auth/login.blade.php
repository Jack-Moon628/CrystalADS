@extends('layouts.guest')

@section('styling')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/views/guest/login.css') }}">

@endsection

@section('content')

<div class="w-100 mt-4 ml-2">
    <a href="/" class="tip p-2">
        <i class="fas fa-long-arrow-alt-left"></i>
        home
    </a>
</div>

<div class="form-wrapper mb-3">
    <form method="POST" action="/login">
        @CSRF

        <p class="wrapper-title">Welcome back</p>

        <div class="input-item">
            <span>Email Address</span> 
            <input type="email" name="email" onblur="validateEmail(this);" required>

            <span id="emailValidation" class="validation"></span>
        </div>

        <div class="input-item">
            <span>
                Password
            </span>

            <input id="password" type="password" name="password" autocomplete="new-password" onblur="validatePassword(this);" required>

            <span id="passwordValidation" class="validation"></span>
        </div>

        <span class="hint mt-4">
            Whoops,
            <a href="/password/reset">forgot your password?</a>
        </span>

        <input type="submit" class="form-submit" value="Login">

        <span class="hint mt-4">
            Join us,
            <a href="/register">create an account</a>
        </span>
    </form>
</div>

@endsection

@section('scripts')

    <script type="text/javascript" src="/js/views/guest/register.js"></script>

    @error('email')
        <script type="text/javascript">
            showValidationError("#emailValidation", "{{ $message }}");
        </script>
    @enderror

    @error('password')
        <script type="text/javascript">
            showValidationError("#passwordValidation", "{{ $message }}");
        </script>
    @enderror

@endsection