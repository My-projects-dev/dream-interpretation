@extends('layouts.frontend.master')
@section('meta_title')
    @lang('frontend.dream_interpretation')
@endsection
@section('keyword')
    @lang('frontend.dream_interpretation')
@endsection
@section('description')
    @lang('frontend.dream_interpretation')
@endsection
@section('content')

    <div class="home">
        <div id="alertContainer"></div>

        @include('frontend.includes.breadcrumbs',
            [
                'background'=> null,
                'title' => __('frontend.contact')
             ])

        <div class="container">
            <div class="contact_form">
                <form id="contactForm" action="{{route('contact.send',['language'=>app()->getLocale()])}}" method="POST">
                    @csrf
                    <label for="full_name"> @lang('frontend.full_name')* </label>
                        <input type="text" name="full_name" required maxlength="100">

                    <label for="email"> @lang('frontend.email')* </label>
                        <input type="email" name="email" required maxlength="255">

                    <label for="subject"> @lang('frontend.subject')* </label>
                        <input type="text" name="subject" required maxlength="500">

                    <label for="message">@lang('frontend.message')*</label>
                    <textarea name="message" required></textarea>
                    <input type="submit" id="submitButton" class="blue-button" value="@lang('frontend.send')">
                </form>
            </div>
        </div>
    </div>
    <script>
        var sendingText = "@lang('frontend.sending')....";
        var success = "@lang('frontend.success')";
        var error = "@lang('frontend.error')";
        var wrong = "@lang('frontend.something_went_wrong')";
        var validationError = "@lang('frontend.validation_error')";
    </script>
@endsection
