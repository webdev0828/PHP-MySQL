(function( $ ) {
	"use strict";

	/*** Setup Widget ***/

	$.fn.theWP_SetupWidget = function( cp ) {
		var setupAdd = function( $container, widgetClass, dynamic ){
			// Add Group Item
			$container.find('.the-wp-widget-field-group-add').each( function() {
				var $addGroup   = $(this),
					$itemList   = $addGroup.siblings('.the-wp-widget-field-group-items'),
					groupID     = $addGroup.parent('.the-wp-widget-field-group').data('id'),
					newItemHtml = window.the_wp_widget_helper[widgetClass][groupID];

				$addGroup.on( "click", function() {
					var iterator = parseInt( $(this).data('iterator') );
					iterator++;
					$(this).data('iterator', iterator);
					var newItem = newItemHtml.trim().replace(/975318642/g, iterator);

					var $newItem = $(newItem);
					setupToggle( $newItem );
					setupRemove( $newItem );
					$newItem.find('.the-wp-of-icon').theWP_WidgetIconPicker();
					//init( $newItem, widgetClass, true ); //@todo
					$itemList.append($newItem);
					// color picker
					$('.my-color-picker').wpColorPicker();			
				});
			});
		};

		var setupToggle = function( $container ) {
			// Make groups collapsible
			$container.find('.the-wp-widget-field-group-item-top').on( "click", function() {
				$(this).siblings('.the-wp-widget-field-group-item-form').toggle();
			});
		};

		var setupRemove = function( $container ) {
			// Make group items removable
			$container.find('.the-wp-widget-field-remove').on( "click", function() {
				$(this).closest('.the-wp-widget-field-group-item').remove();
			});
		};

		return this.each( function(i, el) {
			var $self       = $(el),
				widgetClass = $self.data('class');

			// Skip this if we've already set up the form, or if template widget
			if ( $('body').hasClass('widgets-php') ) {
				if ( $self.data('the-wp-form-setup') === true ) return true;
				//if ( $self.closest('.widget').attr('id').indexOf("__i__") > -1 ) return true;
				//if ( $self.closest('#widgets-left').length > 0 ) return true;
				if ( !$self.is(':visible') ) return true;
			}

			$self.find('.the-wp-of-icon').theWP_WidgetIconPicker();

			setupAdd( $self, widgetClass, false );
			setupToggle( $self );
			setupRemove( $self );
			
			// color picker
			$('.my-color-picker').wpColorPicker();
			
			// All done.
			$self.trigger('theWP_widgetformsetup').data('the-wp-form-setup', true);
		});

	};

	// Initialize existing forms
	$('.the-wp-widget-form').theWP_SetupWidget(true);
	

	// When we click on a widget top
	$('.widgets-holder-wrap').on('click', '.widget:has(.the-wp-widget-form) .widget-top', function(){
		var $$ = $(this).closest('.widget').find('.the-wp-widget-form');
		setTimeout( function(){ $$.theWP_SetupWidget(); }, 200);
	});

	/*** Icon Picker ***/

	$.fn.theWP_WidgetIconPicker = function() {
		return this.each(function() {

			var $self       = $(this),
				$picker_box = $self.siblings('.the-wp-of-icon-picker-box'),
				$button     = $self.siblings('.the-wp-of-icon-picked'),
				$preview    = $button.children('i'),
				$icons      = $picker_box.find('i');

			$button.on( "click", function() {
				$picker_box.toggle();
			});

			$icons.on( "click", function() {
				var iconvalue = $(this).data('value');
				$icons.removeClass('selected');
				var selected = ( ! $(this).hasClass('cmb-icon-none') ) ? 'selected' : '';
				$(this).addClass(selected);
				$preview.removeClass().addClass('fa ' + selected + ' ' + iconvalue );
				$self.val(iconvalue);
				$picker_box.toggle();
			});

		});
	};
	$(document).on('click', function(event) {
		// If this is not inside .the-wp-of-icon-picker-box or .the-wp-of-icon-picked
		if (!$(event.target).closest('.the-wp-of-icon-picker-box').length
			&&
			!$(event.target).closest('.the-wp-of-icon-picked').length ) {
			$('.the-wp-of-icon-picker-box').hide();
		}
	});
	jQuery(document).ready(function($) {
		$( "div.widget-title h3" ).each(function() {
			if ($( this ).text().indexOf('The WP')>1) $(this).addClass('the-wp-widgets');
		});
	});
}(jQuery));