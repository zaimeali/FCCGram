@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img 
                src="https://instagram.fkhi10-1.fna.fbcdn.net/v/t51.2885-19/s150x150/97566921_2973768799380412_5562195854791540736_n.jpg?_nc_ht=instagram.fkhi10-1.fna.fbcdn.net&_nc_ohc=Flk2TOzsvZQAX_JLLW3&oh=818a56cbff85844ebed01cdfd30dd9f7&oe=5F667267" 
                alt="FreeCodeCamp Display Picture"
                class="rounded-circle"
            >
        </div>
        <div class="col-9 pt-5">
            <div>
                <h1>freecodecamp</h1>
            </div>
            <div class="d-flex">
                <div class="pr-5">
                    <strong>153</strong> posts
                </div>
                <div class="pr-5">
                    <strong>23k</strong> followers
                </div>
                <div class="pr-5">
                    <strong>212</strong> following
                </div>
            </div>
            <div class="pt-3 font-weight-bold">freeCodeCamp.org</div>
            <div class="text-secondary" style="font-size: 16px;">
                We're a global community of millions of people learning to code together. 
                We're an open source, donor-supported, 501(c)(3) nonprofit.
            </div>
            <div class="pt-2">
                <a style="font-size: 16px;" class="text-info" href="#" target="_blank">https://freecodecamp.org</a>
            </div>
        </div>
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
