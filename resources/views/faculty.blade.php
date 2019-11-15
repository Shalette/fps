@extends('layout')
@section('css')
{{ asset("css/faculty.css") }}
@endsection
@section('title', 'FPS - Faculty Information')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="no-hover card">
            <img class="card-img-top img-thumbnail" src="{{asset('storage/images/'.$user->profile_image) }}" alt="Profile Image">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <h6 class="card-text">{{ $user->degree }}</h6>
                <h6 class="card-text">{{ $user->position }}</h6>
                <h6 class="card-text">Contact: <a href="mailto:{{ $user->email }}" target="_blank">{{ $user->email }}</a></h6>
                <p class="card-text text-muted">Number of publications: {{ $user->pub_number }}</small></p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
    @if(!$publications->isEmpty())
        <h2>All Papers </h2>
        @foreach ($publications as $pub)
        <a target="_blank" href="{{ asset('storage/publications/'.$pub->pdf_link )}}">
            <div class="pub card">
                <div class="card-header">
                    <h5>{{ $pub->title }}</h5>
                </div>
                <div class="card-body">
                    {{ $pub->description }}
                </div>
            </div>
        </a>
        @endforeach
    @else
        <div class="jumbotron text-center">
            <h4>This faculty member hasn't published any papers yet.</h4>
        </div>  
    @endif
    </div>
</div>
@endsection