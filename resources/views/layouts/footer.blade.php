<footer>
    <div class="container">
        <div class="row flex jcsb">
            <div class="left">
                <a href="{{route('index')}}" class="logo">
                    <img src="{{asset('img/logo-white.png')}}" alt="">
                </a>
                <p> {{__('localization.free_online_editor')}}<br>{{__('localization.always_image')}}</p>
            </div>
            <ul class="bottom-menu flex aic">
                <li>
                    <a href="{{route('compress')}}">{{__('localization.compress')}} {{__('localization.image')}}</a>
                </li>
                <li>
                    <a href="{{route('redactor')}}">{{__('localization.redactor')}} {{__('localization.image')}}</a>
                </li>
                <li>
                    <a href="{{route('convert-from-jpg')}}">{{__('localization.convert')}} {{__('localization.from')}} JPG</a>
                </li>
                <li>
                    <a href="{{route('resize')}}">{{__('localization.change')}} {{__('localization.size')}}</a>
                </li>
                <li>
                    <a href="{{route('watermark')}}">{{__('localization.impose')}} {{__('localization.watermark')}}</a>
                </li>
                <li>
                    <a href="{{route('html-to-image')}}">HTML {{__('localization.in')}} {{__('localization.image')}}</a>
                </li>
                <li>
                    <a href="{{route('crop')}}">{{__('localization.cut')}} {{__('localization.image')}}</a>
                </li>
                <li>
                    <a href="{{route('convert-in-jpg')}}">{{__('localization.convert')}} {{__('localization.in')}} JPG</a>
                </li>
                <li>
                    <a href="{{route('meme')}}">{{__('localization.meme_generator')}}</a>
                </li>
                <li>
                    <a href="{{route('rotate')}}">{{__('localization.rotate')}} {{__('localization.image')}}</a>
                </li>
            </ul>
        </div>
        <div class="row flex aic jcsb">
            <div class="left">
                <div class="social flex nowrap">
                    <a class="fb"></a>
                    <a class="tw"></a>
                    <a class="yt"></a>
                    <a class="ig"></a>
                </div>
            </div>
            <ul class="bottom-menu flex aic">
                <li>
                    <a href="">{{__('localization.privacy_policy')}}</a>
                </li>
                <li>
                    <a href="">{{__('localization.terms')}}</a>
                </li>
                <li>
                    <p>Copyright © 2022. All Rights Reserved.</p>
                </li>
            </ul>
        </div>
    </div>
</footer>

