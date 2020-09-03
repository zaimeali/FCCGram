@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img 
                @if ( $user->profile->image )
                    src="/storage/{{ $user->profile->image }}"
                @else
                    src="https://instagram.fkhi10-1.fna.fbcdn.net/v/t51.2885-19/s150x150/97566921_2973768799380412_5562195854791540736_n.jpg?_nc_ht=instagram.fkhi10-1.fna.fbcdn.net&_nc_ohc=Flk2TOzsvZQAX_JLLW3&oh=818a56cbff85844ebed01cdfd30dd9f7&oe=5F667267"
                @endif 
                alt="FreeCodeCamp Display Picture"
                class="rounded-circle w-100"
            >
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->username }}</div>

                    @cannot('update', $user->profile)
                        <follow-button 
                            user-id="{{ $user->id }}"
                            follows={{ $follows }}
                        ></follow-button>
                    @endcannot
                </div>

                @can('update', $user->profile)
                    <a href="/p/create">Add New Post</a>
                @endcan
            </div>

            @can('update', $user->profile)
                <a 
                    href="/profile/{{ $user->id }}/edit" 
                    class="btn btn-outline-secondary btn-sm mb-3"
                >
                    Edit Profile
                </a>
            @endcan
            
            <div class="d-flex">
                <div class="pr-5">
                    <strong>{{ $user->posts->count() }}</strong> posts
                </div>
                <div class="pr-5">
                    <strong>{{ $user->profile->followers->count() }}</strong> followers
                </div>
                <div class="pr-5">
                    <strong>{{ $user->following->count() }}</strong> following
                </div>
            </div>
            <div class="pt-3 font-weight-bold">{{ $user->profile->title }}</div>
            <div class="text-secondary" style="font-size: 16px;">
                {{ $user->profile->description }}
            </div>
            <div class="pt-2">
                <a style="font-size: 16px;" class="text-info" href="#" target="_blank">{{ $user->profile->url }}</a>
            </div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img 
                        class="w-100"
                        src="/storage/{{ $post->image }}" 
                        alt="{{ $post->caption }}"
                    >
                </a>
            </div>
        @endforeach  
        {{-- <div class="col-4">
            <img 
                class="w-100"
                src="https://instagram.fkhi10-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/c1.0.748.748a/s640x640/117532617_329372988207182_2163166929089500044_n.jpg?_nc_ht=instagram.fkhi10-1.fna.fbcdn.net&_nc_cat=102&_nc_ohc=TEbl_-igKNAAX-jWRtZ&oh=2a243800554e2ca424d4647c993c1711&oe=5F692F80" 
                alt="second image"
            >
        </div>
        <div class="col-4">
            <img 
                class="w-100"
                src="https://instagram.fkhi10-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/c3.0.744.744a/s640x640/117185734_730508550844355_4827964239716308767_n.jpg?_nc_ht=instagram.fkhi10-1.fna.fbcdn.net&_nc_cat=111&_nc_ohc=sWeX6YdA6zkAX84MJAF&oh=92d99f9f00d8004266422b44ffaa6ecf&oe=5F668C4E" 
                alt="third image"
            >
        </div> --}}
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
