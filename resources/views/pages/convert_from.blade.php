@extends('layouts.main')
@section('title',__('localization.convert').' '.__('localization.from').' '."JPG")
@section('meta_description',"")

@section('header-title',__('localization.convert').' '.__('localization.from').' '."JPG")
@section('header-capt')
    <div class="capt">{{__('localization.convert_from_capt')}}</div>
@endsection

@section('content')

    <div class="content white">
        <div id="load" class="container">
            <div class="wrap-content">
                <div class="upload-place">
                    <form id="send-image" method="post" action="{{route('compress-image')}}">
                        @csrf
                        <img src="{{asset('')}}img/open-folder.svg">
                        <span> {{__('localization.drag')}} <label for="file_input_id"><a>{{__('localization.image')}}</a></label></span>
                        <p>{{__('localization.or')}} <label for="file_input_id" class="upload-link" >{{__('localization.upload')}}</label>
                            <input type="file" id="file_input_id" name="file" multiple accept=".jpg,.jpeg"
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
        <div class="btn-settings"></div>
        <!-- convert -->
        <div class="settings">
            <div class="capt">{{__('localization.convert')}} {{__('localization.from')}} JPG</div>
            <div class="tabs">
                <div class="tab-radiobox flex nowrap">
                    <div class="item active" data-tab="tab-png">{{__('localization.in')}} PNG</div>
                    <div class="item" data-tab="tab-gif">{{__('localization.in')}} GIF</div>
                </div>
                <div class="tab-content current tab-png">
                    <center>{{__('localization.all_images_will_convert')}} PNG</center>
                </div>
                <div class="tab-content tab-gif">
                    <label class="wrp-select wrp-radiobox">{{__('localization.static')}} GIF
                        <input type="radio" data-type="static" name="item-2" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="wrp-select wrp-radiobox">{{__('localization.animated')}} GIF
                        <input type="radio" data-type="animated" name="item-2">
                        <span class="checkmark"></span>
                    </label>
                    <div class="interval">
                        <p> {{__('localization.interval')}}<input type="number" name="duration" min="0.1" max="0.9" step="0.1" value="0.5"></p>
                        <label class="wrp-select wrp-checkbox">{{__('localization.keep_proportions')}}
                            <input type="checkbox" name="item-1" checked>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="bottom-btn flex jcc">
                <button class="btn-convert" onclick="convertFromJpeg()">
                    <p>{{__('localization.convert')}} {{__('localization.from')}} JPG</p>
                </button>
            </div>
        </div>
    </div>

@endsection
