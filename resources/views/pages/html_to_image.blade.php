@extends('layouts.main')
@section('title',"HTML".' '.__('localization.in').' '.__('localization.image'))
@section('meta_description',"")

@section('header-title',"HTML".' '.__('localization.in').' '.__('localization.image'))
@section('header-capt')
    <div class="capt">{{__('localization.convert_web_pages')}}</div>
@endsection

@section('content')

    <div class="content white">
        <div class="container">
            <div class="wrap-content">
                <div class="url-area">
                    <form action="">
                        <div class="input flex aic jcsb">
                            <img src="{{asset('img/website-icon.svg')}}">
                            <input type="text" name="url" onchange="enterURL(this.value)" placeholder="https://online-tetris.ru/">
                        </div>

                    </form>
                    <button onclick="htmlToImage()">{{__('localization.add')}} URL</button>
                </div>
            </div>
            @include('layouts.safe-transfer')
        </div>
    </div>

    <div class="wrp-settings " style="display: none">
        <div class="btn-settings"></div>
        <!-- html -->
        <div class="settings">
            <div class="capt">HTML {{__('localization.in')}} {{__('localization.image')}}</div>
            <div class="html-img">
                <ul>
                    <li>
                        <p>{{__('localization.enter_address')}}:</p>
                        <div class="input-field flex jcsb aic">
                            <input type="text" name="url" required onchange="enterURL(this.value)" placeholder="https://online-tetris.ru/" class="url">
                            <button class="btn-reload" onclick="clearField('name','url')"></button>
                        </div>
                    </li>
                    <li>
                        <p>{{__('localization.screen_size')}}:</p>
                        <div class="input-field">
                            <div class="custom-select">
                                <select id="size">
                                    <option data-width="800" data-height="600" value="0">{{__('localization.select_size')}}:</option>
                                    <option data-width="1920" data-height="1080" value="1">1920х1080</option>
                                    <option data-width="980" data-height="640" value="2">980х640</option>
                                    <option data-width="1360" data-height="980" value="3">1360х980</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li>
                        <p>{{__('localization.convert')}} {{__('localization.in')}}:</p>
                        <div class="input-field">
                            <div class="custom-select">
                                <select id="format">
                                    <option value="png">{{__('localization.select_format')}}:</option>
                                    <option value="jpg">jpg</option>
                                    <option value="png">png</option>
                                    <option value="pdf">pdf</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li>
                        <p>{{__('localization.settings')}} HTML:</p>
                        <div class="input-field">
                            <label class="wrp-select wrp-checkbox">{{__('localization.block_ads')}}
                                <input type="checkbox" name="add-block" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                            <label class="wrp-select wrp-checkbox">{{__('localization.full_screen')}}
                                <input type="checkbox" name="full-page" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                            <label class="wrp-select wrp-checkbox">{{__('localization.remove_pop_ups')}}
                                <div class="info"></div>
                                <input type="checkbox" name="delete-pop-up">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="bottom-btn flex jcc">
                <button class="btn-html" onclick="convertHtml()">
                    <p>{{__('localization.convert')}} HTML</p>
                </button>
            </div>
        </div>
    </div>


@endsection





