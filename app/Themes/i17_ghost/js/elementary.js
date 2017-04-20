$(document).ready(function() {
	
	// TABS
	if($('ul.tabs[data-url-tabs]').length) {
		if(location.hash) {
			var hash = location.hash;
			var subhash = hash.replace('#', '');
			$('li.tabs__title a[href="'+hash+'"]').parent().addClass('tabs__title--active');
			$('li.tabs__title a[href="'+hash+'"]').parent().siblings().removeClass('tabs__title--active');
			$('.tabs__content .tabs__panel#'+subhash).addClass('tabs__panel--active');
			$('.tabs__content .tabs__panel#'+subhash).siblings().removeClass('tabs__panel--active');
			$('body').scrollTop(0);
		}
	}
	$('.tabs__link').click(function(e) {
		e.preventDefault();
		$(this).parent().addClass('tabs__title--active');
		$(this).parent().siblings().removeClass('tabs__title--active');
		var tab = $(this).attr('href');
		console.log(tab);
		$(this).parent().parent().siblings('.tabs__content').children('.tabs__panel').not(tab).css('display', 'none').removeClass('tabs__panel--active');
		$(tab).fadeIn().addClass('tabs__panel--active');
		if($('ul.tabs[data-url-tabs]').length) {
			if(history.pushState) {
				history.pushState(null, null, tab);
			} else {
				location.hash = tab;
			}
		}
	});

	// SESSION ALERTS / DATA-CLOSE
	$(document.body).on('click', '[data-close]', function() {
	 	$(this).parent().parent().fadeOut();
	});

	// ACCORDION
	$(document.body).on('click', '.accordion__title', function(e) {
		e.preventDefault();
		$(this).parent().toggleClass('accordion__item--active');
	});

	// MODAL
	$('[data-modal]').on('click', function() {
		var modal = $(this).attr('data-modal');
		$('body').append('<div class="modal__overlay"></div>');
		$('#'+modal).fadeIn();
	});
	$('.modal__close').on('click', function() {
		$(this).parent().parent().hide();
		$('.modal__overlay').fadeOut();
	});

	// MOBILE SIDEBAR
	$('a[data-offcanvas-toggle]').on('click', function(e) {
		e.preventDefault();
		var sidebarId = $(this).data('offcanvas-toggle');
		$('body').append('<div class="site__overlay"></div>');
		if($('#'+sidebarId).hasClass('offcanvas__side--left')) {
			$('#'+sidebarId).show('slide', {direction: 'left'}, 500);
		} else {
			$('#'+sidebarId).show('slide', {direction: 'right'}, 500);
		}
	});
	$('body').on('click', '.site__overlay', function() {
		$('.offcanvas__side').hide();
		$('.site__overlay').fadeOut().remove();
	});

});