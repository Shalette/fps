@extends('layout')
@section('css')
{{ asset("css/home.css") }}
@endsection
@section('title', 'FPS - Home')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
    @if(!$publications->isEmpty())
        <h3 class="text-center">List of Publications</h3>
        @foreach ($publications as $pub)
        
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a class="btn btn-secondary" target="_blank" href="{{ asset('storage/publications/'.$pub->pdf_link )}}">{{ $pub->title }}</a> 
                    <a href="{{ route('edit', $pub->pub_id) }}" class="btn btn-warning">Make Edits</a>
                </div>
                <div class="card-body">
                    {{ $pub->description }}
                </div>
            </div>
        </a>
        @endforeach
    @else
        <div class="jumbotron text-center">
            <h4>Looks like you have no papers here yet!</h4><br>
            <a href="{{ route('publish') }}" class="btn btn-info">Begin Adding</a>
        </div>     
    @endif    
    </div>
</div>
@endsection
