@extends('layouts.app')

@section('title') Welcome @endsection
@section('head')
<style>
    .main{
        /* background-image: url({{ asset('dashboard/img/bg3.jpg') }}); */
        background-image: url(http://localhost:8000/dashboard/img/bg3.jpg);
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        background-size: cover;
        background-position: center;
        filter: blur(10px);
        z-index: -200;
        
    }
   
    
</style>
@endsection

@section('guest')

<div class="main"></div>

<div class="vh-100 d-flex flex-column justify-content-center">
    <div class="text-center">
        <h1 class="text-primary">Welcome To My <span class="font-weight-bold">DASHBOARD</span></h1>
    </div>
    <div class="text-center mt-3">
        <a href="{{ route('login') }}" class="btn btn-outline-primary">
            <i class="feather-home text-primary"></i>
            Login Here
        </a>
    </div>
    <div class="mt-3">
        <p class="text-center text-secondary mb-4">
            Don't have an account yet?
            <a href="{{ route('register') }}">Sign up here</a>
        </p>
    </div>
</div>



@endsection