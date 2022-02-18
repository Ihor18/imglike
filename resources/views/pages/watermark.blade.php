@extends('layouts.main')
@section('title',__('localization.index_title'))
@section('meta_description',"")

@section('header-title',"Наложить водяной знак")
@section('header-capt')
    <div class="capt">Все изображения будут изменены с заданными параметрами.</div>
   <button class="tool-button" onclick="watermarkConvert()" style="display: none"><img src="img/icon-watermark.svg"><span>Поставить знак</span></button>
@endsection

@section('style')
    <style>

        ul {
            margin: 0;
            padding: 0;
        }

        .watermark-area {
            margin: 10px auto;
            position: relative;
        }

        .watermark-area a {
            color: #666;
        }


        .slide {
            display: none;
        }

        .slide li {
            list-style: none;
        }

        .slide.slick-initialized {
            display: block;
        }


        .slick-dots li img {
            height: auto;
            width: 100%;

            cursor: pointer;

            opacity: 0.5;
        }

        .slick-dots li.slick-active img {
            cursor: default;

            opacity: 1;
        }

        .slick-prev,
        .slick-next {
            margin: -50px 0 0;

            z-index: 99;
            position: absolute;
            top: 50%;
        }

        .slick-prev {
            left: -50px;
        }

        .slick-next {
            right: -50px;
        }

        .icon {
            display: inline-block;
            height: 50px;
            width: 50px;
        }


    </style>

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

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
                        <p>или <label for="file" class="upload-link" onclick="fileClick()">загрузите</label>
                            <input type="file" id="file_input_id" name="file" accept="image/*"
                                   onchange="refresh(this.files)" multiple> их с вашего компьютера</p>
                        <input style="display: none" type="file" id="watermark_file" name="watermark_file" accept="image/*">
                    </form>
                </div>


                <div class="watermark-area" style="display: none">
                    <ul class="slider">

                    </ul>
                </div>
            </div>

            <button class="upload-mobile" onclick="fileClick()">Загрузить изображения</button>

        </div>
        @include('layouts.safe-transfer')

        <div class="wrp-settings" style="display: none">
            <div class="btn-settings"></div>
            <!-- watermark -->
            <div class="settings">
                <div class="capt">Вариант водяного знака</div>
                <div class="html-img">
                                        <button class="btn-grey add-img" onclick="uploadWatermarkPreview()"><p>Добавить изображение</p></button>
                                        <button class="btn-grey add-text" onclick="showWatermarkOptions(true)" ><p>Добавить текст</p></button>
                    <ul id="watermark-options" style="display: none">
                        <li id="text-input" style="display: none">
                            <p>Введите текст:</p>
                            <div class="input-field flex jcsb aic">
                                <input type="text" name="watermark" required onchange="enterURL(this.value)" class="url">
                            </div>
                        </li>
                        <li>
                            <p>Положение:</p>
                            <div class="input-field">
                                <div class="custom-select">
                                    <select id="position_mark">
                                        <option data-valign="top" data-align="left" value="top-left">Позиция:</option>
                                        <option data-valign="top" data-align="left" value="top-left">Сверху слева</option>
                                        <option data-valign="top" data-align="center" value="top">Сверху по центру</option>
                                        <option data-valign="top" data-align="right" value="top-right">Сверху справа</option>
                                        <option data-valign="middle" data-align="left" value="left">Слева по центру</option>
                                        <option data-valign="middle" data-align="center" value="center">По центру</option>
                                        <option data-valign="middle" data-align="right" value="right">Справа по центру</option>
                                        <option data-valign="bottom" data-align="left" value="bottom-left">Снизу слева</option>
                                        <option data-valign="bottom" data-align="center" value="bottom">Снизу по центру</option>
                                        <option data-valign="bottom" data-align="right" value="bottom-right">Снизу справа</option>
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div><p style="margin: 10px 0;font-size:16px;color: black">Отступ от края:</p>
                                <div class="row flex aic jcsb">
                                    <p>Позиция X</p>
                                    <input type="number" name="x-value" value="10">
                                </div>
                                <div class="row flex aic jcsb">
                                    <p>Позиция Y</p>
                                    <input type="number" name="y-value" value="10">
                                </div>
                                <div class="row flex aic jcsb" id="font-size" style="display: none">
                                    <p>Размер шрифта</p>
                                    <input type="number" name="font-size" value="24">
                                </div>
                                <div class="row flex aic jcsb" id="angle" style="display: none">
                                    <p>Поворот°</p>
                                    <input type="number" name="angle" value="0">
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="bottom-btn flex jcc" style="display: none">
                    <button class="btn-watermark" onclick="watermarkConvert()">
                        <p>Поставить знак</p>
                    </button>
                </div>
            </div>
        </div>
        @include('layouts.download-image',['btnTitle'=>"Скачать изображения"])
    </div>


@endsection


@section('script')
    <script type="text/javascript" defer
            src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

@endsection

