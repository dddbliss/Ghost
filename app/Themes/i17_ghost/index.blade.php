@include(get_theme_part('header', 'admin'))
	
	<!-- Topbar -->
	<div class="topbar">
		
		<!-- Site Title -->
		<div class="site-title">
			<h1 class="site-title__heading">Ghost</h1>
		</div>

	</div>

	<!-- Offcanvas -->
	<div class="offcanvas">

		<!-- Sidebar -->
		<div class="offcanvas__side offcanvas__side--left sidebar">
			@include(get_theme_part('sidebar', 'admin'))
		</div>

		<!-- Content -->
		<div class="offcanvas__content content">
			<h2 class="content__title">{{ static_text('title') }}</h2>
			@yield('content')
		</div>

	</div>

@include(get_theme_part('footer', 'admin'))