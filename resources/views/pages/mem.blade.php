@extends('layouts.main')
@section('title',__('localization.index_title'))
@section('meta_description',"")

@section('header-title',"Генератор мемов")
@section('header-capt')
    <div class="capt">Создайте мем из изображений JPG, GIF или PNG. Отредактируйте свое изображение и создайте мем.</div>
@endsection

@section('content')
    <div class="content white">
        <div class="container">
            <div class="wrap-content ">
                <div class="upload-place">
                    <img src="img/open-folder.svg">
                    <span>Перетащите в это поле ваши <a href="">изображения</a></span>
                    <p>или <a href="">загрузите</a> их с вашего компьютера</p>
                </div>
                <button class="upload-mobile">Загрузить изображения</button>
                <div class="upload-buttons flex aic jcc">
                    <button><img src="img/google-drive.svg">Google Drive</button>
                    <button><img src="img/dropbox.svg">Dropbox</button>
                    <span>или</span>
                    <button class="btn-temp show-modal" data-pop="pop-mem">Выбрать шаблон мема</button>
                </div>
            </div>
            <div class="safe-transfer flex aic jcc">
                <img src="img\lock-icon.svg">
                <span>Безопасная передача файлов и данных</span>
            </div>
        </div>
    </div>

    <div class="wrp-settings" style="display: none">
        <div class="btn-settings"></div>
        <!-- generator -->
        <div class="settings">
            <div class="capt">Параметры генератора</div>
            <div class="tabs">
                <div class="tab-radiobox flex nowrap">
                    <div class="item active" data-tab="tab-inner">Текст<br>внутри</div>
                    <div class="item" data-tab="tab-outer">Текст<br>снаружи</div>
                </div>
                <div class="tab-content current tab-inner">
                    <button class="btn-grey add-img"><p>Добавить изображение</p></button>
                    <button onclick="createInput()" class="btn-grey add-text"><p>Добавить текст</p></button>
                </div>
                <div class="tab-content tab-outer">
                    <button class="btn-grey add-img"><p>Добавить изображение</p></button>
                    <button class="btn-grey add-text"><p>Добавить текст</p></button>
                </div>
            </div>
            <div class="bottom-btn flex jcc">
                <button class="btn-mem">
                    <p>Сгенерировать мем</p>
                </button>
            </div>
        </div>
    </div>


    <div class="pop-up pop-mem">
        <a class="close"></a>
        <div class="capt">Шаблон мема</div>
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
                    <img src="img/mem.jpg">
                </div>
                <button onclick="chooseCanvas(0)">Использовать</button>
            </div>
            <div class="item">
                <p>Drake Hotline Bling</p>
                <div class="image">
                    <img
                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-images/grapefruit-slice-332-332.jpg">
                </div>
                <button data-id="1">Использовать</button>
            </div>
            <div class="item">
                <p>Drake Hotline Bling</p>
                <div class="image">
                    <img src="img/mem.jpg">
                </div>
                <button data-id="2">Использовать</button>
            </div>
            <div class="item">
                <p>Drake Hotline Bling</p>
                <div class="image">
                    <img
                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-images/grapefruit-slice-332-332.jpg">
                </div>
                <button data-id="3">Использовать</button>
            </div>
            <div class="item">
                <p>Drake Hotline Bling</p>
                <div class="image">
                    <img
                        src="https://interactive-examples.mdn.mozilla.net/media/cc0-images/grapefruit-slice-332-332.jpg">
                </div>
                <button data-id="4">Использовать</button>
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





