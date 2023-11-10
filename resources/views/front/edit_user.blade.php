@extends('front.layout.app')
@section('title', __('page_titles.edituser'))

@section('content')

<main class="write">
    <div class="front_container">
        <div class="write__form">
            <div>
                <h1 class="write__blog">edit your profile</h1>

                <form enctype="multipart/form-data" method="post" action="{{route('front.update_user')}}">
                    @csrf
                    <div class="form-group mb-3">
                        @if(auth()->check() && auth()->user()->avatar)
                        <img style="width: 200px; height: 200px" src="{{ url('storage/' . auth()->user()->avatar) }}" alt="User Profile Photo">
                        @else
                        <img style="width: 200px; height: 200px" src="{{ url('storage/' . 'users/userno.png') }}" alt="Default Profile Photo">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label mb-2">edit your photo</label>
                        <input name="avatar" class="form-control" type="file" id="formFile" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="mb-2">edit name</label>
                        <input name="name" value="{{auth()->user()->name}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your blog title" />
                        @error('name')
                        <div style="font-size: 12px; padding: 10px;" class="mt-2 alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="mb-2">edit email</label>
                        <input name="email" type="text" value="{{auth()->user()->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your blog title" />
                        @error('email')
                        <div style="font-size: 12px; padding: 10px;" class="mt-2 alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="mb-2">edit work</label>
                        <input value="{{auth()->user()->position}}" name="position" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your blog title" />
                        @error('position')
                        <div style="font-size: 12px; padding: 10px;" class="mt-2 alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="mb-2">edit address</label>
                        <input value="{{auth()->user()->address}}" name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your blog title" />
                        @error('address')
                        <div style="font-size: 12px; padding: 10px;" class="mt-2 alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>



                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
            <div class="form__img">
                <img src="https://contenthub-static.grammarly.com/blog/wp-content/uploads/2017/11/how-to-write-a-blog-post.jpeg" alt="" />
            </div>
        </div>

    </div>
</main>
@endsection
