(function($) {
    "use strict";

    $(document).on('ready', function() {	
		
		// Menu Click JS
		$('.menu-click,.close-menu a').on('click', function(){
			$('.menu-inner').toggleClass('active');
		});

			$(".close-menu a").focusout(function () {
				$(".eduna-lms-nav ul:first-child > li:first-child > a").focus();
				$(".menu-click").addClass("active");
			});
		
			$(".eduna-lms-nav ul:first-child > li:first-child > a").on("keydown", function (e) {
				if (e.shiftKey && e.key === "Tab") {
					e.preventDefault();
					$(".close-menu a").focus(); // Moves focus to the close button
				}
			});

			$(".close-menu a").on("keydown", function (e) {
				if (e.shiftKey && e.key === "Tab") {
					e.preventDefault();
					$(".eduna-lms-nav ul:first-child > li:last-child a").focus(); // Moves focus to the last menu item
				}
			});
			
	});	

	jQuery(window).on('load', function() {
	    // init Masonry
		var $grid = $('.eduna-lms-masonry').masonry({
			// options
			itemSelector: '.eduna-lms-masonry-item',
		});
		// layout Masonry after each image loads
		$grid.imagesLoaded().progress( function() {
			$grid.masonry('layout');
		});
	});

	jQuery(document).ready(function($) {
		$("#primary-menu,.eduna-lms-header__nav");
		$("#primary-menu,.eduna-lms-header__nav").KeyboardAccessibleDropDown();
	  });
	  
	  $.fn.KeyboardAccessibleDropDown = function() {
		var nav = $(this);
		$("a", nav).focus(function() {
		  $(this).parents("li").addClass("active-focus")
		}).blur(function() {
		  $(this).parents("li").removeClass("active-focus")
		});
	  };

})(jQuery);

document.addEventListener('DOMContentLoaded', function () {
	// Target the specific dropdown and the form
	const categoryDropdown = document.querySelector('.ed_select.ed_select_cats');
	const searchForm = document.querySelector('.ed-topbar__search form');
	const hiddenCategoryInput = document.querySelector('#selected-category');
  
	if (categoryDropdown && hiddenCategoryInput && searchForm) {
		// Update the hidden input when the dropdown value changes
		categoryDropdown.addEventListener('change', function () {
			hiddenCategoryInput.value = categoryDropdown.value;
		});
  
		// Ensure the hidden input has the correct value on form submit
		searchForm.addEventListener('submit', function () {
			hiddenCategoryInput.value = categoryDropdown.value;
		});
	}
  });
  