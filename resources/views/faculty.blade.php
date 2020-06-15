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
                <h6>Years Of Experience: {{ $user->years_exp }}</h6>
                <p class="grey-text text-darken-2">Number of publications: {{ $user->pub_number }}</p>
            </div>
            <div class="card-action">
            <a href="mailto:{{ $user->email }}" target="_blank">Contact</a>
            </div>
        </div>
    </div>

    <div class="col s12 m8">
    @if(!$publications->isEmpty())
    <h4 class="grey-text text-darken-3 col s12 m6">All Papers </h4>
    <table class="highlight">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($publications as $pub)
        <tr data-href="{{ asset('storage/publications/'.$pub->pdf_link )}}">
            <td><p class="card-title cyan-text text-darken-4">{{ $pub->title }}</p></td>
            <td><p class="cyan-text text-darken-2">{{ $pub->description }}</p></td>
        </tr>
        @endforeach
        </tbody>
    </table>    
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
<script src="{{ asset('js/faculty.js') }}"></script>
@endsection