@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="/profile/{{ $user->id }}" enctype="multipart/form-data">

            {{-- CSRF Directive --}}
            @csrf

            {{-- Method Directive for Update --}}
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row py-3">
                        <h1>Edit Profile</h1>
                    </div>
                    <div class="form-group row">
                        <label 
                            for="title" 
                            class="col-md-4 col-form-label"
                        >
                            <strong>Title</strong>
                        </label>
                        
                        <input 
                            id="title" 
                            type="text" 
                            class="form-control @error('title') is-invalid @enderror" 
                            name="title" 
                            value="{{ old('title') ?? $user->profile->title }}" 
                            required 
                            autocomplete="title"
                        >
    
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group row">
                        <label 
                            for="description" 
                            class="col-md-4 col-form-label"
                        >
                            <strong>Description</strong>
                        </label>
                        
                        <input 
                            id="description" 
                            type="text" 
                            class="form-control @error('description') is-invalid @enderror" 
                            name="description" 
                            value="{{ old('description') ?? $user->profile->description }}" 
                            required 
                            autocomplete="description"
                        >
    
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group row">
                        <label 
                            for="url" 
                            class="col-md-4 col-form-label"
                        >
                            <strong>URL</strong>
                        </label>
                        
                        <input 
                            id="url" 
                            type="url"
                            class="form-control @error('url') is-invalid @enderror" 
                            name="url" 
                            value="{{ old('url') ?? $user->profile->url }}" 
                            required 
                            autocomplete="url"
                        >
    
                        @error('url')
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
                            <strong>Profile Image</strong>
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
                            Save Profile
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection