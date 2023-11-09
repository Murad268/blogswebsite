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
                    <img src="https://s3-alpha-sig.figma.com/img/f952/fa47/9a54dc57c3bfdd71f8ab78628ef9ac9a?Expires=1700438400&Signature=AaeS8Ysz7v~CjAQTEUYNpQE9kjceIzhLH3pVAIHHs078-CJEaTonEK~cer0Izafxv1lP3gEpHQFrc7WmttPOYz~aWHC0s0cbOYeBNcn6-LiA2X17BSMiPSfGNmErPqSlRN8rsNNzFvwQp4JxCt~n8IpXgzG~HemFvHAghjQM531kVjXYDwpHp4wRUoQDkckMFHzQS6C6SB1kbpsCwzIQGULT36PAf6IHXuKmb16bguV5DCcGPSvEWdfIy7t7Xwn2LXXqo83CVeGoklWvH1dV79fSKdnOC35oO0rm-So8-UhNjdnY0VDylUt8ige9sjaYy82xr846DIQ0dQH2bLONQA__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4" alt="" />
                </div>
                <div class="name">{{$blog->user->name}}</div>
            </div>
            <div class="date">{{ $blog->created_at->format('F j, Y') }}</div>
        </div>
        <div class="blog__banner">
            <img style="max-height: 500px;" src="{{ url('storage/' . $blog->banner) }}" alt="" />
        </div>
        <div>
            {!!$blog->desc!!}
        </div>
    </div>
</main>
@endsection
