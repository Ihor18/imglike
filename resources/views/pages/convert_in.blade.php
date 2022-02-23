@extends('layouts.main')
@section('title',__('localization.index_title'))
@section('meta_description',"")

@section('header-title',"Конвертировать в JPG")
@section('header-capt')
    <div class="capt">Преобразовывайте форматы PNG, GIF, TIF, PSD, SVG, WEBP, HEIC или RAW to JPG. Конвертируйте сразу
        несколько изображений в JPG онлайн.
    </div>
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
                            <input type="file" id="file_input_id" name="file" multiple accept=".jpg,.jpeg,.png,.bmp,.gif,.svg"
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
        <div class="btn-settings disabled"></div>
    </div>

@endsection






