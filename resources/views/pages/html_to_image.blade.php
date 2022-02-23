@extends('layouts.main')
@section('title',__('localization.index_title'))
@section('meta_description',"")

@section('header-title',"HTML в изображение")
@section('header-capt')
    <div class="capt">Преобразовывайте веб-страницы в JPG или SVG и сохраняйте визуальный аспект.</div>
@endsection

@section('content')

    <div class="content white">
        <div class="container">
            <div class="wrap-content">
                <div class="url-area">
                    <form action="">
                        <div class="input flex aic jcsb">
                            <img src="img/website-icon.svg">
                            <input type="text" name="url" onchange="enterURL(this.value)" placeholder="https://online-tetris.ru/">
                        </div>

                    </form>
                    <button onclick="htmlToImage()">Добавить URL</button>
                </div>
            </div>

            <div class="safe-transfer flex aic jcc">
                <img src="img\lock-icon.svg">
                <span>Безопасная передача файлов и данных</span>
            </div>

        </div>
    </div>

    <div class="wrp-settings " style="display: none">
        <div class="btn-settings"></div>
        <!-- html -->
        <div class="settings">
            <div class="capt">HTML в изображение</div>
            <div class="html-img">
                <ul>
                    <li>
                        <p>Введите адрес:</p>
                        <div class="input-field flex jcsb aic">
                            <input type="text" name="url" required onchange="enterURL(this.value)" placeholder="https://online-tetris.ru/" class="url">
                            <button class="btn-reload" onclick="clearField('name','url')"></button>
                        </div>
                    </li>
                    <li>
                        <p>Размер экрана:</p>
                        <div class="input-field">
                            <div class="custom-select">
                                <select id="size">
                                    <option data-width="800" data-height="600" value="0">Выберите размер:</option>
                                    <option data-width="1920" data-height="1080" value="1">1920х1080</option>
                                    <option data-width="980" data-height="640" value="2">980х640</option>
                                    <option data-width="1360" data-height="980" value="3">1360х980</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li>
                        <p>Ковертировать в:</p>
                        <div class="input-field">
                            <div class="custom-select">
                                <select id="format">
                                    <option value="png">Выберите формат:</option>
                                    <option value="jpg">jpg</option>
                                    <option value="png">png</option>
                                    <option value="pdf">pdf</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li>
                        <p>Настройки HTML:</p>
                        <div class="input-field">
                            <label class="wrp-select wrp-checkbox">Заблокировать рекламу
                                <input type="checkbox" name="add-block" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                            <label class="wrp-select wrp-checkbox">Скриншот всей страницы
                                <input type="checkbox" name="full-page" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                            <label class="wrp-select wrp-checkbox">Удалить всплывающие окна
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
                    <p>Конвертировать HTML</p>
                </button>
            </div>
        </div>
    </div>


@endsection





