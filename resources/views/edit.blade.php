@extends('layout')
@section('title', 'FPS - Edit Publication')
@section('css')
{{ asset("css/edit.css") }}
@endsection
@section('content')
<div id="overlay">
  <div id="text" class="card bg-light">
    <div class="card-body">This action will remove the publication permanently from our records. Are you sure you want to proceed? </div>
    <div class="card-footer d-flex justify-content-around">
        <a href="{{ route('delete', $publication->pub_id) }}" class="btn btn-danger">Yes, Delete</a> 
        <button id="cancel" class="btn btn-secondary">No, Cancel</button></div>
  </div>
</div>
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
    @if(session('failure'))
        <div id="notice" class="card text-white bg-danger">
            <div class="card-body d-flex justify-content-between">
                <h4>{{session('failure')}}</h4>
                <button id="close" class="btn btn-light text-danger"><b>&times;</b></button>
            </div>
        </div>
    @endif
    @if(!empty($publication))
        <div class="card">
            <h4 class="card-header text-center">{{ __('Edit Publication') }} <br><br> 
                <a class="btn btn-dark"target="_blank" href="{{ asset('storage/publications/'.$publication->pdf_link )}}">View Paper</a>
            </h4>
            <div class="card-body">
                <form method="POST" action="{{ route('newedit') }}">
                    @csrf 
                    <input id="pub_id" type="text" required hidden name="pub_id" value="{{ $publication->pub_id }}">
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                        <div class="col-md-6">
                            <input id="title" type="text" 
                            required class="form-control @error('title') is-invalid @enderror" 
                            name="title" autocomplete="title" value="{{ $publication->title }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                        <div class="col-md-6">
                            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                            required autocomplete="description">{{ $publication->description }}
                            </textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Update Publication
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <!-- href="{{route('delete', $publication->pub_id)}}" -->
        <button id="delete" class="btn btn-block btn-danger">Delete this publication.</button>
    @else   
        <div class="jumbotron text-center">
            <h4>Oops! Can't access this paper.</h4><br>
            <a href="{{ route('home') }}" class="btn btn-info">Return Home</a>
        </div>     
    @endif
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/common.js') }}"></script>
@endsection