@extends('layouts.main')
@section('title', __('localization.p404_title'))
@section('meta_keyword', '')
@section('meta_description', __('localization.p404_description'))
@section('content')
    <div class="not-found">
        <div class="container">
            <img src="{{asset('staticImg/404.svg')}}">
            <p>То что вы ищете, тут нет. Но на <a href="/">главной</a> вы сможете найти много  интересных соперников для себя.</p>
        </div>
    </div>
@stop
