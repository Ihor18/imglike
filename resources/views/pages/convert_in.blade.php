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
            <div class="wrap-content">
                <div class="upload-place">
                    <form id="send-image" method="post" action="{{route('compress-image')}}">
                        @csrf
                        <img src="{{asset('img/open-folder.svg')}}">
                        <span> {{__('localization.drag')}} <label for="file_input_id"><a>{{__('localization.image')}}</a></label></span>
                        <p>{{__('localization.or')}} <label for="file_input_id" class="upload-link" >{{__('localization.upload')}}</label>
                            <input type="file" id="file_input_id" name="file" multiple accept=".jpg,.jpeg,.png,.bmp,.gif,.svg"
                                   onchange="refresh(this.files)"> {{__('localization.upload_text')}}</p>
                    </form>
                </div>

                @include('layouts.download',['btnText'=>__('localization.upload_images')])
            </div>

            @include('layouts.download-image',['btnTitle'=>__('localization.download_images')])

        </div>
        @include('layouts.safe-transfer')
    </div>

    <div class="wrp-settings " style="display: none">
        <div class="btn-settings disabled"></div>
    </div>

@endsection






