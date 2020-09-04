@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
        <div class="row">
            <div class="col-8">
                <img class="w-100" src="/storage/{{ $post->image }}" alt="{{ $post->caption }}">
            </div>
            <div class="col-4">
                <div class="">
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <img 
                                style="max-width: 50px;" 
                                class="w-100 rounded-circle" 
                                @if ($post->user->profile->image)
                                    src="/storage/{{ $post->user->profile->image }}" 
                                @else
                                    src="https://instagram.fkhi10-1.fna.fbcdn.net/v/t51.2885-19/s150x150/97566921_2973768799380412_5562195854791540736_n.jpg?_nc_ht=instagram.fkhi10-1.fna.fbcdn.net&_nc_ohc=Flk2TOzsvZQAX_JLLW3&oh=818a56cbff85844ebed01cdfd30dd9f7&oe=5F667267"
                                @endif
                                alt="User DP"
                            >
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
        @endforeach
    </div>
@endsection