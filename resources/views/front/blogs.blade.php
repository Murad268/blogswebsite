@extends('front.layout.app')
@section('title', 'blogs')
@section('content')
<main>
    <section class="posts">
        <div class="front_container">
            <form style="display: flex; align-items: center;column-gap: 5px" action="{{route('front.blogs')}}">
                @foreach($cetegories as $category)
                <a style="background-color: #7085F7; color: white" class="mb-3 btn" href="{{route('front.blogs', $category->slug)}}">{{$category->title}}</a>
                @endforeach
            </form>
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
                            <div class="img">
                                <img src="{{ url('storage/' . $blog->user->avatar) }}" alt="" />
                            </div>
                            <div class="name">{{$blog->user->name}}</div>
                        </div>
                        <div class="date">{{ $blog->created_at->format('F j, Y') }}</div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        <div style="width: max-content; margin:0 auto" class="pag">
            {{$blogs->links()}}
        </div>
    </section>
</main>
@endsection
