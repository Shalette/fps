@extends('layout')
@section('title', 'FPS - Home')
@section('css')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection

@section('content')
<br>

<div class="row">
  <form class="col s12" method="POST" action="{{ route('mainfilter') }}">
    @csrf
    <div class="input-field col s12 m3">
      <select name="order" >
        @if(!empty($request))
          @if($request->order=="desc")
          <option value="asc">A-Z (Name)</option>
          <option value="desc"  selected>Z-A (Name)</option>
          @else
          <option value="asc" selected>A-Z (Name)</option>
          <option value="desc">Z-A (Name)</option>
          @endif
        @else
        <option value="asc" selected>A-Z (Name)</option>
        <option value="desc">Z-A (Name)</option>
        @endif
      </select>
      <label>Sort By</label>
    </div>
    <div class="input-field col s12 m3">
      <select name="department">
      @if(empty($request))
        <option value="0" selected>All Departments</option>
        @foreach($departments as $dept)
        <option value="{{ $dept->dept_id }}">{{ $dept->dept_name }}</option>
        @endforeach
      @else  
        <option value="0">All Departments</option>
        @foreach($departments as $dept)
          @if($request->department==$dept->dept_id) 
            <option value="{{ $dept->dept_id }}" selected >{{ $dept->dept_name }}</option>
          @else  
            <option value="{{ $dept->dept_id }}">{{ $dept->dept_name }}</option>
          @endif 
        @endforeach
      @endif
      </select>
      <label>Filter By Department</label>
    </div>
    <div class="input-field col s12 m3">
    @if(empty($request))
      <input id="key" type="text" class="validate" name="keywords" value="">
    @else  
      <input id="key" type="text" class="validate" name="keywords" value="{{ $request->keywords }}">   
    @endif   
      <label for="key">Keywords (Separate By Comma)</label>
    </div>
    <button class="btn-large amber darken-1 waves-effect waves-light col m3" type="submit" name="submit">
    <i class="material-icons left">search</i>Search</button>
  </form>
</div>

@if(!$users->isEmpty()) 
<table class="highlight">
  <thead>
    <tr>
        <th>Name</th>
        <th>Degree</th>
        <th>Position</th>
        <th>Department</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr data-href="{{ route('faculty', $user->id) }}">
    <td><p class="card-title cyan-text text-darken-4">{{ $user->name }}</p></td>
    <td><p class="cyan-text text-darken-2">{{ $user->degree }}</p></td>
    <td><p class="cyan-text text-darken-2">{{ $user->position }}</p></td>
    <td><p class="cyan-text text-darken-2">{{ $user->dept_name }}</p></td>
    </tr>
  @endforeach
  </tbody>
</table>
@else
<div class="card-panel center-align">
  <div class="card-body">
      <h4 card="card-title">No Results</h4><br>
  </div>    
</div> 
@endif
@endsection
@section('js')
<script src="{{ asset('js/main.js') }}"></script>
@endsection
