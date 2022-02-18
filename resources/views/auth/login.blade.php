@extends('layouts.main')
@section('title', __('localization.login_title'))
@section('meta_keyword', '')
@section('meta_description', __('localization.login_description'))
@section('content')
    <form class="pop-login pop-login-static" method="POST" action="{{ route('login') }}">
    @csrf
        @include('components.login-form')
    </form>
@stop
