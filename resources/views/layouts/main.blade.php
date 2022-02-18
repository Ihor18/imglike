<!doctype html>
<html class="no-js" lang="{{ (app()->getLocale() == 'ua')?'uk': app()->getLocale()}}">
<head>
    <title>@if(View::hasSection('title'))@yield('title')@endif</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta name="google-site-verification" content="hNLsga_L7UC5CUP7lP12BCDEKWEWVFlyY7Y-yJDHs4k"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(View::hasSection('meta_keyword'))
        <meta name="keywords" content="@yield('meta_keyword')"/>
    @endif
    @if(View::hasSection('meta_description'))
        <meta name="description" content="@yield('meta_description')"/>
        <meta property="og:description" content="@yield('meta_description')">
    @endif
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{Request::url()}}">
    <meta property="og:title" content="@if(View::hasSection('title'))@yield('title')@endif">
    @section('metaDublinCore')
        <meta name="DC.Title" content="@if(View::hasSection('title'))@yield('title')@endif">
        <meta name="DC.Creator" content="SNB-Team">
        <meta name="DC.Subject" content="@yield('title')">
        <meta name="DC.Description" content="@yield('meta_description')">
        <meta name="DC.Publisher" content="{{config('app.name')}}">
        <meta name="DC.Language" content="{{ app()->getLocale() }}">
    @show
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset("favicon/apple-icon-57x57.png")}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset("favicon/apple-icon-60x60.png")}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset("favicon/apple-icon-72x72.png")}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("favicon/apple-icon-76x76.png")}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset("favicon/apple-icon-114x114.png")}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset("favicon/apple-icon-120x120.png")}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset("favicon/apple-icon-144x144.png")}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset("favicon/apple-icon-152x152.png")}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("favicon/apple-icon-180x180.png")}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset("favicon/android-icon-192x192.png")}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("favicon/favicon-32x32.png")}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset("favicon/favicon-96x96.png")}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("favicon/favicon-16x16.png")}}">
    <meta name="msapplication-TileColor" content="#ffffff">

    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:ital,wght@0,400;1,600,700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="canonical" href="{{Request::url()}}"/>
    {{--    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}">--}}
    {{--    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">--}}
    {{--    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">--}}
    {{--    <link rel="mask-icon" href="{{asset('favicon/safari-pinned-tab.svg')}}" color="#5bbad5">--}}
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">

@yield('style')

<!-- Global site tag (gtag.js) - Google Analytics -->
{{--    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121811015-1"></script>--}}
{{--    <script>--}}
{{--        window.dataLayer = window.dataLayer || [];--}}

{{--        function gtag() {--}}
{{--            dataLayer.push(arguments);--}}
{{--        }--}}

{{--        gtag('js', new Date());--}}
{{--        gtag('config', 'UA-121811015-1');--}}
{{--    </script>--}}
</head>
<body @yield('body-class')>
@php
    $currentLang = App\Http\Middleware\LocaleMiddleware::getLocale();
    $arrayLang = App\Http\Middleware\LocaleMiddleware::$languages;
    $arrayApproveLang = App\Http\Middleware\LocaleMiddleware::$approvedLanguages;
    $currentUser = Auth::user();
@endphp

<div class="wrapper">
    <div class="bg-blue">
        @include("layouts.header")
        <div class="container">
            <div class="title">@yield('header-title') </div>

            @yield('header-capt')

        </div>
    </div>
    @yield('content')
    <div class="loader" style="display: none">
        <div class="loader-block"></div>
    </div>
</div>
@include("layouts.footer")

<script src="{{mix('js/app.js')}}"></script>
<script src="{{asset('js/vendor/modernizr-3.8.0.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery-3.4.1.min.js')}}"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="{{asset('js/image.js')}}"></script>

@yield('script')
<!-- Yandex.Metrika counter -->

{{--<script type="text/javascript">--}}
{{--    (function (m, e, t, r, i, k, a) {--}}
{{--        m[i] = m[i] || function () {--}}
{{--            (m[i].a = m[i].a || []).push(arguments)--}}
{{--        };--}}
{{--        m[i].l = 1 * new Date();--}}
{{--        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)--}}
{{--    })--}}
{{--    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");--}}

{{--    ym(49487143, "init", {--}}
{{--        clickmap: true,--}}
{{--        trackLinks: true,--}}
{{--        accurateTrackBounce: true,--}}
{{--        trackHash: true--}}
{{--    });--}}
{{--</script>--}}
{{--<noscript>--}}
{{--    <div><img src="https://mc.yandex.ru/watch/49487143" style="position:absolute; left:-9999px;" alt=""/></div>--}}
{{--</noscript>--}}
<!-- /Yandex.Metrika counter -->
</body>
</html>
