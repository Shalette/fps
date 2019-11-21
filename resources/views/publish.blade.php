@extends('layout')
@section('title', 'FPS - Publications')
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
        <h4 class="card-title center-align">{{ __('Add New Paper') }}</h4>
        <div class="card-content">
            <form method="POST" enctype="multipart/form-data" action="{{ route('upload') }}">
            @csrf
                <div class="input-field col s12 inline">
                    <label for="title">{{ __('Title') }}</label>
                    <input id="title" type="text" class="validate @error('title') invalid @enderror" name="title" value="{{ old('title') }}"
                        required autocomplete="title" autofocus>
                    @error('title')
                    <span class="helper-text red-text text-darken-3" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <div class="input-field col s12 inline">
                    <label for="description">{{ __('Description') }}</label>
                    <textarea id="description" type="text" class="materialize-textarea @error('description') invalid @enderror" name="description"
                    required autocomplete="description">{{old('description')}}
                    </textarea>
                    @error('description')
                    <span class="helper-text red-text text-darken-3" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <div class="file-field input-field">
                            <div class="btn-small">
                                <span>Upload PDF</span>
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
                </div>

                    <button type="submit" class="btn amber darken-1 waves-effect waves-light">
                    {{ __('Upload') }}
                    </button> 

                </form>
            </div>
        </div>
    </div>
</div>   
@endsection
@section('js')
<script src="{{ asset('js/common.js') }}"></script>
@endsection