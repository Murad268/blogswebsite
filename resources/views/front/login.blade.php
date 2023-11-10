@extends('front.layout.app')
@section('title', __('page_titles.login'))

@section('content')
<main class="login">
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image" />
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="post" action="{{route('front.user.login_check')}}">
                        @csrf

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input name="email" type="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid email address" />
                            <label class="form-label" for="form3Example3">Email address</label>
                        </div>
                        @error('email')
                        <div style="font-size: 12px; margin-top: -20px; padding: 10px;" class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input name="password" type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>
                        @error('password')
                        <div style="font-size: 12px; margin-top: -20px; padding: 10px;" class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="d-flex justify-content-between align-items-center">

                            <div class="form-check mb-0">
                                <input name="remember" class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <a href="#!" class="text-body">Forgot password?</a>
                        </div>
                        @if(session()->has('message'))
                        <div class="mt-3 alert alert-danger">
                            {{ session('message') }}
                        </div>
                        @endif
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem">
                                Login
                            </button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">
                                Don't have an account?
                                <a href="{{route('front.user.register')}}" class="link-danger">Register</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
