@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ url('/forget-password') }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="mb-4" src="{!! url('images/bootstrap-logo.svg') !!}" alt="" width="72" height="57">
        
        <h1 class="h3 mb-3 fw-normal">Forget Password</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required="required" autofocus>
            <label for="floatingName">Email</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Send Link</button>
        
        <div class="form-group mb-3">
            <a href="{{url('/register')}}" class="m-5"> Register Now</a> 
            <a href="{{url('/login')}}" > Login</a>
        </div>
        
    </form>
@endsection
