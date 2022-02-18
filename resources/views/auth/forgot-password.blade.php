@extends('layouts.main')
@section('title', __('localization.forgot_title'))
@section('meta_keyword', '')
@section('meta_description', __('localization.forgot_description'))
@section('content')
     <form class="pop-login pop-login-static" method="POST" action="{{ route('password.email') }}">
         <x-auth-session-status class="mb-4" :status="session('status')" />
         <x-auth-validation-errors class="mb-4" :errors="$errors" />
         @csrf
         <input placeholder="{{__('localization.email')}}" id="email" type="email" name="email" value="{{old('email')}}" required autofocus />
         <button type="submit">{{__('localization.email_reset_link')}}</button>
     </form>
@stop
