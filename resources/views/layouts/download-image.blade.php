<div class="wrap-content" style="display: none">
    <div class="download-block">
        <img class="image" src="{{asset('img/images.svg')}}">
        <button class="btn-download" onclick="load()"><img src="{{asset('img/cloud.svg')}}">{{$btnTitle}}
        </button>
        <div class="btns-share">
            <button><img src="{{asset('img/google-drive.svg')}}"><span>Google Drive</span></button>
            <button><img src="{{asset('img/dropbox.svg')}}"><span>Dropbox</span></button>
            <button><img src="{{asset('img/share.svg')}}"><span>{{__('localization.share')}}</span></button>
            <button><img src="{{asset('img/trash-icon.svg')}}"><span>{{__('localization.delete')}}</span></button>
        </div>
        <div class="or-line">{{__('localization.or')}}</div>
        <div class="nav-icons flex">
            <a href="{{route('rotate')}}">
                <div class="hint"><p>{{__('localization.rotate')}} {{__('localization.image')}}</p></div>
                <img src="{{asset('img/icon-rotate-red.svg')}}">
            </a>
            <a href="{{route('convert-in-jpg')}}">
                <div class="hint"><p>{{__('localization.convert')}} {{__('localization.image')}}</p></div>
                <img src="{{asset('img/icon-convert-red.svg')}}">
            </a>
            <a href="{{route('watermark')}}">
                <div class="hint"><p>{{__('localization.remove')}} {{__('localization.watermark')}}</p></div>
                <img src="{{asset('img/icon-watermark-red.svg')}}">
            </a>
            <a href="{{route('compress')}}">
                <div class="hint"><p>{{__('localization.compress')}} {{__('localization.image')}}</p></div>
                <img src="{{asset('img/icon-resize-red.svg')}}">
            </a>
        </div>
        <span>{{__('localization.thanks')}}</span>
        <p>{{__('localization.img_helpful')}}</p>
        <div class="btns-social">
            <button class="facebook"><img src="{{asset('img/facebook-icon.svg')}}"> Facebook</button>
            <button class="twitter"><img src="{{asset('img/twitter-icon.svg')}}"> Twitter</button>
            <button class="linkedin"><img src="{{asset('img/linkedin-icon.svg')}}"> LinkedIn</button>
        </div>
    </div>
</div>
