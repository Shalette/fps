@extends('layout')
@section('css')
<link href="{{ asset('css/faculty.css') }}" rel="stylesheet">
@endsection
@section('title', 'FPS - Faculty Information')

@section('content')
<div class="row">
    <br>
    <div class="col s12 m4">
        <div class="card">
            <div class="card-image">
            <img src="{{asset('storage/images/'.$user->profile_image) }}" alt="Profile Image">
            </div>
            <div class="card-content">
                <h5 class="card-title">{{ $user->name }}</h5>
                <h6>{{ $user->degree }}</h6><h6>{{ $user->position }}</h6>
                <p class="grey-text text-darken-2">Number of publications: {{ $user->pub_number }}</p>
            </div>
            <div class="card-action">
            <a href="mailto:{{ $user->email }}" target="_blank">Contact</a>
            </div>
        </div>
    </div>

    <div class="col s12 m8">
    @if(!$publications->isEmpty())
        <div class="row">
            <h4 class="grey-text text-darken-3 col s12 m6">All Papers </h4>
            <!-- <form class="col s12 m6">
            <div class="input-field"> 
                <select>
                <option value="" hidden disabled selected>Sort</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                </select>
            </div>
            </form> -->
        </div>
    
        @foreach ($publications as $pub)
        <a target="_blank" href="{{ asset('storage/publications/'.$pub->pdf_link )}}">
            <div class="card-panel hoverable grey lighten-5 z-depth-1">
                <h5 class="cyan-text text-darken-3 card-title">{{ $pub->title }}</h5>
                <div class="card-content">
                    <h6 class="cyan-text text-darken-2">{{ $pub->description }}</h6>
                </div>
            </div>
        </a>
        @endforeach
    @else
        <div class="card center-align">
            <div class="card-content">
                <h4>This faculty member hasn't published any papers yet.</h4>
            </div>
        </div>  
    @endif
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/form.js') }}"></script>
@endsection