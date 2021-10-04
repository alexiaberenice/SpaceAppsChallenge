/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

 ( function( $ ) {



	// Color preview

	wp.customize( 'logo_color', function( value ) {
		value.bind( function( to ) {
			$( '.header a.logo, .logo:hover' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'sidebar_background_color', function( value ) {
		value.bind( function( to ) {
			$( '.has-sidebar #secondary' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'sidebar_title_color', function( value ) {
		value.bind( function( to ) {
			$( '.has-sidebar #secondary h2, .has-sidebar #secondary h1, .has-sidebar #secondary h3, .has-sidebar #secondary h4, .has-sidebar #secondary h5, .has-sidebar #secondary h6, .has-sidebar #secondary th' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'sidebar_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.has-sidebar #secondary p, .has-sidebar #secondary .widget, .has-sidebar #secondary li, .has-sidebar #secondary ol, .has-sidebar #secondary ul,.has-sidebar #secondary dd, .has-sidebar #secondary span, .has-sidebar #secondary div' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'sidebar_button_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '.has-sidebar #secondary button.search-submit' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'sidebar_link_color', function( value ) {
		value.bind( function( to ) {
			$( '.has-sidebar #secondary a' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'sidebar_border_color', function( value ) {
		value.bind( function( to ) {
			$( '.has-sidebar #secondary *, .has-sidebar #secondary .widget h2' ).css( {
				'border-color':to
			});
		} );
	} );
	wp.customize( 'blogposts_background', function( value ) {
		value.bind( function( to ) {
			$( '.blog .wrapmain article, .archive .wrapmain article, .search-results .wrapmain article' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'blogposts_headline', function( value ) {
		value.bind( function( to ) {
			$( '.blog .wrapmain article h2, .archive .wrapmain article h2, .search-results .wrapmain article h2,.blog .wrapmain article h2 a, .archive .wrapmain article h2 a, .search-results .wrapmain article h2 a' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'blogposts_meta', function( value ) {
		value.bind( function( to ) {
			$( '.postinfo, .postinfo *' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'blogposts_text', function( value ) {
		value.bind( function( to ) {
			$( '.blog .wrapmain article .entry-content p, .archive .wrapmain article .entry-content p, .search-results .wrapmain article .entry-content p' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'blogposts_button_bg', function( value ) {
		value.bind( function( to ) {
			$( 'a.button.button-readmore' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'blogposts_button_text', function( value ) {
		value.bind( function( to ) {
			$( 'a.button.button-readmore' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'postpages_background', function( value ) {
		value.bind( function( to ) {
			$( '.error404 .content-area, .search-no-results .content-area,.single .wrapmain article, .page .wrapmain article, #commentform' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'postpages_headline', function( value ) {
		value.bind( function( to ) {
			$( '#commentform label, h3#reply-title, h2.comments-title, .page .wrapmain article h1, .page .wrapmain article h2, .page .wrapmain article h3, .page .wrapmain article h4, .page .wrapmain article h5, .page .wrapmain article h6, .page .wrapmain article th,.single .wrapmain article h1, .single .wrapmain article h2, .single .wrapmain article h3, .single .wrapmain article h4, .single .wrapmain article h5, .single .wrapmain article h6, .single .wrapmain article th' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'postpages_text', function( value ) {
		value.bind( function( to ) {
			$( '.error404 .content-area p, .search-no-results .content-area p, .single .wrapmain article, .single .wrapmain article p, .single .wrapmain article dd, .single .wrapmain article li, .single .wrapmain article ul, .single .wrapmain article ol, .single .wrapmain article address, .single .wrapmain article table, .single .wrapmain article th, .single .wrapmain article td, .single .wrapmain article blockquote, .single .wrapmain article span, .single .wrapmain article div .page .wrapmain article, .page .wrapmain article p, .page .wrapmain article dd, .page .wrapmain article li, .page .wrapmain article ul, .page .wrapmain article ol, .page .wrapmain article address, .page .wrapmain article table, .page .wrapmain article th, .page .wrapmain article td, .page .wrapmain article blockquote, .page .wrapmain article span, .page .wrapmain article div' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'postpages_link', function( value ) {
		value.bind( function( to ) {
			$( '.single .wrapmain article a, .page .wrapmain article a' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'postpages_buttons_bg', function( value ) {
		value.bind( function( to ) {
			$( '.wrapmain .search-submit, .page .wrapmain article a.button, .single .wrapmain article a.button, .nav-links span.button, form#commentform input#submit' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'postpages_buttons_text', function( value ) {
		value.bind( function( to ) {
			$( '.wrapmain .search-submit, .nav-links span.button, form#commentform input#submit' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'footer_background', function( value ) {
		value.bind( function( to ) {
			$( 'footer' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'footer_headline', function( value ) {
		value.bind( function( to ) {
			$( '.footer-column-three h3' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'postpages_borders', function( value ) {
		value.bind( function( to ) {
			$( '.page .wrapmain article td,.single .wrapmain article td,.page .wrapmain article th, .single .wrapmain article th,.single .wrapmain article *, .page .wrapmain article *' ).css( {
				'border-color':to
			});
		} );
	} );
	wp.customize( 'footer_link', function( value ) {
		value.bind( function( to ) {
			$( '.footer-column-wrapper .widget a' ).css( {
				'border-color':to
			});
		} );
	} );
	wp.customize( 'footer_border', function( value ) {
		value.bind( function( to ) {
			$( '.footer-column-wrapper .widget *' ).css( {
				'border-color':to
			});
		} );
	} );
	wp.customize( 'footer_button_bg', function( value ) {
		value.bind( function( to ) {
			$( '.footer-column-wrapper .widget .search-submit' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'footer_button_text', function( value ) {
		value.bind( function( to ) {
			$( '.footer-column-wrapper .widget .search-submit' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'footer_text', function( value ) {
		value.bind( function( to ) {
			$( '.site-info, .site-info *,.footer-column-wrapper .widget, .footer-column-wrapper .widget li, .footer-column-wrapper .widget p, .footer-column-wrapper abbr, .footer-column-wrapper cite, .footer-column-wrapper table caption, .footer-column-wrapper td, .footer-column-wrapper th' ).css( {
				'color':to
			});
		} );
	} );
	


	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
} )( jQuery );
