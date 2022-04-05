<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ env('APP_NAME') }}</title>
        <!-- Scripts -->
        <script src="{{ asset('js/design.js') }}"></script>
        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <meta name="robots" content="noindex" />
    </head>
    <body id="general">
        <div class="LoginmodalOutside d-inline-block h-100 p-2 p-md-0 text-center">
        <!--div class="bubble-background w-100 h-100"></div-->
            <div id="Loginmodal" class="LoginFormWrapper m-auto pt-5 pb-5 pr-3 pl-3 bg-white d-inline-block col-10 col-md-6 col-lg-4 position-relative">
                <div id="" class="col-12 float-md-right pr-0 pl-0">
                    <div class="m-auto">
                        <div class="w-100 d-inline-block text-center">
                            <h3 class="font-weight-bold mb-0 m-auto pb-4">
                                サインインする
                            </h3>
                        </div>
                    </div>
                    <div class="w-100 m-auto">
                        <form method="POST" class=" col-md-12 m-auto pl-0 pr-0 bg-white" role="form" method="POST" action="{{ url('/register') }}">
                            @csrf
                            <div class="col-12 m-auto">
                                <div class="w-100 d-inline-block">
                                    <div class="w-100 d-inline-block mb-3">
                                        <div class="tablediv bg-white w-100 d-inline-block">
                                            <input id="name" type="text" 
                                            class="loginborder br5px w-100 bg-white pl-2 fileinput @error('name') is-invalid @enderror"
                                            placeholder="ユーザー名(必須)"
                                            name="name" value="" 
                                            required autocomplete="name" 
                                            autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="w-100 d-inline-block mb-3">
                                        <div class="tablediv bg-white w-100 d-inline-block">
                                            <input id="email"
                                            type="email"
                                            class="loginborder br5px w-100 bg-white pl-2 fileinput @error('email') is-invalid @enderror"
                                            name="email"
                                            placeholder="sample@gmail.com(必須)"
                                            required
                                            autocomplete="email">
                                            @error('email')
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
                                            placeholder="user password(必須)"
                                            required
                                            autocomplete="password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="w-100 d-inline-block mb-3">
                                        <div class="tablediv bg-white w-100 d-inline-block">
                                            <input id="password-confirm"
                                            type="password"
                                            class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                            name="password_confirmation"
                                            placeholder="user password confirm(必須)"
                                            required
                                            autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="w-100 d-inline-block mb-3">
                                        <div class="tablediv bg-white w-100 d-inline-block">
                                            <input id="companyname"
                                            type="text"
                                            class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                            name="companyname"
                                            placeholder="社名(任意)"
                                            >
                                        </div>
                                    </div>
                                    <div class="w-100 d-inline-block mb-3">
                                        <div class="tablediv bg-white w-100 d-inline-block">
                                            <input id="companyaddress"
                                            type="text"
                                            class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                            name="companyaddress"
                                            placeholder="会社所在地(任意)"
                                            >
                                        </div>
                                    </div>
                                    <div class="w-100 d-inline-block mb-3">
                                        <div class="tablediv bg-white w-100 d-inline-block">
                                            <input id="companytel"
                                            type="text"
                                            class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                            name="companytel"
                                            placeholder="会社電話番号(任意)"
                                            >
                                        </div>
                                    </div>
                                    <div class="w-100 d-inline-block mb-3">
                                        <div class="tablediv bg-white w-100 d-inline-block">
                                            <input id="companymail"
                                            type="text"
                                            class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                            name="companymail"
                                            placeholder="会社メールアドレス(任意)"
                                            >
                                        </div>
                                    </div>
                                    <div class="w-100 d-inline-block mb-3">
                                        <div class="tablediv bg-white w-100 d-inline-block">
                                            <input id="companyindustry"
                                            type="text"
                                            class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                            name="companyindustry"
                                            placeholder="業界(任意)"
                                            >
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 m-auto pb-4">
                                <button type="submit" class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor br5px">
                                    {{ __('サインイン') }}
                                </button>
                            </div>
                        </form>
                        <div class="d-inline-block w-100">
                            <a class="d-inline-block font-weight-bold" href="{{ route('dashboard') }}">
                                {{ __('もどる') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="module">
        import {SetElementMiddle} from '/js/design.js'
        ['load', 'resize'].forEach((ev) => {
            window.addEventListener(ev, () => {
<<<<<<< HEAD
                SetElementMiddle('Loginmodal');
=======
                (() => {
                    SetElementMiddle('Loginmodal');
                })();
>>>>>>> okregister
            });
        });
        </script>
    </body>
</html>