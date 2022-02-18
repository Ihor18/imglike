<form class="pop-up pop-login pop-login-modal {{(!Request::is('register')&&!Request::is('forgot-password')&&!Request::is('login')&&!Request::is('reset-password*')&&!Request::is('confirm-password')) && $errors->any()?'md-show':''}}"  method="POST" action="{{ route('login') }}">
    @csrf
    @include('components.login-form')
</form>
