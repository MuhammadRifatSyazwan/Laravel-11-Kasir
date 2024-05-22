@extends('layouts.app')

@section('content')
<br>
<br>
<div class="col-md-12">

    <div class="row">
  
      <div class="col" style="background-image: url('polished/assets/main.png') !important; background-size: 80% ; background-repeat: no-repeat; background-position: 15rem -5rem">
       <div class="greeting mt-4 pl-4">
         <h3 class="text-center">
          <?php 
  
            date_default_timezone_set("Asia/Jakarta");
  
              $b = time();
              $hour = date("G",$b);
  
              if ($hour>=0 && $hour<=11)
              {
              echo "Selamat Pagi";
              }
              elseif ($hour >=12 && $hour<=14)
              {
              echo "Selamat Siang";
              }
              elseif ($hour >=15 && $hour<=17)
              {
              echo "Selamat Sore";
              }
              elseif ($hour >=17 && $hour<=18)
              {
              echo "Selamat Petang";
              }
              elseif ($hour >=19 && $hour<=23)
              {
              echo "Selamat Malam";
              }
  
         ?>, {{Auth::user()}}
         </h3>
         <h4 class="text-muted  fw-normal text-center">
           Login untuk masuk.
         </h4>
       </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
