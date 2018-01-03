<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>@yield('title')</title>

		@yield('css-links')

</head>

<body class="adminbody">

<div id="main">

	<!-- top bar navigation -->
	@include('admin.partials.header')
	<!-- End Navigation -->


	<!-- Left Sidebar -->
	@include('admin.partials.left_sidebar')
	<!-- End Sidebar -->


    <div class="content-page">

		<!-- Start content -->
        <div class="content">
		        @yield('content')
		    </div>
		<!-- END content -->

    </div>
	<!-- END content-page -->

@include('admin.partials.footer')

</div>
<!-- END main -->

<!-- Javascript BEGIN -->
      @yield('js-links')
<!-- END Java Script for this page -->

</body>
</html>
