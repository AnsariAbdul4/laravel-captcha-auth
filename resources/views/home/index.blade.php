@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @auth
        <h1>Dashboard</h1>
        <p class="lead">Only logged in users can see the dashboard.</p>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection
