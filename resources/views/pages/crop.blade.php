@extends('layouts.main')
@section('title',__('localization.index_title'))
@section('meta_description',"")

@section('header-title',"Обрезать изображение")
@section('header-capt')
    <div class="capt">Все изображения будут изменены с заданными параметрами.</div>
    <button class="tool-button" style="display: none" onclick="crop()"><img src="img/icon-crop.svg"><span>Обрезать изображение</span></button>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/cropper.css')}}">
    <script src="{{asset("js/cropper.js")}}"></script>

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
                        <p>или <label for="file_input_id" class="upload-link" onclick="fileClick()">загрузите</label>
                            <input type="file" id="file_input_id" name="file" accept="image/*"
                                   onchange="refresh(this.files)"> их с вашего компьютера</p>
                    </form>
                </div>

                <button class="upload-mobile" onclick="$('#file_input_id').click()">Загрузить изображения</button>
            </div>
        </div>
        @include('layouts.safe-transfer')
    </div>
    <div class="wrp-settings ">
        <div class="btn-settings" style="display: none;" ></div>
        <!-- crop -->
        <div class="settings">
            <div class="capt">Обрезать изображение</div>
            <div class="row flex aic jcsb">
                <p>Ширина, px</p>
                <input  name="width" onchange="changeCropperBox()" value="100">
            </div>
            <div class="row flex aic jcsb">
                <p>Высота, px</p>
                <input  name="height" onchange="changeCropperBox()" value="100">
            </div>
            <div class="row flex aic jcsb">
                <p>Положение X, px</p>
                <input  name="x" onchange="changeCropperBox()"
                       value="100">
            </div>
            <div class="row flex aic jcsb">
                <p>Положение Y, px</p>
                <input  name="y" onchange="changeCropperBox()"
                       value="100">
            </div>
            <div class="bottom-btn flex jcc">
                <button class="btn-crop" onclick="crop()">
                    <p>Обрезать изображение</p>
                </button>
            </div>
        </div>
    </div>

@endsection




