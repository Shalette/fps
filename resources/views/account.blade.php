@extends('layout')
@section('css')
{{ asset("css/account.css") }}
@endsection
@section('title', 'FPS - Account')
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
        <h4 class="card-title center-align">{{ __('Edit Profile Details') }}</h4>
        <div class="card-content">
            <form method="POST" enctype="multipart/form-data" action="{{ route('newprofile') }}">
            @csrf
                <div class="input-field col s12 inline">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" value="{{ $user->name }}"
                        required autofocus autocomplete="name">
                    @error('name')
                    <span class="helper-text red-text text-darken-3" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <div class="input-field col s12 inline">
                    <label for="degree">{{ __('Degree') }}</label>
                    <input id="degree" type="text" class="validate @error('degree') invalid @enderror" name="degree" value="{{ $user->degree }}"
                        required autocomplete="degree" autofocus>
                    @error('degree')
                    <span class="helper-text red-text text-darken-3" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <div class="input-field col s12 inline">
                    <label for="position">{{ __('Position') }}</label>
                    <input id="position" type="text" class="validate @error('position') invalid @enderror" name="position" value="{{ $user->position }}"
                        required autocomplete="position" autofocus>
                    @error('position')
                    <span class="helper-text red-text text-darken-3" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <div class="input-field col s12">
                    <select id="dept_id" class="validate @error('dept_id') invalid @enderror" name="dept_id"  required>
                    <option value="" disabled>Department</option>
                    @foreach ($departments as $dept)
                        <option value="{{ $dept->dept_id }}" @if ($user->dept_id == $dept->dept_id) selected @endif >{{ $dept->dept_name }}</option> 
                    @endforeach
                    </select>
                    @error('dept_id')
                    <span class="helper-text red-text text-darken-3" data-error="{{ $message }}"></span>
                    @enderror
                </div>


                <div class="input-field col s12">
                    <div class="file-field input-field">
                        <div class="btn-small">
                            <span>Profile Image</span>
                            <input type="file" name="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate @error('file') invalid @enderror">
                        </div>
                        @error('file')
                        <span class="helper-text red-text text-darken-3">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn amber darken-1 waves-effect waves-light">
                    {{ __('Update Profile') }}
                </button>
            </form>
        </div>
    </div>
</div>   
@endsection
@section('js')
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/form.js') }}"></script>
@endsection