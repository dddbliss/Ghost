<form method="POST" action="{{ route('admin.content.pages.create') }}">
	{{ csrf_field() }}

	<!-- Content -->
	<div class="lg-9 md-8 sm-12 column column__first">
		
		<!-- Title -->
		<label class="form__label" for="title">{{ static_text('form.title.title') }}</label>
		<input type="text" class="form__input" name="title">

		<!-- Url -->
		<label class="form__label" for="slug">{{ static_text('form.slug.title') }}</label>
		<div class="form__group">
			<div class="form__group__label background-blue">{{ url('/') }}</div>
			<input class="form__group__input form__input" name="slug">
		</div>

		<!-- Content -->
		<label class="form__label" for="content">{{ static_text('form.content.title') }}</label>
		<textarea class="form__input form__input--textarea" name="content" id="tinyLarge"></textarea>

		{{ Hook::run('page_form_content') }}

	</div>

	<!-- Sidebar -->
	<div class="lg-3 md-4 sm-12 column column__last">

		<!-- Parent -->
		<label class="form__label" for="parent">{{ static_text('form.parent.title') }}</label>
		<select class="form__input" name="parent">
			<option value="none">-- {{ static_text('form.parent.no_parent') }} --</option>
			@foreach($data['parent_pages'] as $parent)
				<option value="{{ $parent['id'] }}">{{ $parent['title'] }}</option>
			@endforeach
		</select>

		<!-- Template -->
		<label class="form__label" for="template">{{ static_text('form.template.title') }}</label>
		<select class="form__input" name="template">
			<option value="index">-- {{ static_text('form.template.no_template') }} --</option>
		</select>
		
		{{ Hook::run('page_form_sidebar') }}

		<!-- Submit -->
		<input type="submit" class="button background-green full-width" value="{{ static_text('form.submit') }}">
	</div>

</form>