@extends('layouts.main')
@section('title', __('localization.reset_title'))
@section('meta_keyword', '')
@section('meta_description', __('localization.reset_description'))
@section('content')
    <form class="pop-login pop-login-static" method="POST" action="{{ route('password.update') }}">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <input placeholder="{{__('localization.email')}}" id="email" type="email" name="email" value="{{old('email', $request->email)}}" required autofocus/>
        <input placeholder="{{__('localization.password')}}" id="password" type="password" name="password" required />
        <input placeholder="{{__('localization.confirm_password')}}" id="password_confirmation" type="password" name="password_confirmation" required/>
        <button type="submit">{{__('localization.reset_password')}}</button>
    </form>
@stop
