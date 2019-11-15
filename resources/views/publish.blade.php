@extends('layout')
@section('title', 'FPS - Publications')
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
            <h4 class="card-header text-center">{{ __('Add New Paper') }}</h4>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('upload') }}">
                @csrf
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"
                                required autocomplete="title" autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                        <div class="col-md-6">
                            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                            required autocomplete="description">
                            {{old('description')}}
                            </textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Paper') }}</label>
                        <div class="col-md-6">
                                <input type="file" class="form-control @error('file') is-invalid @enderror" 
                                      required  name="file" id="file">
                                <label class="custom-file-label" for="file" id="file_label">Upload PDF (Max Size: 2MB)</label>
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
                                {{ __('Upload') }}
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