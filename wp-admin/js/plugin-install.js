/* global plugininstallL10n, tb_click, confirm */

/* Plugin Browser Thickbox related JS*/
var tb_position;
jQuery( document ).ready( function( $ ) {
	tb_position = function() {
		var tbWindow = $( '#TB_window' ),
			width = $( window ).width(),
			H = $( window ).height() - ( ( 792 < width ) ? 60 : 20 ),
			W = ( 792 < width ) ? 772 : width - 20;

		if ( tbWindow.size() ) {
			tbWindow.width( W ).height( H );
			$( '#TB_iframeContent' ).width( W ).height( H );
			tbWindow.css({
				'margin-left': '-' + parseInt( ( W / 2 ), 10 ) + 'px'
			});
			if ( typeof document.body.style.maxWidth !== 'undefined' ) {
				tbWindow.css({
					'top': '30px',
					'margin-top': '0'
				});
			}
		}

		return $( 'a.thickbox' ).each( function() {
			var href = $( this ).attr( 'href' );
			if ( ! href ) {
				return;
			}
			href = href.replace( /&width=[0-9]+/g, '' );
			href = href.replace( /&height=[0-9]+/g, '' );
			$(this).attr( 'href', href + '&width=' + W + '&height=' + ( H ) );
		});
	};

	$( window ).resize( function() {
		tb_position();
	});

	$( '.plugin-card, .plugins .column-description' ).on( 'click', 'a.thickbox', function() {
		tb_click.call(this);

		$('#TB_title').css({'background-color':'#222','color':'#cfcfcf'});
		$('#TB_ajaxWindowTitle').html( '<strong>' + plugininstallL10n.plugin_information + '</strong>&nbsp;' + $(this).data( 'title' ) );
		$('#TB_iframeContent').attr( 'title', plugininstallL10n.plugin_information + ' ' + $(this).data( 'title' ) );
		$('#TB_closeWindowButton').focus();

		return false;
	});

	/* Plugin install related JS */
	$( '#plugin-information-tabs a' ).click( function( event ) {
		var tab = $( this ).attr( 'name' );
		event.preventDefault();

		// Flip the tab
		$( '#plugin-information-tabs a.current' ).removeClass( 'current' );
		$( this ).addClass( 'current' );

		// Only show the fyi box in the description section, on smaller screen, where it's otherwise always displayed at the top.
		if ( 'description' !== tab && $( window ).width() < 772 ) {
			$( '#plugin-information-content' ).find( '.fyi' ).hide();
		} else {
			$( '#plugin-information-content' ).find( '.fyi' ).show();
		}

		// Flip the content.
		$( '#section-holder div.section' ).hide(); // Hide 'em all.
		$( '#section-' + tab ).show();
	});

	$( 'a.install-now' ).click( function() {
		return confirm( plugininstallL10n.ays );
	});
});
', function( event ) {
			if ( 27 !== event.which ) {
				return;
			}
			tb_remove();
		});
	}

	/*
	 * Get the tabbable elements and detach/attach the keydown event.
	 * Called after the iframe has fully loaded so we have all the elements we need.
	 * Called again each time a Tab gets clicked.
	 * @todo Consider to implement a WordPress general utility for this and don't use jQuery UI.
	 */
	function handleTabbables() {
		var $firstAndLast;
		// Get all the tabbable elements.
		$tabbables = $( ':tabbable', $iframeBody );
		// Our first tabbable element is always the "Close" button.
		$firstTabbable = tbWindow.find( '#TB_closeWindowButton' );
		// Get the last tabbable element.
		$lastTabbable = $tabbables.last();
		// Make a jQuery collection.
		$firstAndLast = $firstTabbable.add( $lastTabbable );
		// Detach any previously attached keydown event.
		$firstAndLast.off( 'keydown.wp-plugin-details' );
		// Attach again the keydown event on the first and last focusable elements.
		$firstAndLast.on( 'keydown.wp-plugin-details', function( event ) {
			constrainTabbing( event );
		});
	}

	// Constrain tabbing within the plugin modal dialog.
	function constrainTabbing( event ) {
		if ( 9 !== event.which ) {
			return;
		}

		if ( $lastTabbable[0] === event.target && ! event.shiftKey ) {
			event.preventDefault();
			$firstTabbable.focus();
		} else if ( $firstTabbable[0] === event.target && event.shiftKey ) {
			event.preventDefault();
			$lastTabbable.focus();
		}
	}

	// Open the Plugin details modal.
	$( '.thickbox.open-plugin-details-modal' ).on( 'click', function( e ) {
		// The `data-title` attribute is used only in the Plugin screens.
		var title = $( this ).data( 'title' ) ? plugininstallL10n.plugin_information + ' ' + $( this ).data( 'title' ) : plugininstallL10n.plugin_modal_label;

		e.preventDefault();
		e.stopPropagation();

		// Store the element that has focus before opening the modal dialog, i.e. the control which opens it.
		$focusedBefore = $( this );

		tb_click.call(this);

		// Set ARIA role and ARIA label.
		tbWindow.attr({
			'role': 'dialog',
			'aria-label': plugininstallL10n.plugin_modal_label
		});

		// Set title attribute on the iframe.
		tbWindow.find( '#TB_iframeContent' ).attr( 'title', title );
	});

	/* Plugin install related JS */
	$( '#plugin-information-tabs a' ).click( function( event ) {
		var tab = $( this ).attr( 'name' );
		event.preventDefault();

		// Flip the tab
		$( '#plugin-information-tabs a.current' ).removeClass( 'current' );
		$( this ).addClass( 'current' );

		// Only show the fyi box in the description section, on smaller screen, where it's otherwise always displayed at the top.
		if ( 'description' !== tab && $( window ).width() < 772 ) {
			$( '#plugin-information-content' ).find( '.fyi' ).hide();
		} else {
			$( '#plugin-information-content' ).find( '.fyi' ).show();
		}

		// Flip the content.
		$( '#section-holder div.section' ).hide(); // Hide 'em all.
		$( '#section-' + tab ).show();
	});
});
