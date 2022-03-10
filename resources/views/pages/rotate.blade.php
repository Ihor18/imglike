@extends('layouts.main')
@section('title',__('localization.rotate').' '.__('localization.image'))
@section('meta_description',"")

@section('header-title',__('localization.rotate').' '.__('localization.image'))
@section('header-capt')
    <div class="capt">{{__('localization.convert_from_capt')}}</div>
@endsection

@section('content')
    <div class="content white">
        <div id="load" class="container">
            <div class="wrap-content">
                <div class="upload-place">
                    <form id="send-image" method="post" action="{{route('compress-image')}}">
                        @csrf
                        <img src="{{asset('img/open-folder.svg')}}">
                        <span> {{__('localization.drag')}} <label for="file_input_id"><a>{{__('localization.image')}}</a></label></span>
                        <p>{{__('localization.or')}} <label for="file_input_id" class="upload-link" >{{__('localization.upload')}}</label>
                            <input type="file" id="file_input_id" name="file" multiple accept=".jpg,.jpeg,.png,.bmp,.gif,.svg"
                                   onchange="refresh(this.files)"> {{__('localization.upload_text')}}</p>
                    </form>
                </div>

                @include('layouts.download',['btnText'=>__('localization.upload_images')])
            </div>

            @include('layouts.download-image',['btnTitle'=>__('localization.download_rotated')])

        </div>
        @include('layouts.safe-transfer')
    </div>


    <div class="wrp-settings " style="display: none">
        <div class="btn-settings"></div>
        <!-- rotate -->
        <div class="settings"  >
            <div class="capt">{{__('localization.rotation_options')}}</div>
            <div class="tabs rotate">
                <div class="tab-radiobox flex nowrap">
                    <div class="item active" data-tab="tab-all"><div class="icon"></div>{{__('localization.all')}}</div>
                    <div class="item" data-tab="tab-portret"><div class="icon"></div>{{__('localization.portrait')}}</div>
                    <div class="item" data-tab="tab-album"><div class="icon"></div>{{__('localization.album')}}</div>
                </div>
                <div class="tab-content current tab-all">
                    <p>{{__('localization.rotate')}}:</p>
                    <div class="flex jcsb">
                        <div class="right" onclick="rotateDeg(90)"><div class="icon"></div>{{__('localization.right')}}</div>
                        <div class="left" onclick="rotateDeg(-90)"><div class="icon"></div>{{__('localization.left')}}</div>
                    </div>
                    <button class="btn-grey discard" onclick="reset()"><p>{{__('localization.reset_all')}}</p></button>
                </div>
                <div class="tab-content tab-portret">
                </div>
                <div class="tab-content tab-album">
                </div>
            </div>
            <div class="bottom-btn flex jcc">
                <button class="btn-rotate" onclick="rotateImage()">
                    <p>{{__('localization.rotate')}}</p>
                </button>
            </div>
        </div>
    </div>


@endsection





