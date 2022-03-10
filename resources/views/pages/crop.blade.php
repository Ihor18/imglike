@extends('layouts.main')
@section('title',__('localization.cut').' '.__('localization.image'))
@section('meta_description',"")

@section('header-title',__('localization.cut').' '.__('localization.image'))
@section('header-capt')
    <div class="capt">{{__('localization.crop_desk')}}</div>
    <button class="tool-button" style="display: none" onclick="crop()"><img src="{{asset('img/icon-crop.svg')}}"><span>{{__('localization.cut').' '.__('localization.image')}}</span></button>
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
                        <img src="{{asset('img/open-folder.svg')}}">
                        <span> {{__('localization.drag')}} <label for="file_input_id"><a>{{__('localization.image')}}</a></label></span>
                        <p>{{__('localization.or')}} <label for="file_input_id" class="upload-link" >{{__('localization.upload')}}</label>
                            <input type="file" id="file_input_id" name="file" accept=".jpg,.jpeg,.png,.bmp,.gif,.svg"
                                   onchange="refresh(this.files)"> {{__('localization.upload_text')}}</p>
                    </form>
                </div>

                @include('layouts.download',['btnText'=>__('localization.upload_images')])
            </div>
        </div>
        @include('layouts.safe-transfer')
    </div>
    <div class="wrp-settings ">
        <div class="btn-settings" style="display: none;" ></div>
        <!-- crop -->
        <div class="settings">
            <div class="capt">{{__('localization.cut').' '.__('localization.image')}}</div>
            <div class="row flex aic jcsb">
                <p>{{__('localization.width')}}, px</p>
                <input  name="width" onchange="changeCropperBox()" value="100">
            </div>
            <div class="row flex aic jcsb">
                <p>{{__('localization.height')}}, px</p>
                <input  name="height" onchange="changeCropperBox()" value="100">
            </div>
            <div class="row flex aic jcsb">
                <p>{{__('localization.position')}} X, px</p>
                <input  name="x" onchange="changeCropperBox()"
                       value="100">
            </div>
            <div class="row flex aic jcsb">
                <p>{{__('localization.position')}} Y, px</p>
                <input  name="y" onchange="changeCropperBox()"
                       value="100">
            </div>
            <div class="bottom-btn flex jcc">
                <button class="btn-crop" onclick="crop()">
                    <p>{{__('localization.cut').' '.__('localization.image')}}</p>
                </button>
            </div>
        </div>
    </div>

@endsection




