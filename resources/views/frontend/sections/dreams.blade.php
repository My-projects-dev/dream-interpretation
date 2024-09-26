<div class="home">

    @include('frontend.includes.breadcrumbs',
        [
            'background'=> null,
            'title' => __('frontend.dream_interpretation')
         ])
    <div class="container">
        <div class="content">
            @if(count($dreams)>0)
                @foreach($dreams as $dream)
                    <div class="col-md-4">
                        <a href="{{ $dream->appUrl }}">
                            <div class="content-box">
                                <img src="{{asset('uploads/dreams/'.$dream->image) ?? ''}}"
                                     alt="{{$dream->transname ?? ''}}"
                                     class="content-img">

                                <h2>{{Str::limit($dream->transname, 50) ?? ''}} </h2>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="not-found col-12">
                    <h3>@lang('frontend.not_found')</h3>
                </div>
            @endif
        </div>

        {!! $dreams->links('frontend.pagination.circle-pink') !!}
    </div>
</div>
