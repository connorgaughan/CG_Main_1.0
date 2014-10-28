
	jQuery(document).ready(function($) {
		$('.menu-click').on('click', function(e){
			e.preventDefault();
			$(this).toggleClass('active');
			$('.menuContainer').toggleClass('active');
		});
	});
	jQuery(window).scroll(function(e){
		var scrolled = $(window).scrollTop() + 200;
    	$('.project-bg').css('top', -(scrolled * 1.5) + 'px');
    });