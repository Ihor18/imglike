@extends('layouts.main')
@section('title',__('localization.index_title'))
@section('meta_description',"")

@section('header-title',"Конвертировать из JPG")
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
                            <input type="file" id="file_input_id" name="file" multiple accept=".jpg,.jpeg,.png"
                                   onchange="refresh(this.files)"> их с вашего компьютера</p>
                    </form>
                </div>

                <button class="upload-mobile" onclick="mobileBtnClick()">Загрузить изображения</button>
            </div>

            @include('layouts.download-image',['btnTitle'=>"Скачать изображения"])

        </div>
        @include('layouts.safe-transfer')
    </div>

    <div class="wrp-settings " style="display: none">
        <div class="btn-settings"></div>
        <!-- convert -->
        <div class="settings">
            <div class="capt">Конвертировать из JPG</div>
            <div class="tabs">
                <div class="tab-radiobox flex nowrap">
                    <div class="item active" data-tab="tab-png">в PNG</div>
                    <div class="item" data-tab="tab-gif">в GIF</div>
                </div>
                <div class="tab-content current tab-png">
                    <center>Все изображения будут преобразованы в формат PNG</center>
                </div>
                <div class="tab-content tab-gif">
                    <label class="wrp-select wrp-radiobox">Статичный GIF
                        <input type="radio" data-type="static" name="item-2" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="wrp-select wrp-radiobox">Анимированный GIF
                        <input type="radio" data-type="animated" name="item-2">
                        <span class="checkmark"></span>
                    </label>
                    <div class="interval">
                        <p>Интервал кадров, сек <input type="number" name="duration" min="0.1" max="0.9" step="0.1" value="0.5"></p>
                        <label class="wrp-select wrp-checkbox">Сохранять пропорции
                            <input type="checkbox" name="item-1" checked>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="bottom-btn flex jcc">
                <button class="btn-convert" onclick="convertFromJpeg()">
                    <p>Конвертировать из JPG</p>
                </button>
            </div>
        </div>
    </div>

@endsection
