/*!
 * Script for initializing globally-used functions and libs.
 *
 * @since 1.0.0
 */
 (function($) {

 	var gather = {

 		// Cache selectors
	 	cache: {
			$document: $(document),
			$window: $(window),
			$postswrap: false,
			masonry : false
		},

		// Init functions
		init: function() {

			this.bindEvents();
			this.socialMenu();

		},

		// Bind Elements
		bindEvents: function() {

			var self = this;

			self.navigationInit();

			if ( $('.toggle-search').length > 0 ) {
				this.toggleSearch();
			}

			this.cache.$document.on( 'ready', function() {

				self.fitVidsInit();

				if ( $('body').hasClass('masonry') ) {
					self.cache.masonry = true;
					self.masonryInit();
				}

				$('.site-title').fitText(.8, { minFontSize: '18px', maxFontSize: '64px' });

			} );

			// Handle Navigation on Resize
			this.cache.$window.on( 'resize', self.debounce(
				function() {

					// Remove any inline styles that may have been added to menu
					$('.main-navigation .menu').attr('style','');
					$('.main-navigation').find('.children, .sub-menu').each( function(){
		    			$(this).attr('style','');
					});

					$('.main-navigation').find('.dropdown-toggle').each( function(){
						$(this).removeClass('toggled');
					});

				}, 200 )
			);

			// Handle Masonry on Resize
			this.cache.$window.on( 'resize', self.debounce(
				function() {

					if ( self.cache.masonry ) {
						self.masonryInit();
					}

				}, 200 )
			);

		},

		/**
		 * Initialize the mobile menu functionality.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		navigationInit: function() {

			// Add dropdown toggle to display child menu items
			$('.main-navigation .menu > .menu-item-has-children').append( '<span class="dropdown-toggle" />');

			// When mobile menu is tapped/clicked
			$('.menu-toggle').fastClick( function() {
				var menu = $(this).data('toggle');
				$(menu).slideToggle();
			});

			// When mobile submenu is tapped/clicked
			$('.dropdown-toggle').fastClick( function() {
				var $submenu = $(this).parent().find('.children,.sub-menu'),
					$toggle = $(this);
				if ( ! $(this).hasClass('toggled') ) {
					$submenu.slideDown( '400', function() {
						$toggle.addClass('toggled');
					});
				} else {
					$submenu.slideUp( '400', function(){
						$toggle.removeClass('toggled');
					});
				}
			});

		},

		/**
		 * Initialize the social menu functionality
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		socialMenu: function() {
			$social = $('.main-navigation .menu > li > a[href*="behance.com"],.main-navigation .menu > li > a[href*="dribbble.com"],.main-navigation .menu > li > a[href*="facebook.com"],.main-navigation .menu > li > a[href*="flickr.com"],.main-navigation .menu > li > a[href*="github.com"],.main-navigation .menu > li > a[href*="linkedin.com"],.main-navigation .menu > li > a[href*="pinterest.com"],.main-navigation .menu > li > a[href*="plus.google.com"],.main-navigation .menu > li > a[href*="instagr.am"],.main-navigation .menu > li > a[href*="instagram.com"],.main-navigation .menu > li > a[href*="skype.com"],.main-navigation .menu > li > a[href*="spotify.com"],.main-navigation .menu > li > a[href*="tumblr.com"],.main-navigation .menu > li > a[href*="twitter.com"],.main-navigation .menu > li > a[href*="vimeo.com"]').parent('li').addClass('social');
			$social.find('a').contents().wrap('<span class="social-text">');
		},

		// Initialize FitVids
		fitVidsInit: function() {

			// Make sure lib is loaded.
			if (!$.fn.fitVids) {
				return;
			}

			// Run FitVids
			$('.hentry').fitVids();
		},

		/**
		 * Initialize the search toggle in the main navigation.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		toggleSearch: function() {
			$('.main-navigation .menu-search a').on( 'click', function(e) {
				e.preventDefault();
				var toggle = $(this).data('toggle');
				$(this).toggleClass( 'active' );
				$(toggle).slideToggle( '200' );
			});
		},

		// Initialize Masonry
		masonryInit: function() {

			var width = document.body.clientWidth;

			// If body width is less than 510px we'll display as a single column
			if ( width <= 510 ) {
				return;
			}

			var gutter = 30;

			// If body width is between 510px and 880px, we'll have a smaller gutter
			if ( document.body.clientWidth <= 880 ) {
				gutter = 20;
			}

			if ( ! this.cache.$postswrap ) {
				this.cache.$postswrap = $('#posts-wrap');
				this.cache.$postswrap.find('.module').css({ 'margin-right' : 0 });
			}

			// Initialize
			this.cache.$postswrap.masonry({
				itemSelector: '.module',
				gutter : gutter,
			});

			// For Infinite Scroll
			var infinite_count = 0;

			$( document.body ).on( 'post-load', function () {

				infinite_count = infinite_count + 1;
				var $selector = $('#infinite-view-' + infinite_count);
				var $elements = $selector.find('.module');
				$('#posts-wrap').masonry( 'appended', $elements );
				$elements.imagesLoaded( function() {
					$('#posts-wrap').masonry();
				});

			});

		},

		/**
		 * Debounce function.
		 *
		 * @since  1.0.0
		 * @link http://remysharp.com/2010/07/21/throttling-function-calls
		 *
		 * @return void
		 */
		debounce: function(fn, delay) {
			var timer = null;
			return function () {
				var context = this, args = arguments;
				clearTimeout(timer);
				timer = setTimeout(function () {
					fn.apply(context, args);
				}, delay);
			};
		}

 	};

 	gather.init();

 })(jQuery);
