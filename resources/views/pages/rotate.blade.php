@extends('layouts.main')
@section('title',__('localization.index_title'))
@section('meta_description',"")

@section('header-title',"Повернуть изображение")
@section('header-capt')
    <div class="capt">Все изображения будут изменены с заданными параметрами.</div>
@endsection

@section('content')
    <div class="content white">
        <div id="load" class="container">
            <div class="wrap-content">
                <div class="upload-place">
                    <form id="send-image" method="post" action="{{route('compress-image')}}">
                        @csrf
                        <img src="img/open-folder.svg">
                        <span>Перетащите в это поле ваши <label for="file_input_id"><a>изображения</a></label></span>
                        <p>или <label for="file_input_id" class="upload-link">загрузите</label>
                            <input type="file" id="file_input_id" name="file" multiple accept="image/*"
                                   onchange="refresh(this.files)"> их с вашего компьютера</p>
                    </form>
                </div>

                <button class="upload-mobile" onclick="mobileBtnClick()">Загрузить изображения</button>
                {{--                <div class="upload-buttons flex aic jcc">--}}
                {{--                    <button><img src="img/google-drive.svg">Google Drive</button>--}}
                {{--                    <button><img src="img/dropbox.svg">Dropbox</button>--}}
                {{--                </div>--}}
            </div>

            @include('layouts.download-image',['btnTitle'=>"Скачать повернутые изображения"])

        </div>
        @include('layouts.safe-transfer')
    </div>


    <div class="wrp-settings " style="display: none">
        <div class="btn-settings"></div>
        <!-- rotate -->
        <div class="settings"  >
            <div class="capt">Параметры поворота</div>
            <div class="tabs rotate">
                <div class="tab-radiobox flex nowrap">
                    <div class="item active" data-tab="tab-all"><div class="icon"></div>Все</div>
                    <div class="item" data-tab="tab-portret"><div class="icon"></div>Портрет</div>
                    <div class="item" data-tab="tab-album"><div class="icon"></div>Альбом</div>
                </div>
                <div class="tab-content current tab-all">
                    <p>Повернуть:</p>
                    <div class="flex jcsb">
                        <div class="right" onclick="rotateDeg(90)"><div class="icon"></div>Вправо</div>
                        <div class="left" onclick="rotateDeg(-90)"><div class="icon"></div>Влево</div>
                    </div>
                    <button class="btn-grey discard" onclick="reset()"><p>Сбросить всё</p></button>
                </div>
                <div class="tab-content tab-portret">
                </div>
                <div class="tab-content tab-album">
                </div>
            </div>
            <div class="bottom-btn flex jcc">
                <button class="btn-rotate" onclick="rotateImage()">
                    <p>Повернуть</p>
                </button>
            </div>
        </div>
    </div>


@endsection





