@extends('layout')
@section('title', 'FPS - Change Password')

@section('content')
<div class="row">
    <div class="col s12">
    @if(session('success'))
        <div id="notice" class="row card-panel green">
            <div class="card-content">
                <div class="col s10 m11">
                    <h6 class="grey-text text-lighten-5">{{session('success')}}</h6>
                </div>
                <div class="col s2 m1">
                    <button id="close" class="btn-small grey lighten-3 red-text"><b>&times;</b></button>
                </div>
            </div>
        </div>   
    @elseif(session('failure'))
        <div id="notice" class="row card-panel red">
            <div class="card-content">
                <h6 class="col s10 m11 grey-text text-lighten-5">{{session('failure')}}</h6>
                <div class="col s2 m1">
                    <button id="close" class="btn-small grey lighten-3 red-text"><b>&times;</b></button>
                </div>
            </div>
        </div>   
    @endif
    </div>
    <br>
    <div class="card col s12"><br>
        <h4 class="card-title center-align">{{ __('Change Password') }}</h4>
        <div class="card-content">
            <form method="POST" action="{{ route('newpassword') }}">
                @csrf 
                <div class="input-field col s12 inline">
                <label for="current_password">Current Password</label>
                    <input id="current_password" type="password" required class="validate @error('new_password') invalid @enderror" name="current_password">
                    @error('current_password')
                    <span class="helper-text red-text text-darken-3" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <div class="input-field col s12 inline">
                <label for="new_password">New Password</label>   
                    <input id="new_password" type="password" required class="validate @error('new_password') invalid @enderror" name="new_password">
                    @error('new_password')
                    <span class="helper-text red-text text-darken-3" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <div class="input-field col s12 inline">
                    <label for="new_confirm_password">New Confirm Password</label>
                    <input id="new_confirm_password" required type="password" class="validate @error('new_confirm_password') invalid @enderror" name="new_confirm_password">
                    @error('new_confirm_password')
                    <span class="helper-text red-text text-darken-3" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col s8">
                        <button type="submit" class="btn amber darken-1 waves-effect waves-light">
                            Update Password
                        </button>
                    </div>
                </div>       
            </form>
        </div>
    </div>
</div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/form.js') }}"></script>
@endsection