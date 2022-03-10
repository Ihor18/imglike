@extends('layouts.main')
@section('title','IMGLike')
@section('meta_description',"")

@section('header-title',__('localization.index_header_title'))
@section('header-capt')
    <div class="caption">{{__('localization.index_caption')}}</div>
    <div class="capt">*{{__('localization.index_capt')}}</div>
@endsection
@section('body-class','class=main-page')
@section('content')
    <div class="content white">
        <div class="container">

            <ul class="list-apps wrap-content flex jcsb">
                <li>
                    <a href="{{route('compress')}}">
                        <div class="icon">
                            <img src="{{asset('img/icon-tiny.svg')}}">
                        </div>
                        <p>{{__('localization.compress').' '.__('localization.image')}}</p>
                        <span>{{__('localization.index_compress_capt')}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('resize')}}">
                        <div class="icon">
                            <img src="{{asset('img/icon-resize.svg')}}">
                        </div>
                        <p>{{__('localization.change').' '.__('localization.size')}}</p>
                        <span>{{__('localization.index_compress_capt')}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('crop')}}">
                        <div class="icon">
                            <img src="{{asset('img/icon-crop.svg')}}">
                        </div>
                        <p>{{__('localization.cut').' '.__('localization.image')}}</p>
                        <span>{{__('localization.index_compress_capt')}}</span> </a>
                </li>
                <li>
                    <a href="{{route('rotate')}}">
                        <div class="icon">
                            <img src="{{asset('img/icon-rotate.svg')}}">
                        </div>
                        <p>{{__('localization.rotate').' '.__('localization.image')}}</p>
                        <span>{{__('localization.index_compress_capt')}}</span></a>
                </li>
                <li>
                    <a href="{{route('redactor')}}">
                        <div class="icon">
                            <img src="{{asset('img/icon-redactor.svg')}}">
                        </div>
                        <p>{{__('localization.redactor').' '.__('localization.image')}}</p>
                        <span>{{__('localization.index_compress_capt')}}</span></a>
                </li>
                <li>
                    <a href="{{route('watermark')}}">
                        <div class="icon">
                            <img src="{{asset('img/icon-watermark.svg')}}">
                        </div>
                        <p>{{__('localization.impose').' '.__('localization.watermark')}}</p>
                        <span>{{__('localization.index_compress_capt')}}</span></a>
                </li>
                <li>
                    <a href="{{route('convert-in-jpg')}}">
                        <div class="icon">
                            <img src="{{asset('img/icon-convert-2.svg')}}">
                        </div>
                        <p>{{__('localization.convert').' '.__('localization.in')}} JPG</p>
                        <span>{{__('localization.index_compress_capt')}}</span></a>
                </li>
                <li>
                    <a href="{{route('convert-from-jpg')}}">
                        <div class="icon">
                            <img src="{{asset('img/icon-convert-1.svg')}}">
                        </div>
                        <p>{{__('localization.convert').' '.__('localization.from')}}</p>
                        <span>{{__('localization.index_compress_capt')}}</span></a>
                </li>
                <li>
                    <a href="{{route('html-to-image')}}">
                        <div class="icon">
                            <img src="{{asset('img/icon-html.svg')}}">
                        </div>
                        <p>HTML {{__('localization.in').' '.__('localization.image')}}</p>
                        <span>{{__('localization.index_compress_capt')}}</span></a>
                </li>
                <li>
                    <a href="{{route('meme')}}">
                        <div class="icon">
                            <img src="{{asset('img/icon-generator.svg')}}">
                        </div>
                        <p>{{__('localization.meme_generator')}}</p>
                        <span>{{__('localization.index_compress_capt')}}</span></a>
                </li>
                <li>
                    <a href="{{route('photoshop')}}">
                        <div class="icon">
                            <img src="{{asset('img/icon-photoshop.svg')}}">
                        </div>
                        <p>{{__('localization.photoshop_online')}}</p>
                        <span>{{__('localization.index_compress_capt')}}</span></a>
                </li>
                <li>
                    <a href="">
                        <div class="icon" style="background: 0;">
                            <img src="{{asset('img/more.jpg')}}">
                        </div>
                        <p>{{__('localization.more_features')}}</p>
                        <span>{{__('localization.index_compress_capt')}}</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="why-imglike">
        <div class="container">
            <div class="image">
                <img src="{{asset('img/screen-1.png')}}">
            </div>
            <div class="text">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="title">{{__('localization.batch_photo')}}</div>
                        <p>{{__('localization.batch_desk1')}}<br>{{__('localization.batch_desk2')}}</p>
                    </div>
                    <div class="item">
                        <div class="title">{{__('localization.batch_photo')}} 2</div>
                        <p>{{__('localization.batch_desk1')}}<br>{{__('localization.batch_desk2')}}</p>
                    </div>
                    <div class="item">
                        <div class="title">{{__('localization.batch_photo')}}</div>
                        <p>{{__('localization.batch_desk1')}}<br>{{__('localization.batch_desk2')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection





