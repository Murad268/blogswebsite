@extends('front.layout.app')
@section('title', 'home')
@section('headbody')
<div class="header__body">
    <div class="front_container">
        <div class="header__body__content">
            <img src="{{asset('assets/front/images/header/Image (4).png')}}" alt="" />
            <div class="header__body__content__block">
                <div>
                    <div class="category">Technology</div>
                    <h2>
                        The Impact of Technology on the Workplace: How Technology is
                        Changing
                    </h2>
                    <div class="header__body__footer">
                        <div class="info">
                            <div class="img">
                                <img src="https://s3-alpha-sig.figma.com/img/f952/fa47/9a54dc57c3bfdd71f8ab78628ef9ac9a?Expires=1700438400&Signature=AaeS8Ysz7v~CjAQTEUYNpQE9kjceIzhLH3pVAIHHs078-CJEaTonEK~cer0Izafxv1lP3gEpHQFrc7WmttPOYz~aWHC0s0cbOYeBNcn6-LiA2X17BSMiPSfGNmErPqSlRN8rsNNzFvwQp4JxCt~n8IpXgzG~HemFvHAghjQM531kVjXYDwpHp4wRUoQDkckMFHzQS6C6SB1kbpsCwzIQGULT36PAf6IHXuKmb16bguV5DCcGPSvEWdfIy7t7Xwn2LXXqo83CVeGoklWvH1dV79fSKdnOC35oO0rm-So8-UhNjdnY0VDylUt8ige9sjaYy82xr846DIQ0dQH2bLONQA__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4" alt="" />
                            </div>
                            <div class="name">Jason Francisco</div>
                        </div>
                        <div class="date">August 20, 2022</div>
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
            <h3 class="title_sec">Latest Post</h3>
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
                            @if(auth()->check() && auth()->user()->avatar)
                            <img src="{{ url('storage/' . blog()->user()->avatar) }}"" alt=" avatar" class="rounded-circle img-fluid" style="width: 50px; height: 50px" />
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
