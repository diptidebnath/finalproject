jQuery(document).ready(function ($) {

	// Menu icon

	$('#mobile_menu_icon').click(function () {
		$(this).toggleClass('fa-bars fa-times');
		$('#navbarCollapse').slideToggle();
	});


	$('.sub-menu-toggle').on("click", function () {
		$(this).toggleClass('fa-plus fa-minus');
		$(this).next().slideToggle();
	});

});



