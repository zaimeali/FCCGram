@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="/p" enctype="multipart/form-data">
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row py-3">
                        <h1>Add New Post</h1>
                    </div>
                    <div class="form-group row">
                        <label 
                            for="caption" 
                            class="col-md-4 col-form-label"
                        >
                            <strong>Post Caption</strong>
                        </label>
                        
                        <input 
                            id="caption" 
                            type="text" 
                            class="form-control @error('caption') is-invalid @enderror" 
                            name="caption" 
                            value="{{ old('caption') }}" 
                            required 
                            autocomplete="caption"
                        >
    
                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label 
                            for="image" 
                            class="col-md-4 col-form-label"
                        >
                            <strong>Post Image</strong>
                        </label>
                        <input 
                            class="form-control-file @error('image') is-invalid @enderror"
                            type="file" 
                            name="image"
                            id="image"
                        >
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row pt-3">
                        <button class="btn btn-primary">
                            Add New Post
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection