@extends('front.layout.app')
@section('title', '')
@section('content')
<main class="blog">
    <div class="front_container">
        <div class="category">{{$blog->category->title}}</div>
        <h1>
            {{$blog->title}}
        </h1>
        <div class="header__body__footer">
            <div class="info">
                <div class="img">
                    <img src="{{ url('storage/' . $blog->user->avatar) }}" alt="" />
                </div>
                <div class="name">{{$blog->user->name}}</div>
            </div>
            <div class="date">{{ $blog->created_at->format('F j, Y') }}</div>
        </div>
        <div class="blog__banner">
            <img style="max-height: 500px;" src="{{ url('storage/' . $blog->banner) }}" alt="" />
        </div>
        <div style="font-size: 20px; color: #4B6BFB" class="controlls">
            @if($isLike)
            <a style="cursor:pointer">
                <i data-id="{{$blog->id}}" class="fa fa-heart like" aria-hidden="true"></i>
                <span class="likes_count">{{$count}}</span>
            </a>
            @else
            <a style="cursor:pointer">
                <i data-id="{{$blog->id}}" class="fa-regular fa-heart like" aria-hidden="true"></i>
                <span class="likes_count">0</span>
            </a>
            @endif
        </div>
        <div>
            {!!$blog->desc!!}
        </div>
    </div>
</main>
@endsection