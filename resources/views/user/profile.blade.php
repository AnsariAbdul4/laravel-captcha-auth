@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded text-center">
        @include('layouts.partials.messages')
        @auth
        <div class="row row-cols-1 row-cols-md-2 g-3">
            
            <div class="col">
              <div class="card">
                <img src="/images/{{auth()->user()->avtar}}" class="card-img-top" alt="..." width="100" height="250">
                <div class="card-body">
                  <h5 class="card-title">{{auth()->user()->username}}</h5>
                  <p class="card-text">{{auth()->user()->email}}</p>
                </div>
              </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update',auth()->id()) }}" enctype="multipart/form-data">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            
                            <h1 class="h3 mb-3 fw-normal">Update Profile Image</h1>
                    
                            <div class="form-group form-floating mb-3">
                                <input type="file" class="form-control" name="avtar" value="{{ old('avtar') }}" placeholder="name@example.com" required="required" autofocus>
                                @if ($errors->has('avtar'))
                                    <span class="text-danger text-left">{{ $errors->first('avtar') }}</span>
                                @endif
                            </div>
                    
                            <button class="w-100 btn btn-lg btn-primary" type="submit">Update</button>
                            
                        </form>
                    </div>
                </div>
            </div>

          </div>
        @endauth
    </div>
@endsection
