<form method="POST" action="{{ route('admin.content.pets.create') }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	<!-- Name -->
	<label class="form__label" for="name">{{ static_text('forms.name.title') }}</label>
	<input class="form__input" type="text" name="name">

	<!-- Description -->
	<label class="form__label" for="description">{{ static_text('forms.description.title') }}</label>
	<textarea class="form__input form__input--textarea" name="description" rows="5" id="tinySmall"></textarea>

	{{ Hook::run('create_pet_form') }}

	<!-- Submit -->
	<input type="submit" class="button background-green full-width" value="{{ static_text('forms.submit') }}">
</form>