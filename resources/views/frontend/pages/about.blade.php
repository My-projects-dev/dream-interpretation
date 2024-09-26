@extends('layouts.frontend.master')
@section('meta_title')
    {{ $about->transtitle ?? ''}}
@endsection
@section('content')

    @include('frontend.includes.breadcrumbs',
        [
            'background'=> asset('assets/frontend/img/header.png'),
            'title' => __('frontend.about_dream')
         ])


    <div class="container">
        <div class="content-detail">
            <div class="mx-auto text-center">
                <h2>{{$about->transtitle ?? ''}}</h2>
            </div>
            <div class="overflow-wrap">
                {!! $about->transcontent ?? '' !!}
            </div>
        </div>
    </div>

    <script>
        // Scroll to the content-detail section when the page loads
        window.onload = function() {
            var contentDetail = document.querySelector('.content-detail');
            if (contentDetail) {
                contentDetail.scrollIntoView({ behavior: 'smooth' });
            }
        };
    </script>

@endsection
