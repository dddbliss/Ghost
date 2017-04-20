<!-- Menu Select -->
<div class="content__box" id="menuSelect">
	<div class="lg-6 md-6 sm-6 column column__first">
		<label class="form__label form--inline">Select a Menu:</label>
		&nbsp;&nbsp;&nbsp;
		<select id="editMenuId" class="form__input form--inline" style="margin:0; min-width:30%">
			<option value="NULL">-- Select a Menu --</option>
			@foreach($data['menus'] as $menu)
				<option value="{{ $menu->id }}">
					{{ $menu->name }}
					@if($menu->location == 'none')
						(No Location)
					@else
						({{ ucfirst($menu->location) }})
					@endif
				</option>
			@endforeach
		</select>
		&nbsp;&nbsp;&nbsp;
		<button class="button background-blue" id="editMenu">Select</button>
	</div>
	<div class="lg-6 md-6 sm-6 column column__last text-right">
		<button class="button background-transparent-dark" id="createMenu"><em class="fa fa-plus"></em> Create New Menu</button>
	</div>
	<div class="clearfix"></div>
</div>

<!-- Menu Create/Edit -->
<div class="lg-3 md-4 sm-4 column column__first">
	<div class="content__box">
		<ul class="gst-pages-list">
			<strong>Pages</strong>
			@foreach($data['pages'] as $page)
				<li><input type="checkbox" value="{{ $page->id }}" class="menu-item">{{ $page->title }}</li>
				<input type="hidden" name="item-title-{{ $page->id }}" value="{{ $page->title }}">
			@endforeach
			<div class="text-right">
				<button class="button background-blue button--small" id="addItem">Add To Menu</button>
			</div>
		</ul>
	</div>
</div>

<div class="lg-9 md-8 sm-8 column column__last">
	<div class="content__box">
		<div id="menuEdit">

			<!-- Create Menu -->
			<div class="menuState" id="create" style="display:none">
				<form method="POST" action="{{ route('admin.overview.appearance.menus.create') }}">
					{{ csrf_field() }}
					<!-- Name -->
					<label class="form__label" for="name">{{ static_text('forms.name.title') }}</label>
					<input class="form__input" name="name" type="text" value="{{ static_text('forms.name.value') }}" required>
					<!-- Items -->
					<label class="form__label" for="name">{{ static_text('forms.items.title') }}</label>
					<ul class="accordion gst-menu-list" id="itemList"></ul>
					<!-- Location -->
					<br><label class="form__label" for="location">{{ static_text('forms.location.title') }}</label>
					<input name="location" type="radio" value="none" checked> {{ static_text('forms.location.no_location') }}
					@foreach($data['menus_locations'] as $location)
						<br><input name="location" type="radio" value="{{ $location['slug'] }}"> {{ $location['name'] }}
					@endforeach
					<!-- Submit -->
					<div class="text-right">
						<input type="submit" class="button background-green" value="{{ static_text('forms.submit.create') }}">
					</div>
				</form>
			</div>

			<!-- Edit Menu -->
			<div class="menuState" id="edit" style="display:none">
				<form method="POST">
					{{ csrf_field() }}
					<!-- Name -->
					<label class="form__label" for="name">{{ static_text('forms.name.title') }}</label>
					<input class="form__input" name="name" type="text" value="{{ static_text('forms.name.value') }}">
					<!-- Items -->
					<label class="form__label" for="items">{{ static_text('forms.items.title') }}</label>
					<ul class="accordion gst-menu-list" id="itemList"></ul>
					<!-- Location -->
					<br><label class="form__label" for="location">{{ static_text('forms.location.title') }}</label>
					<input name="location" type="radio" value="none" checked> {{ static_text('forms.location.no_location') }}
					@foreach($data['menus_locations'] as $location)
						<br><input name="location" type="radio" value="{{ $location['slug'] }}"> {{ $location['name'] }}
					@endforeach
					<br>
					<br>
					<!-- Submit -->
					<div class="float-left">
						<button class="button background-red">Delete</button>
					</div>
					<div class="float-right">
						<input type="submit" class="button background-green" value="{{ static_text('forms.submit.edit') }}">
					</div>
					<div class="clearfix"></div>
				</form>
			</div>

		</div>
	</div>
</div>