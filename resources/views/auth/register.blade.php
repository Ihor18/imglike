@extends('layouts.main')
@section('title', __('localization.register_title'))
@section('meta_keyword', '')
@section('meta_description', __('localization.register_description'))
@section('content')

    <form class="pop-login pop-login-static"  method="POST" action="{{ route('register') }}">
        <span>{{__('localization.refistration')}}</span>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @csrf
        <input placeholder="{{__('localization.name')}}" id="name" type="text" name="name" value="{{old('name')}}" required autofocus />
        <input placeholder="{{__('localization.email')}}" id="email" type="email" name="email" value="{{old('email')}}" required >
        <input placeholder="{{__('localization.password')}}" id="password" type="password" name="password" required autocomplete="new-password"/>
        <input placeholder="{{__('localization.confirm_password')}}" id="password_confirmation" type="password" name="password_confirmation" required />
        <a href="{{ route('login') }}" class="reg-link" style="margin-bottom: 20px; display: inline-block;">{{__('localization.already_registered')}}</a>
        <button type="submit">{{__('localization.register')}}</button>
    </form>
@stop
