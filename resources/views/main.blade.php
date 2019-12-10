@extends('layout')
@section('title', 'FPS - Home')
@section('css')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection

@section('content')
  @foreach($users as $user)
    <a href="{{ route('faculty', $user->id) }}">
    <div class="row">
        <div class="card-panel hoverable grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s6 m3">
              <img src="{{asset('storage/images/'.$user->profile_image) }}" alt="Profile Image" class="circle profile">
            </div>
            <div class="col s6 m9">
              <div class="card-content">
                <h5 class="card-title cyan-text text-darken-4">{{ $user->name }}</h5>
                <h6 class="cyan-text text-darken-2">{{ $user->position }}, {{ $user->dept_name }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  @endforeach
  </div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/form.js') }}"></script>
@endsection
