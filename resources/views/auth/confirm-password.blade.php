@extends('layouts.main')
@section('title', __('localization.confirm_title'))
@section('meta_keyword', '')
@section('meta_description', __('localization.confirm_description'))
@section('content')
     <form class="pop-login pop-login-static" method="POST" action="{{ route('password.confirm') }}">
         <x-auth-validation-errors class="mb-4" :errors="$errors" />
         @csrf
         <input placeholder="{{__('localization.password')}}" id="password" type="password" name="password" required autocomplete="current-password"/>
         <button type="submit">{{__('localization.confirm')}}</button>
     </form>
@stop
