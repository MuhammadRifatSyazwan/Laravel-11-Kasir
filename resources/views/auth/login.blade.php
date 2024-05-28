{{-- <div class="">
    <svg xmlns="http://www.w3.org/2000/svg" height="43%" viewBox="0 0 1440 320">
        <path fill="#0099ff" fill-opacity="1" d="M0,224L48,213.3C96,203,192,181,288,186.7C384,192,480,224,576,240C672,256,768,256,864,234.7C960,213,1056,171,1152,176C1248,181,1344,235,1392,261.3L1440,288L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
      </svg>
</div> --}}

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#0099ff" fill-opacity="1" d="M0,192L40,186.7C80,181,160,171,240,144C320,117,400,75,480,85.3C560,96,640,160,720,186.7C800,213,880,203,960,176C1040,149,1120,107,1200,101.3C1280,96,1360,128,1400,144L1440,160L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path>
  </svg>
@extends('layouts.app')

@section('content')
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">{{ __('Login') }}</h5>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Email input -->
                            <div class="mb-3">
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Enter your email address" />
                            </div>
                            <!-- Password input -->
                            <div class="mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password" placeholder="Enter your password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Remember Me checkbox and Forgot Password link -->
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="remember" name="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <!-- Login button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">{{ __('Login') }}</button>
                            </div>
                        </form>
                        <p class="text-center mt-3 mb-0">Don't have an account? <a href="#" class="link-primary">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection



{{-- <style>
    {
        margin:0;
        padding:0;
    }
    section{
        position: relative;
        width: 100%;
        height: 100%;
        background: #3586ff;
    }
</style> --}}
<section>
    <div class="wave wave1"></div>
    <div class="wave wave2"></div>
    <div class="wavew wave3"></div>
    <div class="wave wave4"></div>
</section>