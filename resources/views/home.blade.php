@extends('layout')
@section('css')
{{ asset("css/home.css") }}
@endsection
@section('title', 'FPS - Home')
@section('content')
<div class="row justify-content-center">
    <br>
    <div class="col-md-8">
    @if(!$publications->isEmpty())
        <h4 class="center-align grey-text text-darken-3">List of Publications</h4>
        <div class="divider"></div>
        @foreach ($publications as $pub)
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row card-content">
                    <div class="col s12 m6 l7 xl8">
                        <h5 class="card-title">{{ $pub->title }}</h5>
                        <h6 class="grey-text text-darken-2">{{ $pub->description }}</h6>  
                        <br>  
                    </div>
                    
                    <div class="col s12 m6 l5 xl4">
                        <a class="col s6 btn blue-grey darken-1 waves-effect waves-light" target="_blank" href="{{ asset('storage/publications/'.$pub->pdf_link )}}">
                        <i class="material-icons left">open_in_new</i>View</a> 
                        <a href="{{ route('edit', $pub->pub_id) }}" class="col s5 offset-s1 btn amber darken-1 waves-effect waves-light">
                        <i class="material-icons left">mode_edit</i>Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="card-panel center-align">
            <div class="card-body">
                <h4 card="card-title">Looks like you have no papers here yet!</h4><br>
                <a href="{{ route('publish') }}" class="btn waves-effect waves-light">Begin Adding</a>
            </div>    
        </div>     
    @endif    
    </div>
</div>
@endsection
