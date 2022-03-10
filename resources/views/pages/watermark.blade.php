@extends('layouts.main')
@section('title',__('localization.impose').' '.__('localization.watermark'))
@section('meta_description',"")

@section('header-title',__('localization.impose').' '.__('localization.watermark'))
@section('header-capt')
    <div class="capt">{{__('localization.download_rotated')}}</div>
    <button class="tool-button" onclick="watermarkConvert()" style="display: none"><img
            src="{{asset('img/icon-watermark.svg')}}"><span>{{__('localization.put_up_sign')}}</span></button>
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
                        <img src="{{asset('img/open-folder.svg')}}">
                        <span> {{__('localization.drag')}} <label for="file_input_id"><a>{{__('localization.image')}}</a></label></span>
                        <p>{{__('localization.or')}} <label for="file_input_id" class="upload-link" >{{__('localization.upload')}}</label>
                            <input type="file" id="file_input_id" name="file" accept="image/*"
                                   onchange="refresh(this.files)" multiple> {{__('localization.upload_text')}}</p>
                        <input style="display: none" type="file" id="watermark_file" name="watermark_file"
                               accept=".jpg,.jpeg,.png,.bmp,.gif,.svg">
                    </form>
                </div>


                <div class="watermark-area" style="display: none">
                    <ul class="slider">

                    </ul>
                </div>
            </div>
            @include('layouts.download',['btnText'=>__('localization.upload_images')])
        </div>
        @include('layouts.safe-transfer')

        <div class="wrp-settings" style="display: none">
            <div class="btn-settings"></div>
            <!-- watermark -->
            <div class="settings">
                <div class="capt">{{__('localization.watermark_option')}}</div>
                <div class="html-img">
                    <button class="btn-grey add-img" onclick="uploadWatermarkPreview()"><p>{{__('localization.add').' '.__('localization.image')}}</p>
                    </button>
                    <button class="btn-grey add-text" onclick="showWatermarkOptions(true)"><p>{{__('localization.add').' '.__('localization.text')}}</p>
                    </button>
                    <ul id="watermark-options" style="display: none">
                        <li id="text-input" style="display: none">
                            <p>{{__('localization.enter_text')}}:</p>
                            <div class="input-field flex jcsb aic">
                                <input type="text" name="watermark" required onchange="enterURL(this.value)"
                                       class="url">
                            </div>
                        </li>
                        <li>
                            <p>{{__('localization.position')}}:</p>
                            <div class="input-field">
                                <div class="custom-select">
                                    <select id="position_mark">
                                        <option data-valign="top" data-align="left" value="top-left">{{__('localization.position')}}:</option>
                                        <option data-valign="top" data-align="left" value="top-left">{{__('localization.top_left')}}:
                                        </option>
                                        <option data-valign="top" data-align="center" value="top">{{__('localization.top_center')}}:
                                        </option>
                                        <option data-valign="top" data-align="right" value="top-right">{{__('localization.top_right')}}:
                                        </option>
                                        <option data-valign="middle" data-align="left" value="left">{{__('localization.left_center')}}:
                                        </option>
                                        <option data-valign="middle" data-align="center" value="center">{{__('localization.centered')}}:
                                        </option>
                                        <option data-valign="middle" data-align="right" value="right">{{__('localization.right_center')}}:
                                        </option>
                                        <option data-valign="bottom" data-align="left" value="bottom-left">{{__('localization.bottom_left')}}:
                                        </option>
                                        <option data-valign="bottom" data-align="center" value="bottom">{{__('localization.bottom_center')}}:
                                        </option>
                                        <option data-valign="bottom" data-align="right" value="bottom-right">{{__('localization.bottom_right')}}:
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div><p style="margin: 10px 0;font-size:16px;color: black">Отступ от края:</p>
                                <div class="row flex aic jcsb">
                                    <p>{{__('localization.position')}}: X</p>
                                    <input type="number" name="x-value" value="10">
                                </div>
                                <div class="row flex aic jcsb">
                                    <p>{{__('localization.position')}}: Y</p>
                                    <input type="number" name="y-value" value="10">
                                </div>
                                <div class="row flex aic jcsb" id="font-size" style="display: none">
                                    <p>{{__('localization.font_size')}}:</p>
                                    <input type="number" name="font-size" value="24">
                                </div>
                                <div class="row flex aic jcsb" id="angle" style="display: none">
                                    <p>{{__('localization.turn')}}:°</p>
                                    <input type="number" name="angle" value="0">
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="bottom-btn flex jcc" style="display: none">
                    <button class="btn-watermark" onclick="watermarkConvert()">
                        <p>{{__('localization.put_up_sign')}}</p>
                    </button>
                </div>
            </div>
        </div>
        @include('layouts.download-image',['btnTitle'=>__('download_image')])
    </div>


@endsection


@section('script')
    <script type="text/javascript" defer
            src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

@endsection

