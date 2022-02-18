<div class="wrap-content" style="display: none">
    <div class="download-block">
        <img class="image" src="img/images.svg">
        <button class="btn-download" onclick="load()"><img src="img/cloud.svg">{{$btnTitle}}
        </button>
        <div class="btns-share">
            <button><img src="img/google-drive.svg"><span>Google Drive</span></button>
            <button><img src="img/dropbox.svg"><span>Dropbox</span></button>
            <button><img src="img/share.svg"><span>Поделиться</span></button>
            <button><img src="img/trash-icon.svg"><span>Удалить</span></button>
        </div>
        <div class="or-line">или</div>
        <div class="nav-icons flex">
            <a href="{{route('rotate')}}">
                <div class="hint"><p>Повернуть изображение</p></div>
                <img src="img/icon-rotate-red.svg">
            </a>
            <a href="{{route('convert-in-jpg')}}">
                <div class="hint"><p>Конвертировать изображение</p></div>
                <img src="img/icon-convert-red.svg">
            </a>
            <a href="{{route('watermark')}}">
                <div class="hint"><p>Убрать водяной знак</p></div>
                <img src="img/icon-watermark-red.svg">
            </a>
            <a href="{{route('compress')}}">
                <div class="hint"><p>Сжать изображение</p></div>
                <img src="img/icon-resize-red.svg">
            </a>
        </div>
        <span>Как я могу вас отблагодарить?</span>
        <p>Если IMGLike был вам полезен, вы также можете нам помочь</p>
        <div class="btns-social">
            <button class="facebook"><img src="img/facebook-icon.svg"> Facebook</button>
            <button class="twitter"><img src="img/twitter-icon.svg"> Twitter</button>
            <button class="linkedin"><img src="img/linkedin-icon.svg"> LinkedIn</button>
        </div>
    </div>
</div>
