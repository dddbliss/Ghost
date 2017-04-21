tinymce.init({
	selector:'#tinySmall',
	height:100,
	plugins:'image,link,lists,textcolor',
	menubar:false,
	content_css: '/assets/themes/i17_ghost/css/tinymce.css',
	toolbar: 'undo redo | removeformat forecolor | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | link image',
});

tinymce.init({
	selector:'#tinyMedium',
	height:200,
	plugins:'image,link,lists,textcolor',
	menubar:false,
	content_css: '/assets/themes/i17_ghost/css/tinymce.css',
	toolbar: 'undo redo | removeformat forecolor | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | link image',
});

tinymce.init({
	selector:'#tinyLarge',
	height:400,
	plugins:'image,link,lists,textcolor',
	menubar:false,
	content_css: '/assets/themes/i17_ghost/css/tinymce.css',
	toolbar: 'undo redo | removeformat forecolor | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | link image',
});