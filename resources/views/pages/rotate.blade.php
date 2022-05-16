@extends('layouts.main')
@section('title',__('localization.rotate').' '.__('localization.image'))
@section('meta_description',"")

@section('header-title',__('localization.rotate').' '.__('localization.image'))
@section('header-capt')
    <div class="capt">{{__('localization.convert_from_capt')}}</div>
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
                            <input type="file" id="file_input_id" name="file" multiple
                                   accept=".jpg,.jpeg,.png,.bmp,.gif,.svg,.psd,.tiff,.webp"
                                   onchange="refresh(this.files)"> {{__('localization.upload_text')}}</p>
                    </form>
                </div>

                @include('layouts.download',['btnText'=>__('localization.upload_images')])
            </div>

            @include('layouts.download-image',['btnTitle'=>__('localization.download_rotated')])

        </div>
        @include('layouts.safe-transfer')
    </div>

    <div class="sidebar" style="display: none">
        <div class="collapse">
            <div class="card active">
                <div class="card-header no-after pos-rel">
                    <div><b>{{__('localization.rotation_options')}}</b></div>
                    <button class="btn-grey discard help-button" onclick="reset()">{{__('localization.reset_all')}}</button>
                </div>
                <div class="tabs rotate card-body" style="padding: 0;height: 200px">
                    <div class="tab-content current tab-all">
                        <div class="flex jcsb">
                            <div class="right" onclick="rotateDeg(90)">
                                <div class="icon"></div>
                                <p>{{__('localization.right')}}</p></div>
                            <div class="left" onclick="rotateDeg(-90)">
                                <div class="icon"></div>
                                <p>{{__('localization.left')}}</p></div>
                        </div>
                    </div>

                    <div class="bottom-btn flex jcc mt-20">
                        <button class="btn-rotate pos-static" onclick="rotateImage()">
                            <p>{{__('localization.rotate')}}</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection





