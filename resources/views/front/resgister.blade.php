@extends('front.layout.app')
@section('title', __('page_titles.register'))

@section('content')
<main>
    <section style="height: 800px;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border: none">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                                        Sign up
                                    </p>
                                    <form id="registrationForm" method="post" action="{{route('front.user.register_add')}}" class="mx-1 mx-md-4">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input name="name" type="text" id="form3Example1c" class="form-control" />
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                            </div>

                                        </div>
                                        @error('name')
                                        <div style="font-size: 12px; margin-top: -20px; padding: 10px;margin-left: 15px" class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input name="email" type="email" id="form3Example3c" class="form-control" />
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>

                                        </div>
                                        @error('email')
                                        <div style="font-size: 12px; margin-top: -20px; padding: 10px;margin-left: 15px" class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input name="password" type="password" id="form3Example4c" class="form-control" />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>

                                        </div>
                                        @error('password')
                                        <div style="font-size: 12px; margin-top: -20px; padding: 10px;margin-left: 15px" class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" name="password__repeat" id="form3Example4cd" class="form-control" />
                                                <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                            </div>

                                        </div>
                                        @error('password__repeat')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                Register
                                            </button>
                                            <p class="small fw-bold mt-2 pt-1 mb-0">
                                                Have an account?
                                                <a href="{{route('front.user.login')}}" class="link-danger">login</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
