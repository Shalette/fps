@extends('layout')
@section('title', 'FPS - Login')
@section('content')
<br>
<div class="row">
    <div class="card">
        <br>
        <h4 class="card-title center-align">{{ __('Login') }}</h4>
        <div class="card-content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-field col s12 inline">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="validate @error('email') invalid @enderror" name="email" value="{{ old('email') }}"
                        required autocomplete="title" autofocus>
                    @error('email')
                    <span class="helper-text red-text text-darken-3" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <div class="input-field col s12 inline">
                    <label for="password">Password</label>
                    <input id="password" type="password" required class="validate @error('password') invalid @enderror" name="password">
                    @error('password')
                    <span class="helper-text red-text text-darken-3" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <p style="padding: 15px 10px ">
                    <label>
                        <input type="checkbox" class="filled-in" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                        <span> {{ __('Remember Me') }}</span>
                    </label>
                </p>   

                <div class="row">
                    <div class="col m8">
                        <button type="submit" class="btn amber darken-1 waves-effect waves-light">
                            {{ __('Login') }}
                        </button>
                        <!-- @if (Route::has('password.request'))
                            <a class="btn" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
