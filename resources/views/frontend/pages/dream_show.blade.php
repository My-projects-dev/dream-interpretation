@extends('layouts.frontend.master')
@section('meta_title')
    {{ $dream->transtitle ?? ''}}
@endsection
@section('keyword')
    {{ $dream->transkeywords ?? ''}}
@endsection
@section('description')
    {{ $dream->transdescription ?? ''}}
@endsection
@section('content')

    @include('frontend.includes.breadcrumbs',
        [
            'background'=> asset('assets/frontend/img/header.png'),
            'title' => __('frontend.dream_interpretation')
         ])

    <div class="spec bg-danger">
        <h3>{!! settings('dream_header') !!}</h3>
        <p>{!! settings('dream_description') !!}</p>
    </div>

    <div class="owl-carousel">
        @foreach($dreams as $dr)
            <div class="item ">
                <a href="{{ $dr->appUrl }}">
                    <img src="{{asset('uploads/dreams/'.$dr->image) ?? ''}}" alt="{{$dr->transname ?? ''}}">
                    <h3>{{$dr->transname ?? ''}}</h3>
                </a>
            </div>
        @endforeach
    </div>

    <div class="container">
        <div class="content-detail">
            <div class="mx-auto text-center">
                <img src="{{asset('uploads/dreams/'.$dream->image) ?? ''}}">
                <h1>{{$dream->transname ?? ''}}</h1>
            </div>
            <div class="overflow-wrap">
                {!! $dream->transtext ?? '' !!}
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
