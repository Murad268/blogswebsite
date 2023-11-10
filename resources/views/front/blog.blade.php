@extends('front.layout.app')

@section('title', $blog->title)
@section('content')
<main class="blog">
    <div class="front_container">
        <div class="category">{{$blog->category->title}}</div>
        <h1>
            {{$blog->title}}
        </h1>
        <div class="header__body__footer">
            <a href="{{ $blog->user->id == auth()->user()->id ? route('front.user') : route('front.user.page', $blog->user->id) }}" style="color:#696a75" class="info">

                @if($blog->user->avatar)
                <img src="{{ url('storage/' . $blog->user->avatar) }}" alt=" avatar" class="rounded-circle img-fluid" style="width: 50px; height: 50px" />
                @else
                <img src="{{ url('storage/' . 'users/userno.png') }}" alt=" avatar" class="rounded-circle img-fluid" style="width: 50px; height: 50px">
                @endif
                <div class="name">{{$blog->user->name}}</div>
            </a>
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
                <span class="likes_count">{{$count}}</span>
            </a>
            @endif
        </div>
        <div>
            {!!$blog->desc!!}
        </div>


        <div class="comments_main">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                        <div class="card-body p-4">
                            <form id="add_comment" method="post" action="{{route('front.comment', $blog->id)}}" class="form-outline mb-4">
                                @csrf
                                @method('post')
                                <input name="comment" type="text" id="addANote" class="form-control" placeholder="Type comment..." />
                                @error('comment')
                                <div style="font-size: 12px; padding: 10px;" class="mt-2 alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <button style="display:block;font-size: 10px; margin:0 auto" class="btn mt-2 btn-success">Add comment</button>
                            </form>

                            <div data-id="{{$blog->id}}" class="comments">
                                <div class="mb-4">
                                    {{$comments->links()}}
                                </div>
                                @foreach($comments as $comment)
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <p>{{$comment->comment}}</p>
                                        <div class="mt-3 d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                @if(auth()->check() && auth()->user()->avatar)
                                                <img src="{{ url('storage/' . $blog->user->avatar) }}" alt=" avatar" class="rounded-circle img-fluid" style="width: 50px; height: 50px" />
                                                @else

                                                <img src="{{url('storage/'.'users/userno.png')}}" alt=" avatar" class="rounded-circle img-fluid" style="width: 50px; height: 50px" />
                                                @endif

                                                <p class="small mb-0 ms-2">{{$blog->user->name}}</p>
                                                @if($comment->user->id == auth()->user()->id )
                                                <a id="delete-button" href="javascript:void(0)" data-id="{{$comment->id}}" onclick="deleteComment(event)" style="margin-left: 10px;">Delete</a>
                                                @endif



                                            </div>
                                            <div class="d-flex flex-row align-items-center">
                                                <p class="small text-muted mb-0">{{ $blog->created_at->format('F j, Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
