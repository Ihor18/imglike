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
                                   accept=".jpg,.jpeg,.png,.bmp,.gif,.svg,.psd,.webp"
                                   onchange="refresh(this.files)"> {{__('localization.upload_text')}}</p>
                    </form>
                </div>

                @include('layouts.download',['btnText'=>__('localization.upload_images')])
            </div>

            @include('layouts.download-image',['btnTitle'=>__('localization.download_images')])

        </div>
        @include('layouts.safe-transfer')
    </div>

    <div class="sidebar" style="display: none">
        <div class="collapse">
            <div class="card active">
                <div class="card-header no-after">
                    <p>{{__('localization.change').' '.__('localization.size')}}</p>
                </div>

                <div class="tabs card-body" style="height: 361px">
                    <div class="tabs tab-radiobox flex nowrap">
                        <button class="item active" onclick="changeTab(this)" data-tab="tab-pixel">{{__('localization.in_pixels')}}</button>
                        <button class="item" onclick="changeTab(this)" data-tab="tab-percent">{{__('localization.in_percents')}}</button>
                    </div>
                    <div class="tab-content current tab-pixel">
                        <div class="row flex aic jcsb">
                            <p>{{__('localization.width')}}, px</p>
                            <input type="number" name="widthPx" onwheel="changeValOnWheel(this.event,'resizeW')" step="1" min="1" max="9999" old-val="1920" onchange="trackInput(this.value)"
                                   value="1920">
                        </div>
                        <div class="row flex aic jcsb">
                            <p>{{__('localization.height')}}, px</p>
                            <input type="number" name="heightPx" onwheel="changeValOnWheel(this.event,'resizeH')" step="1" min="1" max="9999" old-val="1080" onchange="trackInput(this.value,true)"
                                   value="1080">
                        </div>
                        <label class="wrp-select wrp-checkbox mt-20">{{__('localization.keep_proportions')}}
                            <input type="checkbox" name="save-prop" checked="checked">
                            <span class="checkmark"></span>
                        </label>
                        <label class="wrp-select wrp-checkbox">{{__('localization.dont_increase')}}
                            <input type="checkbox" name="not-scale">
                            <span class="checkmark"></span>
                        </label>
                        <span id="inc-error"></span>
                    </div>
                    <div class="tab-content tab-percent" style="min-height: 144px">
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

                    <div class="bottom-btn flex jcc">
                        <button type="button" style="position: relative" class="btn-resize" onclick="resizeImage()">
                            <div class="button__progress"></div>
                            <p>{{__('localization.change').' '.__('localization.size')}}</p>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection





