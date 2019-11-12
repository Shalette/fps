@extends('layout')
@section('title', 'FPS - Publications')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
    @if(session('success'))
        <h4 class="text-success text-center">{{session('success')}}</h4>
    @endif
        <div class="card">
            <h4 class="card-header text-center">{{ __('Add New Paper') }}</h4>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('upload') }}">
                @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                                required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                        <div class="col-md-6">
                            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                            required autocomplete="description">
                            {{old('description')}}
                            </textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Paper') }}</label>
                        <div class="col-md-6">
                                <input type="file" class="form-control @error('file') is-invalid @enderror" 
                                        name="file" id="file">
                                <label class="custom-file-label" for="file" id="file_label">Upload PDF (Max Size: 2MB)</label>
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Upload') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>   
@endsection
@section('js')
<script>
$('#file').on("change",function() {
      var file = $('#file')[0].files[0].name;
      $('#file_label').html(file);
});
</script>
@endsection