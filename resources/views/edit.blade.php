@extends('layout')
@section('title', 'FPS - Edit Publication')
@section('css')
{{ asset("css/edit.css") }}
@endsection
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
</div>
<div class="row">
    <div id="overlay">
        <div id="text" class="card">
            <div class="card-content">This action will remove the publication permanently from our records. Are you sure you want to proceed? </div>
            <div class="card-action row">
                <div class="col s12 m3">
                    <a href="{{ route('delete', $publication->pub_id) }}" class="btn red darken-3 waves-effect waves-light">Yes, Delete</a>
                </div>
                <div class="col s12 m3 offset-m6">
                    <button id="cancel" class="btn waves-effect waves-light">No, Cancel</button> 
                </div>
            </div>
        </div>
    </div>
    @if(!empty($publication))
    <div class="card"><br>
        <h4 class="card-title center-align">{{ __('Edit Publication') }} <br><br> 
            <a class="btn blue-grey darken-1 waves-effect waves-light" target="_blank" href="{{ asset('storage/publications/'.$publication->pdf_link )}}">
            <i class="material-icons left">open_in_new</i>View Paper</a>
        </h4>
        <div class="card-content">
            <form method="POST" action="{{ route('newedit') }}">
                @csrf 
                <input id="pub_id" type="text" required hidden name="pub_id" value="{{ $publication->pub_id }}">
                <div class="input-field col s12 inline">
                    <label for="title">{{ __('Title') }}</label>
                    <input id="title" type="text" class="validate @error('title') invalid @enderror" name="title" value="{{ $publication->title }}"
                        required autocomplete="title" autofocus>
                    @error('title')
                    <span class="helper-text red-text text-darken-3" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <div class="input-field col s12 inline">
                    <label for="description">{{ __('Description') }}</label>
                    <textarea id="description" type="text" class="materialize-textarea @error('description') invalid @enderror" name="description"
                    required autocomplete="description">{{ $publication->description }}</textarea>
                    @error('description')
                    <span class="helper-text red-text text-darken-3" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <button type="submit" class="btn amber darken-1 waves-effect waves-light">
                    {{ __('Update Publication') }}
                </button>
            </form>
        </div>
    </div>
    <br>
        <!-- href="{{route('delete', $publication->pub_id)}}" -->
    <button id="delete" class="btn col s4 offset-s4 red darken-3 waves-effect waves-light"><i class="material-icons left">delete</i>Delete this publication.</button>
    @else   
    <div class="card-panel center-align">
        <h4 class="card-title">Oops! Can't access this paper.</h4><br>
        <a href="{{ route('home') }}" class="btn waves-effect waves-light">Return Home</a>
    </div>     
    @endif  
</div>
@endsection
@section('js')
<script src="{{ asset('js/form.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
@endsection

