<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ env('APP_NAME') }}</title>
        <!-- Scripts -->
        <script src="{{ secure_asset('js/design.js') }}"></script>
        <!-- Styles -->
        <link href="{{ secure_asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">

        <!-- Global site tag (gtag.js) - Google Analytics -->
    </head>
    <body id="general">
        <form action="{{ route('password.email') }}" method="POST" class="LoginmodalOutside pl-2 pr-2 p-md-0 text-center h-100">
            @csrf
            <div id="Loginmodal" class="LoginFormWrapper m-auto pt-5 pb-5 pl-3 pr-3 bg-white d-inline-block col-10 col-md-6 col-lg-4 position-relative">
                <div id="" class="col-12 float-md-right pr-0 pl-0">
                    <div class="m-auto">
                        <div class="w-100 d-inline-block text-center">
                            <h3 class="font-weight-bold mb-0 m-auto pb-4">
                                パスワードリセット
                            </h3>
                        </div>
                    </div>
                    <div class="w-100 m-auto">
                        <div class=" col-md-12 m-auto pl-0 pr-0 bg-white">
                            <div class="col-12 col-lg-10 m-auto pb-3">
                                <div class="w-100 d-inline-block">
                                    <div class="w-100 d-inline-block">
                                        <div class="tablediv bg-white w-100 d-inline-block">
                                            <input type="text" name="mail_address" 
                                            class="br5px w-100 bg-white fileinput b-none mt-0" placeholder="test@gmail.com">
                                        </div>
                                    </div>
                                </div>

                                @error('mail_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                               
                                @if (!empty($nousermsg))
                                    <span class="text-left" style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">
                                        <strong class="w-100 text-left d-inline-block">{{ $nousermsg }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="col-12 col-lg-10 m-auto pb-4">
                                <input type="submit" value="パスワード変更URLを通知する" class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor br5px">
                            </div>
                            <a href="{{ route('dashboard') }}" class="d-inline-block font-weight-bold">もどる</a>
                        </div>
                    </div>
                </div>

                @if (!empty($successmsg))
                <div class="alert alert-success d-inline-block" role="alert">
                    {{ $successmsg }}
                </div>
                @endif

            </div>
        </form>
    </body>
</html>

<script type="module">
import {SetElementMiddle} from '/js/design.js'
['load', 'resize'].forEach((ev) => {
    window.addEventListener(ev, () => {
        SetElementMiddle('Loginmodal');
    });
});
</script>