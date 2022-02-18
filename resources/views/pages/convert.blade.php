@extends('layouts.main')
@section('title',__('localization.index_title'))
@section('meta_description',"")

@section('header-title',"Конвертировать в JPG")
@section('header-capt')
    <div class="capt">Все изображения будут изменены с заданными параметрами.</div>
    <button class="tool-button"><img src="img/icon-convert.svg"><span>Конвертировать в JPG</span></button>
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <div class="wrap-content">
                <div class="list flex jcc">
                    <div class="cart-image">
                        <div class="image">
                            <div class="wrp-img">
                                <button class="reload"></button>
                                <button class="delete"></button>
                                <img
                                    src="https://interactive-examples.mdn.mozilla.net/media/cc0-images/grapefruit-slice-332-332.jpg">
                            </div>
                        </div>
                        <span>Grapefruit</span>
                    </div>
                    <div class="cart-image">
                        <div class="image">
                            <div class="wrp-img">
                                <button class="reload"></button>
                                <button class="delete"></button>
                                <img
                                    src="https://interactive-examples.mdn.mozilla.net/media/cc0-images/grapefruit-slice-332-332.jpg">
                            </div>
                        </div>
                        <span>Grapefruit</span>
                    </div>
                    <div class="cart-image">
                        <div class="image">
                            <div class="wrp-img">
                                <button class="reload"></button>
                                <button class="delete"></button>
                                <img
                                    src="https://interactive-examples.mdn.mozilla.net/media/cc0-images/grapefruit-slice-332-332.jpg">
                            </div>
                        </div>
                        <span>Grapefruit</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="wrp-settings ">
        <div class="btn-settings"></div>
        <!-- convert -->
        <div class="settings">
            <div class="capt">Конвертировать из JPG</div>
            <div class="tabs">
                <div class="tab-radiobox flex nowrap">
                    <div class="item active" data-tab="tab-png">в PNG</div>
                    <div class="item" data-tab="tab-gif">в GIF</div>
                </div>
                <div class="tab-content current tab-png">
                    <center>Все изображения будут преобразованы в формат PNG</center>
                </div>
                <div class="tab-content tab-gif">
                    <label class="wrp-select wrp-radiobox">Статичный GIF
                        <input type="radio" name="item-2" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="wrp-select wrp-radiobox">Анимированный GIF
                        <input type="radio" name="item-2">
                        <span class="checkmark"></span>
                    </label>
                    <div class="interval">
                        <p>Интервал кадров, сек <input type="number" min="0.1" max="0.9" step="0.1" value="0.5"></p>
                        <label class="wrp-select wrp-checkbox">Сохранять пропорции
                            <input type="checkbox" name="item-1" checked="">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="bottom-btn flex jcc">
                <button class="btn-convert">
                    <p>Конвертировать из JPG</p>
                </button>
            </div>
        </div>
    </div>

@endsection





