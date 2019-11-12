@extends('layout')
@section('css')
{{ asset("css/home.css") }}
@endsection
@section('title', 'FPS - Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="text-center">List of Publications</h3>
            @foreach ($publications as $pub)
            <a target="_blank" href="{{ asset('storage/publications/'.$pub->pdf_link )}}">
                <div class="card">
                    <div class="card-header">{{ $pub->title }} </div>
                    <div class="card-body">
                        {{ $pub->description }}
                    </div>

                </div>
            </a>
            @endforeach
        </div>
    </div>

</div>
@endsection
