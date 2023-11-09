@extends('front.layout.app')
@section('title', 'blogs')
@section('content')
<main>
    <section class="posts">
        <div class="front_container">
            <form style="display: flex; align-items: center;column-gap: 5px" action="">
                <select style="max-width: 300px; " class="form-select mb-3" aria-label="Default select example">
                    <option selected>filter by category</option>
                    @foreach($cetegories as $category)
                    <option value="{{$category->id}}" >{{$category->title}}</option>
                    @endforeach
                </select>
                <button class="btn btn-success mb-3">axtar</button>
            </form>
            <div class="posts__wrapper">
                @foreach($blogs as $blog)
                <div class="post">
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
                                <img src="https://s3-alpha-sig.figma.com/img/f952/fa47/9a54dc57c3bfdd71f8ab78628ef9ac9a?Expires=1700438400&Signature=AaeS8Ysz7v~CjAQTEUYNpQE9kjceIzhLH3pVAIHHs078-CJEaTonEK~cer0Izafxv1lP3gEpHQFrc7WmttPOYz~aWHC0s0cbOYeBNcn6-LiA2X17BSMiPSfGNmErPqSlRN8rsNNzFvwQp4JxCt~n8IpXgzG~HemFvHAghjQM531kVjXYDwpHp4wRUoQDkckMFHzQS6C6SB1kbpsCwzIQGULT36PAf6IHXuKmb16bguV5DCcGPSvEWdfIy7t7Xwn2LXXqo83CVeGoklWvH1dV79fSKdnOC35oO0rm-So8-UhNjdnY0VDylUt8ige9sjaYy82xr846DIQ0dQH2bLONQA__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4" alt="" />
                            </div>
                            <div class="name">{{$blog->user->name}}</div>
                        </div>
                        <div class="date">{{ $blog->created_at->format('F j, Y') }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div style="width: max-content; margin:0 auto" class="pag">
            {{$blogs->links()}}
        </div>
    </section>
</main>
@endsection
