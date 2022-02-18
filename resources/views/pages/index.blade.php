@extends('layouts.main')
@section('title',__('localization.index_title'))
@section('meta_description',"")

@section('header-title',"Безплатные онлайн редакторы изображений")
@section('header-capt')
    <div class="caption">Попробуйте сейчас без регистрации</div>
    <div class="capt">*Ваши изображения мы сохраняем у себя. Это безопасно и конфиденциально</div>
@endsection
@section('body-class','class=main-page')
@section('content')
    <div class="content white">
        <div class="container">

            <ul class="list-apps wrap-content flex jcsb">
                <li>
                    <a href="{{route('compress')}}">
                        <div class="icon">
                            <img src="img/icon-tiny.svg">
                        </div>
                        <p>Сжать изображение</p>
                        <span>Задайте размеры в процентах или пикселях и измените размер изображений JPG, PNG, SVG и GIF.</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('resize')}}">
                        <div class="icon">
                            <img src="img/icon-resize.svg">
                        </div>
                        <p>Изменить размер</p>
                        <span>Задайте размеры в процентах или пикселях и измените размер изображений JPG, PNG, SVG и GIF.</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('crop')}}">
                        <div class="icon">
                            <img src="img/icon-crop.svg">
                        </div>
                        <p>Обрезать изображение</p>
                        <span>Задайте размеры в процентах или пикселях и измените размер изображений JPG, PNG, SVG и GIF.</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('rotate')}}">
                        <div class="icon">
                            <img src="img/icon-rotate.svg">
                        </div>
                        <p>Повернуть изображение</p>
                        <span>Задайте размеры в процентах или пикселях и измените размер изображений JPG, PNG, SVG и GIF.</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('redactor')}}">
                        <div class="icon">
                            <img src="img/icon-redactor.svg">
                        </div>
                        <p>Редактор изображений</p>
                        <span>Задайте размеры в процентах или пикселях и измените размер изображений JPG, PNG, SVG и GIF.</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('watermark')}}">
                        <div class="icon">
                            <img src="img/icon-watermark.svg">
                        </div>
                        <p>Наложить водяной знак</p>
                        <span>Задайте размеры в процентах или пикселях и измените размер изображений JPG, PNG, SVG и GIF.</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('convert-in-jpg')}}">
                        <div class="icon">
                            <img src="img/icon-convert-2.svg">
                        </div>
                        <p>Конвертироваь в JPG</p>
                        <span>Задайте размеры в процентах или пикселях и измените размер изображений JPG, PNG, SVG и GIF.</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('convert-from-jpg')}}">
                        <div class="icon">
                            <img src="img/icon-convert-1.svg">
                        </div>
                        <p>Конвертироваь из JPG</p>
                        <span>Задайте размеры в процентах или пикселях и измените размер изображений JPG, PNG, SVG и GIF.</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('html-to-image')}}">
                        <div class="icon">
                            <img src="img/icon-html.svg">
                        </div>
                        <p>HTML в изображение</p>
                        <span>Задайте размеры в процентах или пикселях и измените размер изображений JPG, PNG, SVG и GIF.</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('meme')}}">
                        <div class="icon">
                            <img src="img/icon-generator.svg">
                        </div>
                        <p>Генератор мемов</p>
                        <span>Задайте размеры в процентах или пикселях и измените размер изображений JPG, PNG, SVG и GIF.</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('photoshop')}}">
                        <div class="icon">
                            <img src="img/icon-photoshop.svg">
                        </div>
                        <p>Фотошоп онлайн</p>
                        <span>Задайте размеры в процентах или пикселях и измените размер изображений JPG, PNG, SVG и GIF.</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <div class="icon" style="background: 0;">
                            <img src="img/more.jpg">
                        </div>
                        <p>Еще больше возможностей</p>
                        <span>Задайте размеры в процентах или пикселях и измените размер изображений JPG, PNG, SVG и GIF.</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="why-imglike">
        <div class="container">
            <div class="image">
                <img src="img/screen-1.png">
            </div>
            <div class="text">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="title">Пакетное редактирование фотографий</div>
                        <p>С помощью пакетной обработки файлов вы можете конвертировать несколько фотографий
                            одновременно. <br>Сервис IMGLike позволяет преобразовывать файлы форматов PNG, JPG, GIF,
                            WEBP, HEIC, RAW и многие другие. Групповое преобразование файлов размером до 1 ГБ за задачу
                            в пакете Premium.</p>
                    </div>
                    <div class="item">
                        <div class="title">Пакетное редактирование фотографий 2</div>
                        <p>С помощью пакетной обработки файлов вы можете конвертировать несколько фотографий
                            одновременно. <br>Сервис IMGLike позволяет преобразовывать файлы форматов PNG, JPG, GIF,
                            WEBP, HEIC, RAW и многие другие. Групповое преобразование файлов размером до 1 ГБ за задачу
                            в пакете Premium.</p>
                    </div>
                    <div class="item">
                        <div class="title">Пакетное редактирование фотографий 3</div>
                        <p>С помощью пакетной обработки файлов вы можете конвертировать несколько фотографий
                            одновременно. <br>Сервис IMGLike позволяет преобразовывать файлы форматов PNG, JPG, GIF,
                            WEBP, HEIC, RAW и многие другие. Групповое преобразование файлов размером до 1 ГБ за задачу
                            в пакете Premium.</p>
                    </div>
                </div>

            </div>


        </div>
    </div>

@endsection





