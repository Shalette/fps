@extends('layout')
@section('title', 'FPS - Change Password')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
    @if(session('success'))
        <div id="notice" class="card text-white bg-success">
            <div class="card-body d-flex justify-content-between">
                <h4>{{session('success')}}</h4>
                <button id="close" class="btn btn-light text-danger"><b>&times;</b></button>
            </div>
        </div>
    @endif
        <div class="card">
            <h4 class="card-header text-center">{{ __('Change Password') }}</h4>
            <div class="card-body">
                <form method="POST" action="{{ route('newpassword') }}">
                    @csrf 
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>

                        <div class="col-md-6">
                            <input id="current_password" type="password" required class="form-control @error('current_password') is-invalid @enderror" name="current_password" autocomplete="current-password">
                            @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                        <div class="col-md-6">
                            <input id="new_password" type="password" required class="form-control @error('new_password') is-invalid @enderror" name="new_password" autocomplete="current-password">
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>

                        <div class="col-md-6">
                            <input id="new_confirm_password" required type="password" class="form-control @error('new_confirm_password') is-invalid @enderror"name="new_confirm_password" autocomplete="current-password">
                            @error('new_confirm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
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
@endsection