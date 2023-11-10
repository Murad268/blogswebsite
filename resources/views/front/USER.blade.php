@extends('front.layout.app')
@section('title', 'account')
@section('content')
<main class="user">
    <section style="background-color: #eee">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            @if(auth()->check() && auth()->user()->avatar)
                            <img src="{{ url('storage/' . auth()->user()->avatar) }}"" alt=" avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px" />
                            @else
                            <img src="{{ url('storage/' . 'users/userno.png') }}" alt=" avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px">
                            @endif
                            <h5 class="my-3">{{Auth::user()->name}}</h5>
                            <p class="text-muted mb-1">{{ auth()->check() && auth()->user()->position ? auth()->user()->position : 'Your work: empty' }}</p>
                            <p class="text-muted mb-4">{{ auth()->check() && auth()->user()->address ? auth()->user()->address : 'Your work: empty' }}</p>
                            <div>
                                <a href="{{route('front.edit_user')}}">edit your info</a>
                            </div>
                            <div>
                                <a href="{{route('front.edit_pass')}}">change your password</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{Auth::user()->name}}</p>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{Auth::user()->email}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 followers-md">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4">Your Follows</p>
                                    <div class="followers">
                                        @if($follows != null and $follows->count() > 0)
                                        @if($follows->count() > 0)
                                        {{$follows->links()}}
                                        @endif

                                        @foreach($follows as $follow)
                                        @foreach($follow->follows as $user)
                                        <div style="width: 100%;" class="follower">
                                            <div class="img">
                                                @if($user->avatar)
                                                <img src="{{ url('storage/' . $user->avatar) }}" alt="" />
                                                @else
                                                <img src="{{ url('storage/' . 'users/userno.png') }}" alt="" />
                                                @endif
                                            </div>
                                            <a style="color: #3B3C4A" href="{{ $user->id == auth()->user()->id ? route('front.user') : route('front.user.page', $user->id) }}">{{$user->name}}</a>
                                        </div>
                                        @endforeach
                                        @endforeach

                                        @else
                                        <div>İstifadəçi heç kimi izləmir</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 followers-md">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4">Your Followers</p>
                                    <div class="followers">
                                        @if($followers != null and $followers->count() > 0)
                                        @if($followers->count() > 0)
                                        {{$followers->links()}}
                                        @endif

                                        @foreach($followers as $follower)
                                        @foreach($follower->followers as $user)
                                        <div style="width: 100%;" class="follower">
                                            <div class="img">
                                                @if($user->avatar)
                                                <img src="{{ url('storage/' . $user->avatar) }}" alt="" />
                                                @else
                                                <img src="{{ url('storage/' . 'users/userno.png') }}" alt="" />
                                                @endif
                                            </div>
                                            <a style="color: #3B3C4A" href="{{ $user->id == auth()->user()->id ? route('front.user') : route('front.user.page', $user->id) }}">{{$user->name}}</a>
                                        </div>
                                        @endforeach
                                        @endforeach

                                        @else
                                        <div>istifadəçinin heç bir izləyicisi yoxdur</div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
