@extends('layouts.main')
@section('title',__('localization.convert').' '.__('localization.in').' '."JPG")
@section('meta_description',"")

@section('header-title',__('localization.convert').' '.__('localization.in').' '."JPG")
@section('header-capt')
    <div class="capt">
        {{__('localization.convert_formats')}}
    </div>
@endsection
@section('content')
    <div class="content white">
        <div id="load" class="container">
            <div class="wrap-content padding-wrap">
                <div class="upload-place">
                    <form id="send-image" method="post" action="{{route('compress-image')}}">
                        @csrf
                        <img src="{{asset('img/open-folder.svg')}}">
                        <span> {{__('localization.drag')}} <label for="file_input_id"><a>{{__('localization.image')}}</a></label></span>
                        <p>{{__('localization.or')}} <label for="file_input_id" class="upload-link" >{{__('localization.upload')}}</label>
                            <input type="file" id="file_input_id" name="file" multiple accept=".png,.bmp,.gif,.svg,.tiff,.webp,.psd"
                                   onchange="refresh(this.files)"> {{__('localization.upload_text')}}</p>
                    </form>
                </div>

                @include('layouts.download',['btnText'=>__('localization.upload_images')])
            </div>

            @include('layouts.download-image',['btnTitle'=>__('localization.download_images')])

        </div>
        @include('layouts.safe-transfer')
    </div>


    <div class="sidebar pos-rel" style="display: none">
        <div class="collapse">
            <div class="card active">
                <div class="card-header no-after">
                    <p>{{__('localization.convert').' '.__('localization.in').' '."JPG"}}</p>
                </div>
                <div class="card-body">
                    <div class="hint mb-65">{{__('localization.to_convert').__('localization.error_hint')}}</div>

                </div>

            </div>
        </div>
        <div class="bottom-btn flex jcc">
            <button onclick="convertToJpeg()"><img style="color: red" src="{{asset('img/icon-convert.svg')}}"> {{__('localization.compress').' '.__('localization.image')}}</button>
        </div>
    </div>

@endsection






