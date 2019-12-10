@extends('layout')
@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection
@section('title', 'FPS - Home')

@section('content')
<div class="row justify-content-center">
    <br>
    <div class="col-md-8">
    @if(!$publications->isEmpty())
        <h4 class="center-align grey-text text-darken-3">List of Publications</h4>
        <div class="divider"></div>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Possible Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($publications as $pub)
                <tr data-href="{{ asset('storage/publications/'.$pub->pdf_link )}}">
                    <td><p class="card-title cyan-text text-darken-4">{{ $pub->title }}</p></td>
                    <td><p class="cyan-text text-darken-2">{{ $pub->description }}</p></td>
                    <td><a class="btn col s12 m5 blue-grey darken-1 waves-effect waves-light" target="_blank" href="{{ asset('storage/publications/'.$pub->pdf_link )}}">
                        <i class="material-icons left">open_in_new</i>View</a> 
                    <a href="{{ route('edit', $pub->pub_id) }}" class="btn col s12 offset-m2 m5 amber darken-1 waves-effect waves-light">
                        <i class="material-icons left">mode_edit</i>Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
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
