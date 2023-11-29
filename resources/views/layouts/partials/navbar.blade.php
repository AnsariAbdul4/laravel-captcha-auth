<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
        @auth
          <li><a href="{{route('profile.show')}}" class="nav-link px-2 text-secondary active"> Profile </a></li>
        @endauth
      </ul>

      @auth
        <span style="margin-right: 3px;"> {{ 'Welcome! '.auth()->user()->username}} </span>
        <div class="text-end">
          <a href="{{ url('/request-reset-password') }}" class="btn btn-outline-light me-2">Request Reset Password</a>
          <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
        </div>
      @endauth

      @guest
        <div class="text-end">
          <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
          <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
        </div>
      @endguest
    </div>
  </div>
</header>