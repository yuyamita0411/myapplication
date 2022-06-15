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
                                ログイン
                            </h3>
                        </div>
                    </div>
                    <div class="w-100 m-auto">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script type="module">
        import {SetElementMiddle} from '/js/design.js'
        ['load', 'resize'].forEach((ev) => {
            window.addEventListener(ev, () => {
                SetElementMiddle('Loginmodal');
            });
        });
        </script>
    </body>
</html>
