@extends('layouts.main')
@section('title',__('localization.cut').' '.__('localization.image'))
@section('meta_description',"")

@section('header-title',__('localization.cut').' '.__('localization.image'))
@section('header-capt')
    <div class="capt">{{__('localization.crop_desk')}}</div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/cropper.css')}}">
    <script src="{{asset("js/cropper.js")}}"></script>
    <style>
        @media (max-width: 1216px) {
            .tool .sidebar {
                border-left: 0;
            }

            .tool .work-area, .tool .sidebar {
                flex-basis: 100%;
                max-width: 100%;
                border-radius: 12px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="content white">
        <div id="load" class="container">
            <div class="wrap-content padding-wrap">
                <div class="upload-place">
                    <form id="send-image" method="post" action="{{route('compress-image')}}">
                        @csrf
                        <img src="{{asset('img/open-folder.svg')}}">
                        <span> {{__('localization.drag')}} <label
                                for="file_input_id"><a>{{__('localization.image')}}</a></label></span>
                        <p>{{__('localization.or')}} <label for="file_input_id"
                                                            class="upload-link">{{__('localization.upload')}}</label>
                            <input type="file" id="file_input_id" name="file" accept=".jpg,.jpeg,.png,.bmp,.gif,.svg"
                                   onchange="refresh(this.files)"> {{__('localization.upload_text')}}</p>
                    </form>
                </div>

                @include('layouts.download',['btnText'=>__('localization.upload_images')])
            </div>
            @include('layouts.download-image',['btnTitle'=>__('localization.download_cropped'),'click'=>'crop()'])
        </div>
        @include('layouts.safe-transfer')
    </div>

    <div class="sidebar" style="display: none">
        <div class="collapse">
            <div class="card active">
                <div class="card-header no-after">
                    <p>{{__('localization.cut').' '.__('localization.image')}}</p>
                </div>
                <div class="card-body">
                    <div class="row flex aic jcsb">
                        <p>{{__('localization.width')}}, px</p>
                        <input type="number" name="width" onwheel="changeValOnWheel(this.event)" step="1" min="1" onchange="changeCropperBox()" value="100">
                    </div>
                    <div class="row flex aic jcsb">
                        <p>{{__('localization.height')}}, px</p>
                        <input type="number" name="height" onwheel="changeValOnWheel(this.event)" step="1" min="1" onchange="changeCropperBox()" value="100">
                    </div>
                    <div class="row flex aic jcsb">
                        <p>{{__('localization.position')}} X, px</p>
                        <input type="number" name="x" onwheel="changeValOnWheel(this.event)" step="1" min="1" onchange="changeCropperBox()"
                               value="100">
                    </div>
                    <div class="row flex aic jcsb">
                        <p>{{__('localization.position')}} Y, px</p>
                        <input type="number" name="y" onwheel="changeValOnWheel(this.event)" step="1" min="1" onchange="changeCropperBox()"
                               value="100">
                    </div>
                </div>
                <div class="bottom-btn flex jcc pos-static">
                    <button class="btn-crop" onclick="prepareDownloadCrop()">
                        <p>{{__('localization.cut').' '.__('localization.image')}}</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection




