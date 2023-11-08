@extends('front.layout.app')
@section('title', 'write a new blogs')
@section('content')

<main class="write">
    <div class="front_container">
        <div class="write__form">
            <div>
                <h1 class="write__blog">Write your blog</h1>

                <form>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="mb-2">Blog title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your blog title" />
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label mb-2">Default file input example</label>
                        <input class="form-control" type="file" id="formFile" />
                    </div>
                    <label for="formFile" class="form-label mb-2">Select blog category</label>
                    <select class="form-select mb-3" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Write</button>
                </form>
            </div>
            <div class="form__img">
                <img src="https://contenthub-static.grammarly.com/blog/wp-content/uploads/2017/11/how-to-write-a-blog-post.jpeg" alt="" />
            </div>
        </div>

    </div>
</main>
@endsection
