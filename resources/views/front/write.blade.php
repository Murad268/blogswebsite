@extends('front.layout.app')
@section('title', __('page_titles.write'))
@section('content')

<main class="write">
    <div class="front_container">
        <div class="write__form">
            <div>
                <h1 class="write__blog">{{__('translations.write_your_blog')}}</h1>

                <form enctype="multipart/form-data" method="post" action="{{route('front.write_block')}}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="mb-2">{{__('translations.enter_your_blog_title')}}</label>
                        <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('translations.enter_your_blog_title')}}" />
                        @error('title')
                        <div style="font-size: 12px; padding: 10px;" class="mt-2 alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label mb-2">{{__('translations.blog_image')}}</label>
                        <input name="image" class="form-control" type="file" id="formFile" />
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label mb-2">{{__('translations.blog_banner_photo')}}</label>
                        <input name="banner" class="form-control" type="file" id="formFile" />
                    </div>

                    <label for="formFile" class="form-label mb-2">{{__('translations.select_blog_category')}}</label>
                    <select name="category_id" class="form-select mb-3" aria-label="Default select example">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div style="font-size: 12px; padding: 10px;" class="mt-2 alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="mb-3">
                        <label for="formFile" class="form-label mb-2">{{__('translations.input_your_blog')}}</label>
                        <textarea id="editor" name="desc"></textarea>
                        @error('desc')
                        <div style="font-size: 12px; padding: 10px;" class="mt-2 alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">{{__('translations.write')}}</button>
                </form>
            </div>
            <div class="form__img">
                <img src="https://contenthub-static.grammarly.com/blog/wp-content/uploads/2017/11/how-to-write-a-blog-post.jpeg" alt="" />
            </div>
        </div>

    </div>
</main>
@endsection
