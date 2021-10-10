<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Sistem Peramalan Waralaba Ayam Menggunakan Weighted Moving Average">
    <meta name="author" content="WMA_System">
    <title>Login | Administrator</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/app-assets/images/favicon/apple-touch-icon-152x152.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/app-assets/images/favicon/favicon-32x32.png') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/vendors.min.css') }}">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/themes/vertical-modern-menu-template/materialize.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/themes/vertical-modern-menu-template/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/pages/login.css') }}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/custom/custom.css') }}">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 1-column login-bg   blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div id="login-page" class="row">
                    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
                        <form method="POST" class="login-form" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <h5 class="ml-4">Sign in</h5>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">person_outline</i>
                                    <input id="username" name="email" type="text">
                                    <label for="username" class="center-align">Username</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">lock_outline</i>
                                    <input id="password" name="password" type="password">
                                    <label for="password">Password</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12 ml-2 mt-1">
                                    <p>
                                        <label>
                                            <input type="checkbox" />
                                            <span>Remember Me</span>
                                        </label>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('assets/app-assets/js/vendors.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{ asset('assets/app-assets/js/plugins.min.js') }}"></script>
    <script src="{{ asset('assets/app-assets/js/search.min.js') }}"></script>
    <script src="{{ asset('assets/app-assets/js/custom/custom-script.min.js') }}"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
</body>

</html>