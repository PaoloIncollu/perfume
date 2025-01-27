@extends('layouts.guest')

@section('main-content')

    <div class="login-container mt-5 py-5">

        <div class="d-flex justify-content-center">

            <form method="POST" action="{{ route('login') }}" class="login-form p-5">
                @csrf
    
                <!-- Email Address -->
                <div class="d-flex align-items-center">
                    <div>
                       <label for="email" class="fw-bold fs-3 me-2">
                            Email
                        </label> 
                    </div>
                    <div>
                        <input type="email" id="email" name="email" >
                    </div>
                    
                    
                </div>
    
                <!-- Password -->
                <div class="d-flex align-items-center mt-4">

                    <div>
                        <label for="password" class="fw-bold fs-3 me-2">
                            Password
                        </label>
                    </div>
                    <div>
                       <input type="password" id="password" name="password"> 
                    </div>
                    
                </div>
    
                <!-- Remember Me -->
                <div class="mt-4">
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span class="fw-bold">Remember me</span>
                    </label>
                </div>
    
                <div class="mt-4">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-white text-decoration-none">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
    
                    <button type="submit" class="btn btn-secondary ms-5">
                        Log in
                    </button>
                </div>
            </form>
        </div>

        
    </div>
    
@endsection
