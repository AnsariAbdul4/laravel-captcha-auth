@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ url('reset-password') }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="token" value="{{ $token }}" />
        <img class="mb-4" src="{!! url('images/bootstrap-logo.svg') !!}" alt="" width="72" height="57">
        
        <h1 class="h3 mb-3 fw-normal">Reset Password</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3">
            <label for="floatingName">Email</label>
            <input type="text" id="email_address" class="form-control" name="email" required autofocus>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" id="password" class="form-control" name="password" required autofocus>
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-group form-floating mb-3">
            <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
            <label for="floatingPassword">Confirm Password</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <button type="submit" class="w-100 btn btn-lg btn-primary">
            Reset Password
        </button>
        
    </form>
@endsection
