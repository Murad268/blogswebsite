@extends('front.layout.app')
@section('title', __('page_titles.home'))

@section('headbody')
<div class="header__body">
    <div class="front_container">
        <div class="header__body__content">
            <img src="{{ url('storage/' . $blog->banner) }}" alt="" />
            <div class="header__body__content__block">
                <div>
                    <div class="category">{{$blog->category->title}}</div>
                    <h2>
                        {{$blog->title}}
                    </h2>
                    <div class="header__body__footer">
                        <div class="info">
                            <div class="img">
                                @if($blog->user->avatar)
                                <img src="{{ url('storage/' . $blog->user->avatar) }}" alt=" avatar" class="rounded-circle img-fluid" style="width: 50px; height: 50px" />
                                @else
                                <img src="{{ url('storage/' . 'users/userno.png') }}" alt=" avatar" class="rounded-circle img-fluid" style="width: 50px; height: 50px">
                                @endif
                            </div>
                            <div class="name">{{$blog->user->name}}</div>
                            <div class="date">{{ $blog->created_at->format('F j, Y') }}</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<main>
    <section class="posts">
        <div class="front_container">
            <h3 class="title_sec">{{__('translations.latest')}}</h3>
            <div class="posts__wrapper">
                @foreach($blogs as $blog)
                <a href="{{route('front.blog', $blog->slug)}}" class="post">
                    <div class="post__img">
                        <img src="{{ url('storage/' . $blog->image) }}" alt="" />
                    </div>
                    <div class="category">{{$blog->category->title}}</div>
                    <h2>
                        {{$blog->title}}
                    </h2>
                    <div class="header__body__footer">
                        <div class="info">
                            @if( $blog->user->avatar)
                            <img src="{{ url('storage/' . $blog->user->avatar) }}"" alt=" avatar" class="rounded-circle img-fluid" style="width: 50px; height: 50px" />
                            @else
                            <img src="{{ url('storage/' . 'users/userno.png') }}" alt=" avatar" class="rounded-circle img-fluid" style="width: 50px; height: 50px">
                            @endif
                            <div class="name">{{$blog->user->name}}</div>
                        </div>
                        <div class="date">{{ $blog->created_at->format('F j, Y') }}</div>
                    </div>
                </a>
                @endforeach


            </div>
        </div>
    </section>
</main>
@endsection
