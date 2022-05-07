@extends('layouts.loginlayout')
@section('content')
<form method="POST" action="{{ route('login') }}" class=" col-md-12 m-auto pl-0 pr-0 bg-white">
    @csrf
    <div class="col-12 col-lg-10 m-auto">
        <div class="w-100 d-inline-block">
            @if (session()->has('msg1'))
                <h4 class="text-danger text-center font-weight-bold">{{ session('msg1') }}</h4>
            @endif
            @if (session()->has('msg2'))
                <h4 class="text-danger text-center font-weight-bold mb-4">{{ session('msg2') }}</h4>
            @endif
            <div class="w-100 d-inline-block mb-3">
                <div class="tablediv bg-white w-100 d-inline-block">
                    <input id="mail_address" type="mail_address" 
                    class="loginborder br5px w-100 bg-white pl-2 fileinput @error('mail_address') is-invalid @enderror"
                    placeholder="mail@gmail.com"
                    name="mail_address" value="{{ old('mail_address') }}" 
                    required autocomplete="mail_address" 
                    autofocus>
                    @error('mail_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="w-100 d-inline-block mb-3">
                <div class="tablediv bg-white w-100 d-inline-block">
                    <input id="password"
                    type="password"
                    class="loginborder br5px w-100 bg-white pl-2 fileinput @error('password') is-invalid @enderror"
                    name="password"
                    placeholder="password"
                    required
                    autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            @error('loginid')
            <span class="red">
                <strong>{{ $errors->first('loginid') }}</strong>
            </span>
            @enderror
            
        </div>
    </div>
    <div class="col-12 col-lg-10 m-auto pb-4">
        <button type="submit" class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor br5px">
            {{ __('ログイン') }}
        </button>
    </div>
    @if (Route::has('password.request'))
    <div class="d-inline-block w-100">
        <a class="d-inline-block font-weight-bold" href="{{ route('password.request') }}">
            {{ __('パスワードを忘れた方はこちら') }}
        </a>
    </div>
    @endif
    <div class="d-inline-block w-100">
        <a class="d-inline-block font-weight-bold" href="{{ route('register') }}">
            サインインする
        </a>
    </div>
</form>
@endsection