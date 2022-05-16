<header>
    <div class="container flex jcsb aic">
        <ul class="top-menu flex aic">
            <li class="all-apps">
                <a href=""  class="icon-menu flex aic"><p>{{__('localization.all')}} {{__('localization.instruments')}}</p></a>
            </li>
            <li>
                <a href="" class="pdf">PDFLike</a>
            </li>
        </ul>
        <a href="{{route('index')}}" class="logo">
            <img src="{{asset('img/logo-white.png')}}" alt="">
        </a>
        <ul class="right-menu flex aic">
            <li class="lang">
                <a href="" class="flex aic">
                    <i class="fal fa-globe-americas"></i>
                    <p>{{App\Models\Localization::getLangTitle(app()->getLocale())}}</p>
                    <i class="fal fa-angle-down"></i>
                    <i class="fal fa-angle-up"></i>
                </a>
                <div class="dropdown">
                    <ul class="flex jcsb">
                        @foreach($arrayLang as $lang)
                            @if(in_array($lang,$arrayApproveLang))
                                <li><a href="{{getUrl($lang)}}">{{App\Models\Localization::getLangTitle($lang)}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </li>
            <li class="burger mobile">
                <span></span>
                <span></span>
                <span></span>
            </li>
        </ul>
    </div>
</header>
