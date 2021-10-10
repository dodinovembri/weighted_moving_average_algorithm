<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Sistem Peramalan Waralaba Ayam Menggunakan Weighted Moving Average">
	<meta name="author" content="WMA_System">
	<title>Administrator</title>
	<link rel="apple-touch-icon" href="{{ asset('assets/app-assets/images/favicon/apple-touch-icon-152x152.png') }}">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/app-assets/images/favicon/favicon-32x32.png') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- BEGIN: VENDOR CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/vendors.min.css') }}">
	<!-- END: VENDOR CSS-->
	<!-- BEGIN: Page Level CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/themes/vertical-modern-menu-template/materialize.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/themes/vertical-modern-menu-template/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/pages/data-tables.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/flag-icon/css/flag-icon.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/data-tables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/data-tables/css/select.dataTables.min.css') }}">


	<!-- END: Page Level CSS-->
	<!-- BEGIN: Custom CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/custom/custom.css') }}">
	<!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

	@yield('content')


	<!-- BEGIN: Footer-->

	<footer class="page-footer footer footer-static footer-dark gradient-45deg-indigo-purple gradient-shadow navbar-border navbar-shadow">
		<div class="footer-copyright">
			<div class="container"><span>&copy; 2021 All rights reserved.</span></div>
		</div>
	</footer>

	<!-- END: Footer-->
	<!-- BEGIN VENDOR JS-->
	<script src="{{ asset('assets/app-assets/js/vendors.min.js') }}"></script>

	<script src="{{ asset('assets/app-assets/vendors/data-tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/app-assets/vendors/data-tables/js/dataTables.select.min.js') }}"></script>


	<!-- BEGIN VENDOR JS-->
	<!-- BEGIN PAGE VENDOR JS-->
	<!-- END PAGE VENDOR JS-->
	<!-- BEGIN THEME  JS-->
	<script src="{{ asset('assets/app-assets/js/plugins.min.js') }}"></script>
	<script src="{{ asset('assets/app-assets/js/search.min.js') }}"></script>
	<script src="{{ asset('assets/app-assets/js/custom/custom-script.min.js') }}"></script>
	<script src="{{ asset('assets/app-assets/js/scripts/customizer.min.js') }}"></script>

	<script src="{{ asset('assets/app-assets/js/scripts/data-tables.min.js') }}"></script>
	<script src="{{ asset('assets/app-assets/js/scripts/advance-ui-modals.min.js') }}"></script>
	<!-- END THEME  JS-->
	<!-- BEGIN PAGE LEVEL JS-->
	<!-- END PAGE LEVEL JS-->
</body>

</html>
