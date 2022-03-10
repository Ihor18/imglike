@extends('layouts.main')
@section('title',__('localization.meme_generator'))
@section('meta_description',"")

@section('header-title',__('localization.meme_generator'))
@section('header-capt')
    <div class="capt">{{__('localization.meme_capt')}}</div>
@endsection

@section('content')
    <div class="content white">
        <div class="container">
            <div class="wrap-content ">
                <div class="upload-place">
                    <img src="{{asset('img/open-folder.svg')}}">
                    <span> {{__('localization.drag')}} <label for="file_input_id"><a>{{__('localization.image')}}</a></label></span>
                    <p>{{__('localization.or')}} <label for="file_input_id" class="upload-link" >{{__('localization.upload')}}</label>
                        <input type="file" id="file_input_id" name="file" multiple accept=".jpg,.jpeg,.png,.bmp,.gif,.svg"
                               onchange="refresh(this.files)"> {{__('localization.upload_text')}}</p>
                </div>
                <button class="upload-mobile" onclick="mobileBtnClick()">{{__('localization.upload_images')}}</button>
                <div class="upload-buttons flex aic jcc">
                    <button><img src="{{asset('img/google-drive.svg')}}">Google Drive</button>
                    <button><img src="{{asset('img/dropbox.svg')}}">Dropbox</button>
                    <span>{{__('localization.or')}}</span>
                    <button class="btn-temp show-modal" data-pop="pop-mem">{{__('localization.meme_template')}}</button>
                </div>
            </div>
            @include('layouts.safe-transfer')
        </div>
    </div>

    <div class="wrp-settings" style="display: none">
        <div class="btn-settings"></div>
        <!-- generator -->
        <div class="settings">
            <div class="capt">{{__('localization.generator_parameters')}}</div>
            <div class="tabs">
                <div class="tab-radiobox flex nowrap">
                    <div class="item active" data-tab="tab-inner">{{__('localization.text')}}<br>{{__('localization.inside')}}</div>
                    <div class="item" data-tab="tab-outer">{{__('localization.text')}}<br>{{__('localization.outside')}}</div>
                </div>
                <div class="tab-content current tab-inner">
                    <button class="btn-grey add-img"><p>{{__('localization.add')}} {{__('localization.image')}}</p></button>
                    <button onclick="createInput()" class="btn-grey add-text"><p>{{__('localization.add')}} {{__('localization.stext')}}</p></button>
                </div>
                <div class="tab-content tab-outer">
                    <button class="btn-grey add-img"><p>{{__('localization.add')}} {{__('localization.image')}}</p></button>
                    <button class="btn-grey add-text"><p>{{__('localization.add')}} {{__('localization.stext')}}</p></button>
                </div>
            </div>
            <div class="bottom-btn flex jcc">
                <button class="btn-mem">
                    <p>{{__('localization.generate_meme')}}</p>
                </button>
            </div>
        </div>
    </div>


    <div class="pop-up pop-mem">
        <a class="close"></a>
        <div class="capt">{{__('localization.meme_template')}}</div>
        <form action="#" method="post">
            <div class="search flex aic jcsb">
                <input type="" name="" placeholder="https://online-tetris.ru/">
                <button></button>
            </div>
        </form>
        <div class="list-temp flex aic ">
            <div class="item">
                <p>Drake Hotline Bling</p>
                <div class="image">
                    <img src="{{asset('img/mem.jpg')}}">
                </div>
                <button onclick="chooseCanvas(0)">{{__('localization.use')}}</button>
            </div>
            <div class="item">
                <p>Drake Hotline Bling</p>
                <div class="image">
                    <img
                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-images/grapefruit-slice-332-332.jpg">
                </div>
                <button data-id="1">{{__('localization.use')}}</button>
            </div>
            <div class="item">
                <p>Drake Hotline Bling</p>
                <div class="image">
                    <img src="{{asset('img/mem.jpg')}}">
                </div>
                <button data-id="2">{{__('localization.use')}}</button>
            </div>
            <div class="item">
                <p>Drake Hotline Bling</p>
                <div class="image">
                    <img
                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-images/grapefruit-slice-332-332.jpg">
                </div>
                <button data-id="3">{{__('localization.use')}}</button>
            </div>
            <div class="item">
                <p>Drake Hotline Bling</p>
                <div class="image">
                    <img
                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-images/grapefruit-slice-332-332.jpg">
                </div>
                <button data-id="4">{{__('localization.use')}}</button>
            </div>
        </div>
    </div>
    <div class="md-overlay"></div>

    <div class="btns flex aic jcc" style="display: none">
        <div class="icon grid"></div>
        <div class="icon layers"></div>
        <div class="icon delete"></div>
    </div>
@endsection





