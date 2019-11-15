@extends('layout')
@section('css')
{{ asset("css/account.css") }}
@endsection
@section('title', 'FPS - Account')
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
            <h4 class="card-header text-center">{{ __('Edit Profile Details') }}</h4>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('newprofile') }}">
                @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}"
                                required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="degree" class="col-md-4 col-form-label text-md-right">{{ __('Degree') }}</label>
                        <div class="col-md-6">
                            <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="{{ $user->degree }}"
                                required autocomplete="degree" autofocus>
                            @error('degree')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>
                        <div class="col-md-6">
                            <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ $user->position }}"
                                required autocomplete="position" autofocus>
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dept_id" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>
                        <div class="col-md-6">
                            <select id="dept_id" class="form-control @error('dept_id') is-invalid @enderror" name="dept_id" required>
                            @foreach ($departments as $dept)
                                <option value="{{ $dept->dept_id }}" @if ($user->dept_id == $dept->dept_id) selected @endif >{{ $dept->dept_name }}</option> 
                            @endforeach
                            </select>
                            @error('dept_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Profile Image') }}</label>
                        <div class="col-md-6">
                                <input type="file" class="form-control @error('file') is-invalid @enderror" 
                                        name="file" id="file">
                                <label class="custom-file-label" for="file" id="file_label">Upload Image (Max Size: 2MB)</label>
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Profile') }}
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