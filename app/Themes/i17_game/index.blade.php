@include(get_theme_part('header'))
	
	<div class="container">

		<!-- Navigation -->
		{{ display_menu('topbar') }}
		
		@yield('content')

	</div>

@include(get_theme_part('footer'))