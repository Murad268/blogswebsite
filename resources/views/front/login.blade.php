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
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                        {{__('translations.login')}}
                    </p>
                    <form method="post" action="{{route('front.user.login_check')}}">
                        @csrf

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input name="email" type="email" id="form3Example3" class="form-control form-control-lg" placeholder="{{__('translations.enter_a_valid_email_address')}}" />
                            <label class="form-label" for="form3Example3">{{__('translations.email_address')}}</label>
                        </div>
                        @error('email')
                        <div style="font-size: 12px; margin-top: -20px; padding: 10px;" class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input name="password" type="password" id="form3Example4" class="form-control form-control-lg" placeholder="{{__('translations.enter_password')}}" />
                            <label class="form-label" for="form3Example4">{{__('translations.password')}}</label>
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
                                    {{__('translations.remember_me')}}
                                </label>
                            </div>
                        </div>
                        @if(session()->has('message'))
                        <div class="mt-3 alert alert-danger">
                            {{ session('message') }}
                        </div>
                        @endif
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem">
                                {{__('translations.login')}}
                            </button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">
                                {{__('translations.dont_have_an_account')}}
                                <a href="{{route('front.user.register')}}" class="link-danger"> {{__('translations.register')}}</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
