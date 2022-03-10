@extends('layouts.main')
@section('title',__('localization.change').' '.__('localization.size'))
@section('meta_description',"")

@section('header-title',__('localization.change').' '.__('localization.size'))
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
                        <img src="{{asset('img/open-folder.svg')}}">
                        <span> {{__('localization.drag')}} <label for="file_input_id"><a>{{__('localization.image')}}</a></label></span>
                        <p>{{__('localization.or')}} <label for="file_input_id" class="upload-link" >{{__('localization.upload')}}</label>
                            <input type="file" id="file_input_id" name="file" multiple
                                   accept=".jpg,.jpeg,.png,.bmp,.gif,.svg"
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
        <!-- resize -->
        <div class="settings">
            <div class="capt">{{__('localization.change').' '.__('localization.size')}}</div>
            <div class="tabs">
                <div class="tab-radiobox flex nowrap">
                    <div class="item active" data-tab="tab-pixel">{{__('localization.in_pixels')}}</div>
                    <div class="item" data-tab="tab-percent">{{__('localization.in_percents')}}</div>
                </div>
                <div class="tab-content current tab-pixel">
                    <div class="row flex aic jcsb">
                        <p>{{__('localization.width')}}, px</p>
                        <input type="number" name="widthPx" old-val="100" onchange="trackInput(this.value)" value="100">
                    </div>
                    <div class="row flex aic jcsb">
                        <p>{{__('localization.height')}}, px</p>
                        <input type="number" name="heightPx" disabled value="100">
                    </div>
                    <label class="wrp-select wrp-checkbox">{{__('localization.keep_proportions')}}
                        <input type="checkbox" name="save-prop" onchange="lockInput(this.checked)" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="wrp-select wrp-checkbox">{{__('localization.dont_increase')}}
                        <input type="checkbox" name="not-scale">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="tab-content tab-percent">
                    <label class="wrp-select wrp-radiobox">{{__('localization.reduce_by')}} 25%
                        <input type="radio" name="item-2" value="0.25" checked="checked">
                        <span class="checkmark"></span>
                    </label>

                    <label class="wrp-select wrp-radiobox">{{__('localization.reduce_by')}} 50%
                        <input type="radio" name="item-2" value="0.5">
                        <span class="checkmark"></span>
                    </label>
                    <label class="wrp-select wrp-radiobox">{{__('localization.reduce_by')}} 75%
                        <input type="radio" name="item-2" value="0.75">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="bottom-btn flex jcc">
                <button class="btn-resize" onclick="resizeImage()">
                    <p>{{__('localization.change').' '.__('localization.size')}}</p>
                </button>
            </div>
        </div>
    </div>

@endsection





