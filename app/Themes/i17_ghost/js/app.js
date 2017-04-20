$(document).ready(function() {

	// Sidebar
	$('.sidebar__nav__link__after').click(function(e) {
		e.preventDefault();
		if($(this).parent().hasClass('sidebar__nav__item--active')) {
			$(this).html('<em class="fa fa-angle-up"></em>');
			$(this).parent().siblings('.sidebar__dropdown').slideUp();
			$(this).parent().removeClass('sidebar__nav__item--active');
		} else {
			$(this).html('<em class="fa fa-angle-down"></em>');
			$(this).parent().siblings('.sidebar__dropdown').slideDown();
			$(this).parent().addClass('sidebar__nav__item--active');
		}
	});
	var pathnamearr = window.location.pathname.split('/');
	var section = '/' + pathnamearr[1] + '/' + pathnamearr[2];
	$.each($('.sidebar__nav__link'), function(key, value) {
		if($(this).attr('href') == section) {
			$(this).parent().addClass('sidebar__nav__item--active');
		}
	});

});