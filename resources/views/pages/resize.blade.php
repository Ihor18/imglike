@extends('layouts.main')
@section('title',__('localization.index_title'))
@section('meta_description',"")

@section('header-title',"Изменить размер")
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
                                   onchange="handleFiles(this.files)"> их с вашего компьютера</p>
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


    <div class="wrp-settings ">
        <div class="btn-settings" style="display: none"></div>
        <!-- resize -->
        <div class="settings">
            <div class="capt" style="display: none">Изменить размер</div>
            <div class="tabs">
                <div class="tab-radiobox flex nowrap">
                    <div class="item active" data-tab="tab-pixel">В пикселях</div>
                    <div class="item" data-tab="tab-percent">В процентах</div>
                </div>
                <div class="tab-content current tab-pixel">
                    <div class="row flex aic jcsb">
                        <p>Ширина, px</p>
                        <input type="number" name="widthPx" old-val="100" onchange="trackInput(this.value)" value="100">
                    </div>
                    <div class="row flex aic jcsb">
                        <p>Высота, px</p>
                        <input type="number" name="heightPx" disabled value="100">
                    </div>
                    <label class="wrp-select wrp-checkbox">Сохранять пропорции
                        <input type="checkbox" name="save-prop" onchange="lockInput(this.checked)" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="wrp-select wrp-checkbox">Не увеличивать если меньше
                        <input type="checkbox" name="not-scale">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="tab-content tab-percent">
                    <label class="wrp-select wrp-radiobox">Уменьшить на 25%
                        <input type="radio" name="item-2" value="0.25" checked="checked">
                        <span class="checkmark"></span>
                    </label>

                    <label class="wrp-select wrp-radiobox">Уменьшить на 50%
                        <input type="radio" name="item-2" value="0.5">
                        <span class="checkmark"></span>
                    </label>
                    <label class="wrp-select wrp-radiobox">Уменьшить на 75%
                        <input type="radio" name="item-2" value="0.75">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="bottom-btn flex jcc">
                <button class="btn-resize" onclick="resizeImage()">
                    <p>Изменить размер</p>
                </button>
            </div>
        </div>
    </div>

@endsection





