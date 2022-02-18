@extends('layouts.main')
@section('title', __('localization.verify_title'))
@section('meta_keyword', '')
@section('meta_description', __('localization.verify_description'))
@section('content')
    @if (session('status') == 'verification-link-sent')
        <div>{{__('localization.resend_email_text')}}</div>
    @endif
    <form class="pop-login pop-login-static" method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">{{__('localization.resend_email')}}</button>
    </form>
@stop
