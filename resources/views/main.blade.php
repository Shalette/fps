@extends('layout')
@section('title', 'FPS - Home')
@section('css')
{{ asset("css/main.css") }}
@endsection

@section('content')
<div class="row justify-content-center">
  <div class="col-md-10"> 
  @foreach($users as $user)
    <a href="{{ route('faculty', $user->id) }}">
      <div class="card">
        <div class="card-body">
          <img src="{{asset('storage/images/'.$user->profile_image) }}" class="rounded thumb" alt="Profile Image">
          <h5 class="card-title">{{ $user->name }}</h5>
          <h6 class="card-text">{{ $user->position }}, {{ $user->dept_name }}</h6>
        </div>
      </div>
    </a>
  @endforeach
  </div>
</div>
@endsection
