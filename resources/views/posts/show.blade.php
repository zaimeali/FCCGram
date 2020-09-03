@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img class="w-100" src="/storage/{{ $post->image }}" alt="{{ $post->caption }}">
            </div>
            <div class="col-4">
                <div class="">
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <img style="max-width: 50px;" class="w-100 rounded-circle" src="/storage/{{ $post->user->profile->image }}" alt="User DP">
                        </div>
                        <div>
                            <div class="font-weight-bold">
                                <a href="/profile/{{ $post->user->id }}">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                </a>
                                |
                                <a class="pl-1" href="#">
                                    Follow
                                </a>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </span>  {{ $post->caption }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection