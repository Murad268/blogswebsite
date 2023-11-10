@extends('front.layout.app')
@section('title', __('page_titles.editpass'))

@section('content')

<main class="write">
    <div class="front_container">
        <div class="write__form">
            <div>
                <h1 class="write__blog">{{__('translations.change_your_password')}}</h1>

                <form enctype="multipart/form-data" method="post" action="{{route('front.update_pass')}}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="mb-2">{{__('translations.new_password')}}</label>
                        <input name="password" value="new password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your blog title" />
                        @error('password')
                        <div style="font-size: 12px; padding: 10px;" class="mt-2 alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="mb-2">{{__('translations.reply_new_password')}}</label>
                        <input name="reply_password" value="reply new password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your blog title" />
                        @error('reply_password')
                        <div style="font-size: 12px; padding: 10px;" class="mt-2 alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>



                    <button type="submit" class="btn btn-primary">{{__('translations.change')}}</button>
                </form>
            </div>
            <div class="form__img">
                <img src="https://contenthub-static.grammarly.com/blog/wp-content/uploads/2017/11/how-to-write-a-blog-post.jpeg" alt="" />
            </div>
        </div>

    </div>
</main>
@endsection
