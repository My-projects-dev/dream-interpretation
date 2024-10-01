<nav class="nav d-flex justify-content-between">
    <i class="uil uil-bars navOpenBtn"></i>
    <a href="{{route('home',['language'=>app()->getLocale()])}}" class="logo">@lang('frontend.dream_interpretation')</a>
    <ul class="nav-links">
        <i class="uil uil-times navCloseBtn"></i>
        <li><a href="{{route('home',['language'=>app()->getLocale()])}}">@lang('frontend.home')</a></li>
        <li><a href="{{route('about',['language'=>app()->getLocale()])}}">@lang('frontend.about_dream')</a></li>
        <li><a href="{{route('contact.form',['language'=>app()->getLocale()])}}">@lang('frontend.contact')</a></li>
        <li class="dropdown">
            <a>@lang('frontend.language')</a>
            <i class="bx bxs-chevron-down js-arrow arrow"></i>
            <ul class="sub-menu">
                @foreach($languages as $lang)
                    <li><a href="{{ route('home', ['language' => $lang->lang_code]) }}" class="{{app()->getLocale()==$lang->lang_code ? 'active' : ''}}">{{$lang->language}}</a></li>
                @endforeach
            </ul>
        </li>
    </ul>
    <i class="uil uil-search search-icon" id="searchIcon"></i>
    <div class="search-box">
        <form action="{{route('search.dream',['language'=>app()->getLocale()])}}" method="GET">
            <button type="submit"> <i class="uil uil-search search-icon"></i></button>
            <input type="text" placeholder="@lang('frontend.placeholders.search')..." name="search" id="searchInput"/>
        </form>
    </div>
</nav>
