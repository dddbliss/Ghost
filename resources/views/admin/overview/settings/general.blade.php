<form method="POST" action="{{ route('admin.overview.settings.general') }}">
	{{ csrf_field() }}

	<!-- Site Title -->
	<label class="form__label" for="site_title">{{ static_text('form.site_title.title') }}</label>
	<input type="text" class="form__input" name="site_title" value="{{ site_title() }}">

	<!-- Site Subtitle -->
	<label class="form__label" for="site_subtitle">{{ static_text('form.site_subtitle.title') }}</label>
	<input type="text" class="form__input" name="site_subtitle" value="{{ site_subtitle() }}">

	<!-- Submit -->
	<input type="submit" class="button background-green full-width" value="{{ static_text('form.submit') }}">

</form>