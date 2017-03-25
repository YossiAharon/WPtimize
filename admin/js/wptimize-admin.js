(function( $ ) {
	'use strict';


	 $(function() {
	 	// tabs
		var $tabBoxes = $('.wptimize-metaboxes'),
		       $tabLinks = $('.nav-tab'),
		       $tabLinkActive,
		       $currentTab,
		       $currentTabLink,
		       $tabContent,
		       $hash;


		// Tabs on load
	 	if(window.location.hash){
	 		$hash = window.location.hash;
	 		$tabBoxes.addClass('hide');
			$currentTab = $($hash).toggleClass('hide');
			$tabLinks.removeClass('nav-tab-active');
			$('.nav-tab[href='+$hash+']').addClass('nav-tab-active');
	 	}
	 	//Tabs on click
	 	$('.nav-tab-wrapper').on('click', 'a', function(e){
			e.preventDefault();
			$tabContent = $(this).attr('href');
			$tabLinks.removeClass('nav-tab-active');
			$tabBoxes.addClass('hide');
			$currentTab = $($tabContent).toggleClass('hide');
			$(this).addClass('nav-tab-active');
			 if(history.pushState) {
				history.pushState(null, null, $tabContent);
			}
			else {
				location.hash = $tabContent;
			}
		})

	 	// Fields showing after parent is checked
		$(".show-child-if-checked").on('change', function() {
		    if(this.checked) {
			$(this).parent().next('fieldset').removeClass('hide');
		    }else{
			$(this).parent().next('fieldset').addClass('hide');
		    }
		});

	 });


})( jQuery );
