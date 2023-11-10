@extends('front.layout.app')
@section('title', __('page_titles.contact'))

@section('content')
<main class="contact">
    <div class="container">
        <form id="contact-form" method="post" action="{{route('front.mail')}}" role="form">
            @csrf
            <div class="messages"></div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_name" class="form-label">{{__('translations.firstname')}} *</label>
                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" data-error="Firstname is required." />
                        @error('name')
                        <div style="font-size: 12px; padding: 10px;" class="mt-2 alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_lastname" class="form-label">{{__('translations.lastname')}} *</label>
                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" data-error="Lastname is required." />
                        @error('surname')
                        <div style="font-size: 12px; padding: 10px;" class="mt-2 alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_email" class="form-label">{{__('translations.email')}} *</label>
                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" data-error="Valid email is required." />
                        @error('email')
                        <div style="font-size: 12px; padding: 10px;" class="mt-2 alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="form_message" class="form-label">{{__('translations.message')}} *</label>
                        <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" data-error="Please, leave us a message."></textarea>
                        @error('message')
                        <div style="font-size: 12px; padding: 10px;" class="mt-2 alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="mt-3 btn btn-success btn-send">
                        {{__('translations.send_message')}}
                    </button>
                </div>
            </div>

        </form>
    </div>

</main>
@endsection
