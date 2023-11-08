@extends('front.layout.app')
@section('title', 'contact')
@section('content')
<main class="contact">
    <div class="container">
        <form id="contact-form" method="post" action="contact.php" role="form">
            <div class="messages"></div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_name" class="form-label">Firstname *</label>
                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required." />
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_lastname" class="form-label">Lastname *</label>
                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." />
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_email" class="form-label">Email *</label>
                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required." />
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_need" class="form-label">Please specify your need *</label>
                        <select id="form_need" name="need" class="form-select" required="required" data-error="Please specify your need.">
                            <option value=""></option>
                            <option value="Request quotation">Request quotation</option>
                            <option value="Request order status">
                                Request order status
                            </option>
                            <option value="Request copy of an invoice">
                                Request copy of an invoice
                            </option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="form_message" class="form-label">Message *</label>
                        <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="mt-3 btn btn-success btn-send">
                        Send message
                    </button>
                </div>
            </div>

        </form>
    </div>
</main>
@endsection
