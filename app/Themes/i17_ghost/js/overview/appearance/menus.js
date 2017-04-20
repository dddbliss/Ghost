$(document).ready(function() {

	// Sortable list
	$('#itemList').sortable();

	// Add item to list
	$('#addItem').on('click', function() {
		var items = [];
		var html = '';
		$('.menu-item:checked').each(function() {
			var id = $(this).attr('value');
			html += '<li class="gst-menu-list__item accordion__item">';
			html += '<div class="accordion__title">';
			html += $('input[name="item-title-' + id + '"]').val();
			html += '</div>';
			html += '<div class="accordion__content">';
			html += '<label class="form__label" for="items">Title</label>';
			html += '<input class="form__input" type="text" name="items[title][]" value="' + $('input[name="item-title-' + id + '"]').val() + '">';
			html += '<input type="hidden" name="items[type][]" value="page">';
			html += '<input type="hidden" name="items[id][]" value="' + id + '">';
			html += '<div class="text-right">';
			html += '<button class="button button--small background-red deleteItem">Delete</button>';
			html += '</div>';
			html += '</div>';
			html += '</li>';
			$(this).prop('checked', false);
		});
		$('.menuState:visible').find($('.gst-menu-list')).append(html);
	});

	// Delete a menu item
	$('body').on('click', '.deleteItem', function(e) {
		e.preventDefault();
		$(this).parent().parent().parent().remove();
	});

	// Create menu
	$('#createMenu').on('click', function() {
		$('#edit').hide();
		$('.gst-menu-list').html('');
		$('#create').show();
	});

	// Edit menu
	$('#editMenu').on('click', function() {
		var menu_id = $('#editMenuId').val();
		if(menu_id != 'NULL') {
			$.ajax({
				type: 'GET',
				url: '/admin/appearance/menus/' + menu_id,
				success: function(data) {
					$('#create').hide();
					$('#edit').show();
					$('.menuState:visible').find('form').attr('action', '/admin/appearance/menus/edit/' + data.id);
					$('.menuState:visible').find('input[name="name"]').val(data.name);
					$('.menuState:visible').find('input[name="location"]').val(data.location);
					$('.menuState:visible').find($('.gst-menu-list')).html('');
					var html = '';
					$.each(data.items, function(key, val) {
						html += '<li class="gst-menu-list__item accordion__item">';
						html += '<div class="accordion__title">';
						html += val.title;
						html += '</div>';
						html += '<div class="accordion__content">';
						html += '<label class="form__label" for="items">Title</label>';
						html += '<input class="form__input" type="text" name="items[title][]" value="' + val.title + '">';
						html += '<input type="hidden" name="items[type][]" value="' + val.type + '">';
						html += '<input type="hidden" name="items[id][]" value="' + val.type_id + '">';
						html += '<div class="text-right">';
						html += '<button class="button button--small background-red deleteItem">Delete</button>';
						html += '</div>';
						html += '</div>';
						html += '</li>';
					});
					$('.menuState:visible').find($('.gst-menu-list')).append(html);
				},
			});
		}
	});

});