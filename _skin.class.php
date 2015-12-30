<?php
/**
 * This file implements a class derived of the generic Skin class in order to provide custom code for
 * the skin in this folder.
 *
 * This file is part of the b2evolution project - {@link http://b2evolution.net/}
 *
 * @package skins
 * @subpackage starter_skin
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

/**
 * Specific code for this skin.
 *
 * ATTENTION: if you make a new skin you have to change the class name below accordingly
 */
class business_Skin extends Skin
{
	var $version = '1.0';
	/**
	 * Do we want to use style.min.css instead of style.css ?
	 */
	var $use_min_css = 'check';  // true|false|'check' Set this to true for better optimization
	// Note: we leave this on "check" in the bootstrap_blog_skin so it's easier for beginners to just delete the .min.css file
	// But for best performance, you should set it to true.

	/**
	 * Get default name for the skin.
	 * Note: the admin can customize it.
	 */
	function get_default_name()
	{
		return 'Business Skin';
	}


	/**
	 * Get default type for the skin.
	 */
	function get_default_type()
	{
		return 'normal';
	}


	/**
	 * What evoSkins API does has this skin been designed with?
	 *
	 * This determines where we get the fallback templates from (skins_fallback_v*)
	 * (allows to use new markup in new b2evolution versions)
	 */
	function get_api_version()
	{
		return 6;
	}


	/**
	 * Get definitions for editable params
	 *
	 * @see Plugin::GetDefaultSettings()
	 * @param local params like 'for_editing' => true
	 */
	function get_param_definitions( $params )
	{

      // Load to use function get_available_thumb_sizes()
		load_funcs( 'files/model/_image.funcs.php' );

		$r = array_merge( array(
				'section_general_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('General Settings')
				),
					'layout' => array(
						'label'     => T_('Layout'),
						'note'      => '',
						'type'      => 'select',
						'options'   => array(
							'single_column'              => T_('Single Column Large'),
							'single_column_normal'       => T_('Single Column'),
							'single_column_narrow'       => T_('Single Column Narrow'),
							'single_column_extra_narrow' => T_('Single Column Extra Narrow'),
							'left_sidebar'               => T_('Left Sidebar'),
							'right_sidebar'              => T_('Right Sidebar'),
						),
						'defaultvalue' => 'right_sidebar',
					),
					'max_image_height' => array(
						'label'        => T_( 'Max image height' ),
						'note'         => 'px',
						'defaultvalue' => '',
						'type'         => 'integer',
						'allow_empty'  => true,
					),
               'color_schemes' => array(
                  'label'        => T_(' Color Schemes '),
                  'note'         => T_(' Default color schemes is #1dc6df. Change everything color theme with one set color'),
                  'defaultvalue' => '#1dc6df',
                  'type'         => 'color',
               ),
				'section_general_end' => array(
					'layout' => 'end_fieldset',
				),

            /**
             * ============================================================================
             * Section Header Options
             * ============================================================================
             */
            'section_header_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('Header Settings')
				),
               'ht_show' => array(
                  'label'        => T_('Display Header Top'),
                  'note'         => T_('Check to display header top'),
                  'defaultvalue' => 1,
                  'type'         => 'checkbox',
               ),
               'ht_contact_info' => array(
                  'label'        => T_('Header Top Contact Info'),
                  'defaultvalue' => 'Contact Us on 0800 123 4567 or info@b2evolution.net',
                  'note'         => T_('Add your contact Info'),
                  'type'         => 'text',
                  'size'         => '60'
               ),
               'header_top_color' => array(
                  'label'         => T_('Header Top Color'),
                  'note'          => T_('Default color is #777777.'),
                  'defaultvalue'  => '#777777',
                  'type'          => 'color',
               ),
               'header_top_bg' => array(
                  'label'         => T_('Header Top Background'),
                  'note'          => T_('Default color is #FFFFFF.'),
                  'defaultvalue'  => '#FFFFFF',
                  'type'          => 'color',
               ),
               'menu_link_color' => array(
                  'label'         => T_('Menu Link Color'),
                  'note'          => T_('Default color is #333333.'),
                  'defaultvalue'  => '#333333',
                  'type'          => 'color',
               ),
               'main_header_bg' => array(
                  'label'         => T_('Main Header Background'),
                  'note'          => T_('Default color is #FFFFFF.'),
                  'defaultvalue'  => '#FFFFFF',
                  'type'          => 'color',
               ),
				'section_header_end' => array(
					'layout' => 'end_fieldset',
				),
            // End Section Header Options

            /**
             * ============================================================================
             * Options Disp Posts
             * ============================================================================
             */
            'section_disp_post_start' => array(
               'layout' => 'begin_fieldset',
               'label'  => T_('Disp Posts Settings')
            ),
               'layout_posts' => array(
                  'label'    => T_('Layout Posts'),
                  // 'note'     => T_('Select Layout for Posts'),
                  // 'type'     => 'select',
                  // 'options'  => array(
                  //    'regular'      => T_('Regular Layout'),
                  //    'mini_blog'    => T_('Mini Blog Layout'),
                  // ),
                  'note'     => '',
                  'type'     => 'radio',
                  'options'  => array(
							array( 'regular', T_('Regular') ),
							array( 'mini_blog', T_('Mini Blog Layout') ),
						),
                  'defaultvalue' => 'regular',
               ),
               'regular_post_bg' => array(
                  'label'         => T_('Background Regular Layout'),
                  'note'          => T_('Default background color is #F7F7F7. Example another background color #F9F9F9'),
                  'defaultvalue'  => '#F7F7F7',
                  'type'          => 'color',
               ),
               'mini_blog_bg' => array(
                  'label'         => T_('Background Mini Blog'),
                  'note'          => T_('Default background color is #FFFFFF.'),
                  'defaultvalue'  => '#FFFFFF',
                  'type'          => 'color',
               ),
               'pagination_top_show' => array(
                  'label'        => T_('Show Pagination Top'),
                  'note'         => T_('Check to display Pagination top'),
                  'defaultvalue' => 0,
                  'type'         => 'checkbox',
               ),
               'pagination_bottom_show' => array(
                  'label'        => T_('Show Pagination Bottom'),
                  'note'         => T_('Check to display Pagination Bottom'),
                  'defaultvalue' => 1,
                  'type'         => 'checkbox',
               ),
               'pagination_align' => array(
                  'label'        => T_('Show Align Pagination'),
                  'note'         => T_('Select Align Pagination'),
                  'defaultvalue' => 'center',
                  'type'         => 'select',
                  'options' => array(
                     'left'     => T_('Left'),
                     'center'   => T_('Center'),
                     'right'    => T_('Right'),
                  ),
               ),
            'section_disp_post_end' => array(
               'layout' => 'end_fieldset',
            ),
            // End Options Disp Posts

            /**
             * ============================================================================
             * Sidebar Widget Options
             * ============================================================================
             */
            'section_sidebar_start' => array(
               'layout' => 'begin_fieldset',
               'label'  => T_('Sidebar Widget')
            ),
               'sidebar_title_widget' => array(
                  'label'         => T_('Title Widget Color'),
                  'note'          => T_('Default color is #000000.'),
                  'defaultvalue'  => '#000000',
                  'type'          => 'color',
               ),
               'sidebar_color_link' => array(
                  'label'         => T_('Widget Link Color'),
                  'note'          => T_('Default color is #333333.'),
                  'defaultvalue'  => '#333333',
                  'type'          => 'color',
               ),
               'sidebar_color_content' => array(
                  'label'         => T_('Widget Content Color'),
                  'note'          => T_('Default color is #333333.'),
                  'defaultvalue'  => '#333333',
                  'type'          => 'color',
               ),
               'sidebar_border_widget' => array(
                  'label'         => T_('Border Color Widget'),
                  'note'          => T_('Default color is #E4E4E4.'),
                  'defaultvalue'  => '#E4E4E4',
                  'type'          => 'color',
               ),
            'section_sidebar_end' => array(
               'layout' => 'end_fieldset',
            ),
            // End Section Sidebar Widget Options

            /**
             * ============================================================================
             * Photo Index Options
             * ============================================================================
             */
            'section_mediaidx_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('Media Post Settings')
				),
               'mediaidx_thumb_size' => array(
   					'label'        => T_('Thumbnail size for media index'),
   					'note'         => '',
   					'defaultvalue' => 'fit-1280x720',
   					'options'      => get_available_thumb_sizes(),
   					'type'         => 'select',
   				),
               'mediaidx_grid' => array(
						'label'          => T_('Column'),
						'note'           => '',
						'defaultvalue'   => 'two_column',
                  'type'           => 'select',
						'options'        => array(
                        'one_column'     => T_('1 Column'),
								'two_column'     => T_('2 Column'),
								'three_column'   => T_('3 Column'),
							),
					),
               'mediaidx_layout' => array(
						'label'     => T_( 'Layout Mediaidx' ),
						'note'      => '',
						'type'      => 'select',
						'options'   => array(
							'no_sidebar'      => T_( 'No Sidebar' ),
							'left_sidebar'    => T_( 'Left Sidebar' ),
							'right_sidebar'   => T_( 'Right Sidebar' ),
						),
						'defaultvalue' => 'no_sidebar',
					),
               'mediaidx_style' => array(
						'label'          => T_('Mediaidx Style'),
						'note'           => T_('If you use box style you should change Mediaidx Background Color. Example ( #F7F7F7 )'),
						'defaultvalue'   => 'default',
                  'type'           => 'select',
						'options'        => array(
                     'default' => T_('Default'),
							'box'     => T_('Box Style'),
						),
					),
               'padding_column' => array(
                  'label'          => T_('Padding Image Column'),
                  'note'           => T_('px ( default padding 15px )'),
                  'defaultvalue'   => '15',
                  'type'           => 'integer',
                  'allow_empty'    => true,
               ),
               'mediaidx_title' => array(
						'label'          => T_('Display Title'),
						'note'           => T_('Check to display title post image'),
						'defaultvalue'   => 1,
						'type'           => 'checkbox',
					),
               'mediaidx_bg' => array(
                   'label'         => T_('Background Mediaidx'),
                   'note'          => T_('Default color is #FFFFFF. Suggest Background Color (#F7F7F7)'),
                   'defaultvalue'  => '#FFFFFF',
                   'type'          => 'color',
               ),
               'mediaidx_bg_content' => array(
                   'label'         => T_('Background Mediaidx Content'),
                   'note'          => T_('Default color is #FFFFFF. Activated when you use box style'),
                   'defaultvalue'  => '#FFFFFF',
                   'type'          => 'color',
               ),
               'mediaidx_title_color' => array(
                   'label'         => T_('Mediaidx Title Color'),
                   'note'          => T_('Default color is #222222. Activated when you use box style and checklis display title'),
                   'defaultvalue'  => '#222222',
                   'type'          => 'color',
               ),
				'section_mediaidx_end' => array(
					'layout' => 'end_fieldset',
				),
            // End Photo Index Disp

            /**
             * ============================================================================
             * Search Disp
             * ============================================================================
             */
            'section_search_start' => array(
               'layout' => 'begin_fieldset',
               'label'  => T_('Search Disp Settings')
            ),
               'search_title' => array(
                  'label'        => T_('Search Box Title'),
                  'defaultvalue' => 'Search Result',
                  'note'         => T_('Change the title Search Box.'),
                  'type'         => 'text',
                  'size'         => '30'
               ),
               'search_button_text' => array(
                  'label'        => T_('Button Text'),
                  'defaultvalue' => 'Search',
                  'note'         => T_('Change the button text search.'),
                  'type'         => 'text',
                  'size'         => '20'
               ),
               'search_field' => array(
                  'label'        => T_('Show Search Field'),
                  'note'         => T_('Check to show search field'),
                  'defaultvalue' => 1,
                  'type'         => 'checkbox',
               ),
               'search_bg' => array(
                  'label'         => T_('Background Body'),
                  'note'          => T_('Default color is #F7F7F7.'),
                  'defaultvalue'  => '#F7F7F7',
                  'type'          => 'color',
               ),
            'section_search_end' => array(
               'layout' => 'end_fieldset',
            ),
            // End Search Disp

            /**
             * ============================================================================
             * Footer Options
             * ============================================================================
             */
            'section_footer_start' => array(
               'layout' => 'begin_fieldset',
               'label'  => T_('Footer')
            ),
               'footer_border_widget' => array(
                  'label'         => T_('Border Color Widget'),
                  'note'          => T_('Default color is #333333.'),
                  'defaultvalue'  => '#333333',
                  'type'          => 'color',
               ),
               'footer_bg' => array(
                  'label'         => T_('Background Footer'),
                  'note'          => T_('Default color is #222222.'),
                  'defaultvalue'  => '#222222',
                  'type'          => 'color',
               ),
            'section_footer_end' => array(
               'layout' => 'end_fieldset',
            ),
            // End Section Footer Top

            /**
             * ============================================================================
             * Color Box
             * ============================================================================
             */
				'section_colorbox_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('Colorbox Image Zoom')
				),
					'colorbox' => array(
						'label'        => T_('Colorbox Image Zoom'),
						'note'         => T_('Check to enable javascript zooming on images (using the colorbox script)'),
						'defaultvalue' => 1,
						'type'         => 'checkbox',
					),
					'colorbox_vote_post' => array(
						'label'        => T_('Voting on Post Images'),
						'note'         => T_('Check this to enable AJAX voting buttons in the colorbox zoom view'),
						'defaultvalue' => 1,
						'type'         => 'checkbox',
					),
					'colorbox_vote_post_numbers' => array(
						'label'        => T_('Display Votes'),
						'note'         => T_('Check to display number of likes and dislikes'),
						'defaultvalue' => 1,
						'type'         => 'checkbox',
					),
					'colorbox_vote_comment' => array(
						'label'        => T_('Voting on Comment Images'),
						'note'         => T_('Check this to enable AJAX voting buttons in the colorbox zoom view'),
						'defaultvalue' => 1,
						'type'         => 'checkbox',
					),
					'colorbox_vote_comment_numbers' => array(
						'label'        => T_('Display Votes'),
						'note'         => T_('Check to display number of likes and dislikes'),
						'defaultvalue' => 1,
						'type'         => 'checkbox',
					),
					'colorbox_vote_user' => array(
						'label'        => T_('Voting on User Images'),
						'note'         => T_('Check this to enable AJAX voting buttons in the colorbox zoom view'),
						'defaultvalue' => 1,
						'type'         => 'checkbox',
					),
					'colorbox_vote_user_numbers' => array(
						'label'        => T_('Display Votes'),
						'note'         => T_('Check to display number of likes and dislikes'),
						'defaultvalue' => 1,
						'type'         => 'checkbox',
					),
				'section_colorbox_end' => array(
					'layout' => 'end_fieldset',
				),
            // End Color Box

            /**
             * ============================================================================
             * Username Option
             * ============================================================================
             */
				'section_username_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('Username options')
				),
					'gender_colored' => array(
						'label'        => T_('Display gender'),
						'note'         => T_('Use colored usernames to differentiate men & women.'),
						'defaultvalue' => 0,
						'type'         => 'checkbox',
					),
					'bubbletip' => array(
						'label'        => T_('Username bubble tips'),
						'note'         => T_('Check to enable bubble tips on usernames'),
						'defaultvalue' => 0,
						'type'         => 'checkbox',
					),
					'autocomplete_usernames' => array(
						'label'        => T_('Autocomplete usernames'),
						'note'         => T_('Check to enable auto-completion of usernames entered after a "@" sign in the comment forms'),
						'defaultvalue' => 1,
						'type'         => 'checkbox',
					),
				'section_username_end' => array(
					'layout' => 'end_fieldset',
				),
            // End Username Options


				'section_access_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('When access is denied or requires login...')
				),
					'access_login_containers' => array(
						'label'   => T_('Display on login screen'),
						'note'    => '',
						'type'    => 'checklist',
						'options' => array(
							array( 'header',   sprintf( T_('"%s" container'), NT_('Header') ),    1 ),
							array( 'page_top', sprintf( T_('"%s" container'), NT_('Page Top') ),  1 ),
							array( 'menu',     sprintf( T_('"%s" container'), NT_('Menu') ),      0 ),
							array( 'sidebar',  sprintf( T_('"%s" container'), NT_('Sidebar') ),   0 ),
							array( 'sidebar2', sprintf( T_('"%s" container'), NT_('Sidebar 2') ), 0 ),
							array( 'footer',   sprintf( T_('"%s" container'), NT_('Footer') ),    1 ) ),
						),
				'section_access_end' => array(
					'layout' => 'end_fieldset',
				),

			), parent::get_param_definitions( $params ) );

		return $r;
	}


	/**
	 * Get ready for displaying the skin.
	 *
	 * This may register some CSS or JS...
	 */
	function display_init()
	{
		global $Messages, $debug, $disp;

		// Request some common features that the parent function (Skin::display_init()) knows how to provide:
		parent::display_init( array(
			'jquery',                  // Load jQuery
			'font_awesome',            // Load Font Awesome (and use its icons as a priority over the Bootstrap glyphicons)
			'bootstrap',               // Load Bootstrap (without 'bootstrap_theme_css')
			'bootstrap_evo_css',       // Load the b2evo_base styles for Bootstrap (instead of the old b2evo_base styles)
			'bootstrap_messages',      // Initialize $Messages Class to use Bootstrap styles
			'style_css',               // Load the style.css file of the current skin
			'colorbox',                // Load Colorbox (a lightweight Lightbox alternative + customizations for b2evo)
			'bootstrap_init_tooltips', // Inline JS to init Bootstrap tooltips (E.g. on comment form for allowed file extensions)
			'disp_auto',               // Automatically include additional CSS and/or JS required by certain disps (replace with 'disp_off' to disable this)
		) );

      //Include script and styles for Sticky Menu
		require_js( $this->get_url().'assets/js/jquery.sticky.js' );

      // Include Masonry Grind for MediaIdx
      if ( $disp == 'mediaidx' ) {
         require_js( $this->get_url() . 'assets/js/masonry.pkgd.min.js' );
         require_js( $this->get_url() . 'assets/js/imagesloaded.pkgd.min.js' );
         add_js_headline("
				jQuery( document ).ready( function($) {
               $('.evo_image_index').imagesLoaded().done( function( instance ) {
                  $('.evo_image_index').masonry({
                   // options
                    itemSelector: '.grid-item',
                 });
               });

				});
			");
      }

      require_js( $this->get_url() . 'assets/js/scripts.js' );

		// Skin specific initializations:
      // Add Custome CSS
      $custom_css = '';

      /**
       * ============================================================================
       * General Settings
       * ============================================================================
       */
      if ( $color = $this->get_setting( 'color_schemes' ) ) {
         // Disp Posts
         $custom_css .= '
         a,
         #main-header .primary-nav .nav a:hover, #main-header .primary-nav .nav a:active, #main-header .primary-nav .nav a:focus,
         #main-header .primary-nav .nav > li.active a,
         #main-content .evo_post_title h1 a:hover, #mini-blog .evo_post_title h1 a:hover, #main-content .evo_post_title h2 a:hover, #mini-blog .evo_post_title h2 a:hover, #main-content .evo_post_title h3 a:hover, #mini-blog .evo_post_title h3 a:hover, #main-content .evo_post_title h1 a:active, #mini-blog .evo_post_title h1 a:active, #main-content .evo_post_title h2 a:active, #mini-blog .evo_post_title h2 a:active, #main-content .evo_post_title h3 a:active, #mini-blog .evo_post_title h3 a:active, #main-content .evo_post_title h1 a:focus, #mini-blog .evo_post_title h1 a:focus, #main-content .evo_post_title h2 a:focus, #mini-blog .evo_post_title h2 a:focus, #main-content .evo_post_title h3 a:focus, #mini-blog .evo_post_title h3 a:focus,
         #main-content .evo_post .small.text-muted a:hover, #mini-blog .evo_post .small.text-muted a:hover, #main-content .evo_post .small.text-muted a .glyphicon:hover, #mini-blog .evo_post .small.text-muted a .glyphicon:hover,
         .pagination li a,

         .disp_single #main-content .pager .previous a:hover, .disp_page #main-content .pager .previous a:hover, .disp_single #main-content .pager .next a:hover, .disp_page #main-content .pager .next a:hover, .disp_single #main-content .pager .previous a:active, .disp_page #main-content .pager .previous a:active, .disp_single #main-content .pager .next a:active, .disp_page #main-content .pager .next a:active, .disp_single #main-content .pager .previous a:focus, .disp_page #main-content .pager .previous a:focus, .disp_single #main-content .pager .next a:focus, .disp_page #main-content .pager .next a:focus,
         .disp_single #main-content .evo_post .single_tags a:hover, .disp_page #main-content .evo_post .single_tags a:hover, .disp_single #main-content .evo_post .single_tags a:active, .disp_page #main-content .evo_post .single_tags a:active, .disp_single #main-content .evo_post .single_tags a:focus, .disp_page #main-content .evo_post .single_tags a:focus,
         .disp_single #main-content .evo_post #feedbacks .evo_comment .panel-heading .evo_comment_title a, .disp_page #main-content .evo_post #feedbacks .evo_comment .panel-heading .evo_comment_title a,

         #main-sidebar .evo_widget a:hover, #main-sidebar .evo_widget a:active, #main-sidebar .evo_widget a:focus,
         #main-sidebar .widget_plugin_evo_Calr .bCalendarTable td a,

         #main-footer .widget_footer .evo_widget a:hover, #main-footer .widget_footer .evo_widget a:active, #main-footer .widget_footer .evo_widget a:focus,
         #main-footer .widget_footer .widget_plugin_evo_Calr .bCalendarTable tbody a
         { color: '.$color.'; }

         #main-header .primary-nav .nav a::after,
         .disp_posts .evo_intro_post,
         .disp_posts #main-content .posts_date,
         .disp_posts #main-content .timeline,
         #main-content .evo_post .evo_image_block a::before, #mini-blog .evo_post .evo_image_block a::before, #main-content .evo_post .evo_post_gallery__image a::before, #mini-blog .evo_post .evo_post_gallery__image a::before,
         #main-content .evo_post .evo_post__full_text .evo_post_more_link a:hover, #mini-blog .evo_post .evo_post__full_text .evo_post_more_link a:hover, #main-content .evo_post .evo_post__excerpt_text .evo_post_more_link a:hover, #mini-blog .evo_post .evo_post__excerpt_text .evo_post_more_link a:hover,
         .pagination .active span, .pagination .active span:hover,
         .pagination li a:hover, .pagination li span:hover, .pagination li a:focus, .pagination li span:focus,
         #main-content .evo_post .evo_post__excerpt_text .evo_post__excerpt_more_link a:hover, #mini-blog .evo_post .evo_post__excerpt_text .evo_post__excerpt_more_link a:hover, #main-content .evo_post .evo_post__excerpt_text .evo_post__excerpt_more_link a:active, #mini-blog .evo_post .evo_post__excerpt_text .evo_post__excerpt_more_link a:active, #main-content .evo_post .evo_post__excerpt_text .evo_post__excerpt_more_link a:focus, #mini-blog .evo_post .evo_post__excerpt_text .evo_post__excerpt_more_link a:focus,

         .disp_single #main-content .evo_post .evo_image_block a::before, .disp_page #main-content .evo_post .evo_image_block a::before, .disp_single #main-content .evo_post .evo_post_gallery__image a::before, .disp_page #main-content .evo_post .evo_post_gallery__image a::before,
         .disp_single #main-content .evo_post #feedbacks .evo_comment__meta_info a:hover, .disp_page #main-content .evo_post #feedbacks .evo_comment__meta_info a:hover, .disp_single #main-content .evo_post #feedbacks .evo_comment__meta_info a:focus, .disp_page #main-content .evo_post #feedbacks .evo_comment__meta_info a:focus, .disp_single #main-content .evo_post #feedbacks .evo_comment__meta_info a:active, .disp_page #main-content .evo_post #feedbacks .evo_comment__meta_info a:active,
         .disp_single #main-content .evo_post .evo_form .submit, .disp_page #main-content .evo_post .evo_form .submit,
         .disp_single #main-content .evo_post .evo_form .submit:hover, .disp_page #main-content .evo_post .evo_form .submit:hover, .disp_single #main-content .evo_post .evo_form .submit:focus, .disp_page #main-content .evo_post .evo_form .submit:focus, .disp_single #main-content .evo_post .evo_form .submit:active, .disp_page #main-content .evo_post .evo_form .submit:active,
         .disp_single #main-content .evo_post #feedbacks .evo_comment .evo_comment_footer .permalink_right, .disp_page #main-content .evo_post #feedbacks .evo_comment .evo_comment_footer .permalink_right,

         #main-sidebar .widget_core_coll_search_form .compact_search_form .search_submit,
         #main-sidebar .widget_core_coll_media_index .widget_flow_blocks > div a::before,
         #main-sidebar .widget_core_coll_tag_cloud .tag_cloud a:hover, #main-sidebar .widget_core_coll_tag_cloud .tag_cloud a:active, #main-sidebar .widget_core_coll_tag_cloud .tag_cloud a:focus,
         #main-sidebar .widget_plugin_evo_Calr .bCalendarTable #bCalendarToday,

         #main-footer .widget_footer .widget_core_coll_tag_cloud .tag_cloud a:hover, #main-footer .widget_footer .widget_core_coll_tag_cloud .tag_cloud a:active, #main-footer .widget_footer .widget_core_coll_tag_cloud .tag_cloud a:focus,
         #main-footer .widget_footer .widget_plugin_evo_Calr .bCalendarTable #bCalendarToday,
         .widget_core_coll_search_form .compact_search_form .search_submit
         { background-color: '.$color.'; }

         .pagination .active span, .pagination .active span:hover,
         .pagination li a:hover, .pagination li span:hover, .pagination li a:focus, .pagination li span:focus,
         .posts_mini_layout #mini-blog .pagination li a, .posts_mini_layout #mini-blog .pagination li span,
         #main-content .evo_post .evo_post__excerpt_text .evo_post__excerpt_more_link a:hover, #mini-blog .evo_post .evo_post__excerpt_text .evo_post__excerpt_more_link a:hover, #main-content .evo_post .evo_post__excerpt_text .evo_post__excerpt_more_link a:active, #mini-blog .evo_post .evo_post__excerpt_text .evo_post__excerpt_more_link a:active, #main-content .evo_post .evo_post__excerpt_text .evo_post__excerpt_more_link a:focus, #mini-blog .evo_post .evo_post__excerpt_text .evo_post__excerpt_more_link a:focus,

         .disp_single #main-content .evo_post #feedbacks .evo_comment__meta_info a:hover, .disp_page #main-content .evo_post #feedbacks .evo_comment__meta_info a:hover, .disp_single #main-content .evo_post #feedbacks .evo_comment__meta_info a:focus, .disp_page #main-content .evo_post #feedbacks .evo_comment__meta_info a:focus, .disp_single #main-content .evo_post #feedbacks .evo_comment__meta_info a:active, .disp_page #main-content .evo_post #feedbacks .evo_comment__meta_info a:active,
         .disp_single #main-content .evo_post .evo_form .submit, .disp_page #main-content .evo_post .evo_form .submit,
         .disp_single #main-content .evo_post .evo_form .submit:hover, .disp_page #main-content .evo_post .evo_form .submit:hover, .disp_single #main-content .evo_post .evo_form .submit:focus, .disp_page #main-content .evo_post .evo_form .submit:focus, .disp_single #main-content .evo_post .evo_form .submit:active, .disp_page #main-content .evo_post .evo_form .submit:active

         #main-sidebar .widget_core_coll_search_form .compact_search_form .search_submit,
         #main-sidebar .widget_core_coll_search_form .compact_search_form .search_field,
         #main-sidebar .widget_core_coll_tag_cloud .tag_cloud a:hover, #main-sidebar .widget_core_coll_tag_cloud .tag_cloud a:active, #main-sidebar .widget_core_coll_tag_cloud .tag_cloud a:focus,

         #main-footer .widget_footer .widget_plugin_evo_Calr .bCalendarTable #bCalendarToday,
         .widget_core_coll_search_form .compact_search_form .search_submit
         { border-color: '.$color.'; }

         .disp_single #main-content .evo_post > header .cat-links a, .disp_page #main-content .evo_post > header .cat-links a,
         .disp_single #main-content .evo_post .single_tags a, .disp_page #main-content .evo_post .single_tags a
         { border-bottom-color: '.$color.'; }
         ';
      }

      /**
       * ============================================================================
       * Header Custom Style
       * ============================================================================
       */
      if ( $color = $this->get_setting( 'header_top_color' ) ) {
         $custom_css .= '#header-top .header-contact-info, #header-top .widget_core_user_links .ufld_icon_links a { color: '.$color.';}';
      }
      if ( $bg_color = $this->get_setting( 'header_top_bg' ) ) {
         $custom_css .= '#header-top{ background-color: '.$bg_color.'; }';
      }
      if ( $color = $this->get_setting( 'menu_link_color' ) ) {
         $custom_css .= '#main-header .primary-nav .nav a { color: '.$color.';}';
      }
      if ( $bg_color = $this->get_setting( 'main_header_bg' ) ) {
         $custom_css .= '#main-header{ background-color: '.$bg_color.'; }';
      }

      /**
       * ============================================================================
       * Posts Custome Style
       * ============================================================================
       */
      if ( $bg_color = $this->get_setting( 'regular_post_bg' ) ) {
         $custom_css .= '
         .post_regular,
         .post_regular #main-sidebar .widget_plugin_evo_Calr .bCalendarTable caption a
         { background-color: '.$bg_color.'; }
         ';
      }
      if ( $bg_color = $this->get_setting( 'mini_blog_bg' ) ) {
         $custom_css .= '.posts_mini_layout{ background-color: '.$bg_color.'; }';
      }

      /**
       * ============================================================================
       * Sidebar Custom Style
       * ============================================================================
       */
      if ( $border = $this->get_setting( 'sidebar_border_widget' ) ) {
         $custom_css .= '
         .widget_core_coll_category_list ul > li, .widget_core_content_hierarchy ul > li, .widget_core_coll_common_links ul > li, .widget_core_coll_post_list ul > li, .widget_core_coll_page_list ul > li, .widget_core_coll_related_post_list ul > li, .widget_plugin_evo_Arch ul > li, .widget_core_linkblog ul > li, .widget_core_coll_item_list.evo_noexcerpt ul > li, .widget_core_coll_comment_list ul > li, .widget_core_coll_xml_feeds ul > li, .widget_core_colls_list_public ul > li, .widget_core_user_tools ul > li
         { border-color: '.$border.'; }
         ';
         $custom_css .= '
         #main-sidebar .panel-heading::after
         { background-color: '.$border.'; }
         ';
      }
      if ( $color = $this->get_setting( 'sidebar_title_widget' ) ) {
         $custom_css .= '
         #main-sidebar .panel-heading .panel-title
         { color: '.$color.'; }
         ';
      }
      if ( $color = $this->get_setting( 'sidebar_color_content' ) ) {
         $custom_css .= '
         #main-sidebar .evo_widget
         { color: '.$color.'; }
         ';
      }
      if ( $color = $this->get_setting( 'sidebar_color_link' ) ) {
         $custom_css .= '
         #main-sidebar .evo_widget a
         { color: '.$color.'; }
         ';
      }

      /**
       * ============================================================================
       * Mediaidx Custom Style
       * ============================================================================
       */
      if ( $padding = $this->get_setting( 'padding_column' ) ) {
         $custom_css .= '.disp_mediaidx #main-mediaidx .widget_core_coll_media_index .evo_image_index li{ padding: '.$padding.'px }';
         $custom_css .= '.disp_mediaidx #main-mediaidx .title_mediaidx { margin-left: '.$padding.'px; margin-right: '.$padding.'px; }';
      }
      if ( $color = $this->get_setting( 'mediaidx_bg' ) ) {
         $custom_css .= '.disp_mediaidx, .disp_mediaidx #main-mediaidx .widget_core_coll_media_index .evo_image_index .note {
            background-color: '.$color.'; }';
      }
      if ( $color = $this->get_setting( 'mediaidx_bg_content' ) ) {
         $custom_css .= '.disp_mediaidx #main-mediaidx .widget_core_coll_media_index .evo_image_index li figure.box,
         .disp_mediaidx #main-mediaidx .widget_core_coll_media_index .evo_image_index li figure.box .note {
            background-color: '.$color.';}';
      }
      if ( $color = $this->get_setting( 'mediaidx_title_color' ) ) {
         $custom_css .= '.disp_mediaidx #main-mediaidx .widget_core_coll_media_index .evo_image_index .note {
            color: '.$color.';}';
      }
      if ( $bg_color = $this->get_setting( 'mediaidx_title_color' ) ) {
         $custom_css .= '.disp_mediaidx #main-mediaidx .widget_core_coll_media_index .evo_image_index li figure.box.title a::after {
            background-color: '.$color.';}';
      }

      /**
       * ============================================================================
       * Disp Search Custome Style
       * ============================================================================
       */
      if ( $bg_color = $this->get_setting( 'search_bg' ) ) {
         $custom_css .= '.disp_search { background-color: '. $bg_color .'; }';
      }

      /**
       * ============================================================================
       * Footer Custome Style
       * ============================================================================
       */
      if ( $bg_color = $this->get_setting( 'footer_bg' ) ) {
         $custom_css .= '
         #main-footer, #main-footer .widget_footer .widget_plugin_evo_Calr .bCalendarTable caption a
         { background-color: '. $bg_color .'; }
         ';
      }
      if ( $border = $this->get_setting( 'footer_border_widget' ) ) {
         $custom_css .= '#main-footer .widget_footer .widget_core_coll_category_list ul > li, #main-footer .widget_footer .widget_core_content_hierarchy ul > li, #main-footer .widget_footer .widget_core_coll_common_links ul > li, #main-footer .widget_footer .widget_core_coll_post_list ul > li, #main-footer .widget_footer .widget_core_coll_page_list ul > li, #main-footer .widget_footer .widget_core_coll_related_post_list ul > li, #main-footer .widget_footer .widget_plugin_evo_Arch ul > li, #main-footer .widget_footer .widget_core_linkblog ul > li, #main-footer .widget_footer .widget_core_coll_item_list.evo_noexcerpt ul > li, #main-footer .widget_footer .widget_core_coll_comment_list ul > li, #main-footer .widget_footer .widget_core_coll_xml_feeds ul > li, #main-footer .widget_footer .widget_core_colls_list_public ul > li, #main-footer .widget_footer .widget_core_user_tools ul > li
         { border-color: '. $border .'; }';

         $custom_css .= '#main-footer .copyright { border-top-color: '.$border.' }/n';
      }


      // Custom CSS Output
      if ( ! empty( $custom_css ) ) {
         add_css_headline( $custom_css );
      }

		// Limit images by max height:
		$max_image_height = intval( $this->get_setting( 'max_image_height' ) );
		if( $max_image_height > 0 )
		{
			add_css_headline( '.evo_image_block img { max-height: '.$max_image_height.'px; width: auto; }' );
		}
	}


	/**
	 * Those templates are used for example by the messaging screens.
	 */
	function get_template( $name )
	{
		switch( $name )
		{
			case 'Results':
				// Results list (Used to view the lists of the users, messages, contacts and etc.):
				return array(
					'page_url'                => '', // All generated links will refer to the current page
					'before'                  => '<div class="results panel panel-default">',
					'content_start'           => '<div id="$prefix$ajax_content">',
					'header_start'            => '',
					'header_text'             => '<div class="center"><ul class="pagination">'
                        						   .'$prev$$first$$list_prev$$list$$list_next$$last$$next$'
                        						   .'</ul></div>',
					'header_text_single'      => '',
					'header_end'              => '',
					'head_title'              => '<div class="panel-heading fieldset_title"><span class="pull-right">$global_icons$</span><h3 class="panel-title">$title$</h3></div>'."\n",
					'global_icons_class'      => 'btn btn-default btn-sm',
					'filters_start'           => '<div class="filters panel-body">',
					'filters_end'             => '</div>',
					'filter_button_class'     => 'btn-sm btn-info',
					'filter_button_before'    => '<div class="form-group pull-right">',
					'filter_button_after'     => '</div>',
					'messages_start'          => '<div class="messages form-inline">',
					'messages_end'            => '</div>',
					'messages_separator'      => '<br />',
					'list_start'              => '<div class="table_scroll">'."\n"
					                           .'<table class="table table-striped table-bordered table-hover table-condensed" cellspacing="0">'."\n",
					'head_start'              => "<thead>\n",
					'line_start_head'         => '<tr>',  // TODO: fusionner avec colhead_start_first; mettre a jour admin_UI_general; utiliser colspan="$headspan$"
					'colhead_start'           => '<th $class_attrib$>',
					'colhead_start_first'     => '<th class="firstcol $class$">',
					'colhead_start_last'      => '<th class="lastcol $class$">',
					'colhead_end'             => "</th>\n",
					'sort_asc_off'            => get_icon( 'sort_asc_off' ),
					'sort_asc_on'             => get_icon( 'sort_asc_on' ),
					'sort_desc_off'           => get_icon( 'sort_desc_off' ),
					'sort_desc_on'            => get_icon( 'sort_desc_on' ),
					'basic_sort_off'          => '',
					'basic_sort_asc'          => get_icon( 'ascending' ),
					'basic_sort_desc'         => get_icon( 'descending' ),
					'head_end'                => "</thead>\n\n",
					'tfoot_start'             => "<tfoot>\n",
					'tfoot_end'               => "</tfoot>\n\n",
					'body_start'              => "<tbody>\n",
					'line_start'              => '<tr class="even">'."\n",
					'line_start_odd'          => '<tr class="odd">'."\n",
					'line_start_last'         => '<tr class="even lastline">'."\n",
					'line_start_odd_last'     => '<tr class="odd lastline">'."\n",
					'col_start'               => '<td $class_attrib$>',
					'col_start_first'         => '<td class="firstcol $class$">',
					'col_start_last'          => '<td class="lastcol $class$">',
					'col_end'                 => "</td>\n",
					'line_end'                => "</tr>\n\n",
					'grp_line_start'          => '<tr class="group">'."\n",
					'grp_line_start_odd'      => '<tr class="odd">'."\n",
					'grp_line_start_last'     => '<tr class="lastline">'."\n",
					'grp_line_start_odd_last' => '<tr class="odd lastline">'."\n",
					'grp_col_start'           => '<td $class_attrib$ $colspan_attrib$>',
					'grp_col_start_first'     => '<td class="firstcol $class$" $colspan_attrib$>',
					'grp_col_start_last'      => '<td class="lastcol $class$" $colspan_attrib$>',
					'grp_col_end'             => "</td>\n",
					'grp_line_end'            => "</tr>\n\n",
					'body_end'                => "</tbody>\n\n",
					'total_line_start'        => '<tr class="total">'."\n",
					'total_col_start'         => '<td $class_attrib$>',
					'total_col_start_first'   => '<td class="firstcol $class$">',
					'total_col_start_last'    => '<td class="lastcol $class$">',
					'total_col_end'           => "</td>\n",
					'total_line_end'          => "</tr>\n\n",
					'list_end'                => "</table></div>\n\n",
					'footer_start'            => '',
					'footer_text'             => '<div class="center"><ul class="pagination">'
                        							.'$prev$$first$$list_prev$$list$$list_next$$last$$next$'
                        						   .'</ul></div><div class="center">$page_size$</div>'
            					                  /* T_('Page $scroll_list$ out of $total_pages$   $prev$ | $next$<br />'. */
            					                  /* '<strong>$total_pages$ Pages</strong> : $prev$ $list$ $next$' */
            					                  /* .' <br />$first$  $list_prev$  $list$  $list_next$  $last$ :: $prev$ | $next$') */,
					'footer_text_single'       => '<div class="center">$page_size$</div>',
					'footer_text_no_limit'     => '', // Text if theres no LIMIT and therefor only one page anyway
					'page_current_template'    => '<span>$page_num$</span>',
					'page_item_before'         => '<li>',
					'page_item_after'          => '</li>',
					'page_item_current_before' => '<li class="active">',
					'page_item_current_after'  => '</li>',
					'prev_text'                => T_('Previous'),
					'next_text'                => T_('Next'),
					'no_prev_text'             => '',
					'no_next_text'             => '',
					'list_prev_text'           => T_('...'),
					'list_next_text'           => T_('...'),
					'list_span'                => 11,
					'scroll_list_range'        => 5,
					'footer_end'               => "\n\n",
					'no_results_start'         => '<div class="panel-footer">'."\n",
					'no_results_end'           => '$no_results$</div>'."\n\n",
					'content_end'              => '</div>',
					'after'                    => '</div>',
					'sort_type'                => 'basic'
				);
				break;

			case 'blockspan_form':
				// Form settings for filter area:
				return array(
					'layout'         => 'blockspan',
					'formclass'      => 'form-inline',
					'formstart'      => '',
					'formend'        => '',
					'title_fmt'      => '$title$'."\n",
					'no_title_fmt'   => '',
					'fieldset_begin' => '<fieldset $fieldset_attribs$>'."\n"
												.'<legend $title_attribs$>$fieldset_title$</legend>'."\n",
					'fieldset_end'   => '</fieldset>'."\n",
					'fieldstart'     => '<div class="form-group form-group-sm" $ID$>'."\n",
					'fieldend'       => "</div>\n\n",
					'labelclass'     => 'control-label',
					'labelstart'     => '',
					'labelend'       => "\n",
					'labelempty'     => '<label></label>',
					'inputstart'     => '',
					'inputend'       => "\n",
					'infostart'      => '<div class="form-control-static">',
					'infoend'        => "</div>\n",
					'buttonsstart'   => '<div class="form-group form-group-sm">',
					'buttonsend'     => "</div>\n\n",
					'customstart'    => '<div class="custom_content">',
					'customend'      => "</div>\n",
					'note_format'    => ' <span class="help-inline">%s</span>',
					// Additional params depending on field type:
					// - checkbox
					'fieldstart_checkbox'    => '<div class="form-group form-group-sm checkbox" $ID$>'."\n",
					'fieldend_checkbox'      => "</div>\n\n",
					'inputclass_checkbox'    => '',
					'inputstart_checkbox'    => '',
					'inputend_checkbox'      => "\n",
					'checkbox_newline_start' => '',
					'checkbox_newline_end'   => "\n",
					// - radio
					'inputclass_radio'       => '',
					'radio_label_format'     => '$radio_option_label$',
					'radio_newline_start'    => '',
					'radio_newline_end'      => "\n",
					'radio_oneline_start'    => '',
					'radio_oneline_end'      => "\n",
				);

			case 'compact_form':
			case 'Form':
				// Default Form settings (Used for any form on front-office):
				return array(
					'layout'         => 'fieldset',
					'formclass'      => 'form-horizontal',
					'formstart'      => '',
					'formend'        => '',
					'title_fmt'      => '<span style="float:right">$global_icons$</span><h2>$title$</h2>'."\n",
					'no_title_fmt'   => '<span style="float:right">$global_icons$</span>'."\n",
					'fieldset_begin' => '<div class="fieldset_wrapper $class$" id="fieldset_wrapper_$id$"><fieldset $fieldset_attribs$><div class="panel panel-default">'."\n"
										   .'<legend class="panel-heading" $title_attribs$>$fieldset_title$</legend><div class="panel-body $class$">'."\n",
					'fieldset_end'   => '</div></div></fieldset></div>'."\n",
					'fieldstart'     => '<div class="form-group" $ID$>'."\n",
					'fieldend'       => "</div>\n\n",
					'labelclass'     => 'control-label col-sm-3',
					'labelstart'     => '',
					'labelend'       => "\n",
					'labelempty'     => '<label class="control-label col-sm-3"></label>',
					'inputstart'     => '<div class="controls col-sm-9">',
					'inputend'       => "</div>\n",
					'infostart'      => '<div class="controls col-sm-9"><div class="form-control-static">',
					'infoend'        => "</div></div>\n",
					'buttonsstart'   => '<div class="form-group"><div class="control-buttons col-sm-offset-3 col-sm-9">',
					'buttonsend'     => "</div></div>\n\n",
					'customstart'    => '<div class="custom_content">',
					'customend'      => "</div>\n",
					'note_format'    => ' <span class="help-inline">%s</span>',
					// Additional params depending on field type:
					// - checkbox
					'inputclass_checkbox'    => '',
					'inputstart_checkbox'    => '<div class="controls col-sm-9"><div class="checkbox"><label>',
					'inputend_checkbox'      => "</label></div></div>\n",
					'checkbox_newline_start' => '<div class="checkbox">',
					'checkbox_newline_end'   => "</div>\n",
					// - radio
					'fieldstart_radio'       => '<div class="form-group radio-group" $ID$>'."\n",
					'fieldend_radio'         => "</div>\n\n",
					'inputclass_radio'       => '',
					'radio_label_format'     => '$radio_option_label$',
					'radio_newline_start'    => '<div class="radio"><label>',
					'radio_newline_end'      => "</label></div>\n",
					'radio_oneline_start'    => '<label class="radio-inline">',
					'radio_oneline_end'      => "</label>\n",
				);

			case 'fixed_form':
				// Form with fixed label width (Used for form on disp=user):
				return array(
					'layout'         => 'fieldset',
					'formclass'      => 'form-horizontal',
					'formstart'      => '',
					'formend'        => '',
					'title_fmt'      => '<span style="float:right">$global_icons$</span><h2>$title$</h2>'."\n",
					'no_title_fmt'   => '<span style="float:right">$global_icons$</span>'."\n",
					'fieldset_begin' => '<div class="fieldset_wrapper $class$" id="fieldset_wrapper_$id$"><fieldset $fieldset_attribs$><div class="panel panel-default">'."\n"
											   .'<legend class="panel-heading" $title_attribs$>$fieldset_title$</legend><div class="panel-body $class$">'."\n",
					'fieldset_end'   => '</div></div></fieldset></div>'."\n",
					'fieldstart'     => '<div class="form-group fixedform-group" $ID$>'."\n",
					'fieldend'       => "</div>\n\n",
					'labelclass'     => 'control-label fixedform-label',
					'labelstart'     => '',
					'labelend'       => "\n",
					'labelempty'     => '<label class="control-label fixedform-label"></label>',
					'inputstart'     => '<div class="controls fixedform-controls">',
					'inputend'       => "</div>\n",
					'infostart'      => '<div class="controls fixedform-controls"><div class="form-control-static">',
					'infoend'        => "</div></div>\n",
					'buttonsstart'   => '<div class="form-group"><div class="control-buttons fixedform-controls">',
					'buttonsend'     => "</div></div>\n\n",
					'customstart'    => '<div class="custom_content">',
					'customend'      => "</div>\n",
					'note_format'    => ' <span class="help-inline">%s</span>',
					// Additional params depending on field type:
					// - checkbox
					'inputclass_checkbox'    => '',
					'inputstart_checkbox'    => '<div class="controls fixedform-controls"><div class="checkbox"><label>',
					'inputend_checkbox'      => "</label></div></div>\n",
					'checkbox_newline_start' => '<div class="checkbox">',
					'checkbox_newline_end'   => "</div>\n",
					// - radio
					'fieldstart_radio'       => '<div class="form-group radio-group" $ID$>'."\n",
					'fieldend_radio'         => "</div>\n\n",
					'inputclass_radio'       => '',
					'radio_label_format'     => '$radio_option_label$',
					'radio_newline_start'    => '<div class="radio"><label>',
					'radio_newline_end'      => "</label></div>\n",
					'radio_oneline_start'    => '<label class="radio-inline">',
					'radio_oneline_end'      => "</label>\n",
				);

			case 'user_navigation':
				// The Prev/Next links of users (Used on disp=user to navigate between users):
				return array(
					'block_start'  => '<ul class="pager">',
					'prev_start'   => '<li class="previous">',
					'prev_end'     => '</li>',
					'prev_no_user' => '',
					'back_start'   => '<li>',
					'back_end'     => '</li>',
					'next_start'   => '<li class="next">',
					'next_end'     => '</li>',
					'next_no_user' => '',
					'block_end'    => '</ul>',
				);

			case 'button_classes':
				// Button classes (Used to initialize classes for action buttons like buttons to spam vote, or edit an intro post):
				return array(
					'button'       => 'btn btn-default btn-xs',
					'button_red'   => 'btn-danger',
					'button_green' => 'btn-success',
					'text'         => 'btn btn-default btn-xs',
					'group'        => 'btn-group',
				);

			case 'tooltip_plugin':
				// Plugin name for tooltips: 'bubbletip' or 'popover'
				// We should use 'popover' tooltip plugin for bootstrap skins
				// This tooltips appear on mouse over user logins or on plugin help icons
				return 'popover';
				break;

			case 'plugin_template':
				// Template for plugins:
				return array(
					// This template is used to build a plugin toolbar with action buttons above edit item/comment area:
					'toolbar_before'       => '<div class="btn-toolbar $toolbar_class$" role="toolbar">',
					'toolbar_after'        => '</div>',
					'toolbar_title_before' => '<div class="btn-toolbar-title">',
					'toolbar_title_after'  => '</div>',
					'toolbar_group_before' => '<div class="btn-group btn-group-xs" role="group">',
					'toolbar_group_after'  => '</div>',
					'toolbar_button_class' => 'btn btn-default',
				);

			case 'modal_window_js_func':
				// JavaScript function to initialize Modal windows, @see echo_user_ajaxwindow_js()
				return 'echo_modalwindow_js_bootstrap';
				break;

			default:
				// Delegate to parent class:
				return parent::get_template( $name );
		}
	}


	/**
	 * Check if we can display a widget container
	 *
	 * @param string Widget container key: 'header', 'page_top', 'menu', 'sidebar', 'sidebar2', 'footer'
	 * @param string Skin setting name
	 * @return boolean TRUE to display
	 */
	function is_visible_container( $container_key, $setting_name = 'access_login_containers' )
	{
		$access = $this->get_setting( $setting_name );

		return ( ! empty( $access ) && ! empty( $access[ $container_key ] ) );
	}


	/**
	 * Check if we can display a sidebar for the current layout
	 *
	 * @param boolean TRUE to check if at least one sidebar container is visible
	 * @return boolean TRUE to display a sidebar
	 */
	function is_visible_sidebar( $check_containers = false )
	{
		$layout = $this->get_setting( 'layout' );

		if( $layout != 'left_sidebar' && $layout != 'right_sidebar' )
		{ // Sidebar is not displayed for selected skin layout
			return false;
		}

		if( $check_containers )
		{ // Check if at least one sidebar container is visible
			return ( $this->is_visible_container( 'sidebar' ) ||  $this->is_visible_container( 'sidebar2' ) );
		}
		else
		{ // We should not check the visibility of the sidebar containers for this case
			return true;
		}
	}


	/**
	 * Get value for attbiute "class" of column block
	 * depending on skin setting "Layout"
	 *
	 * @return string
	 */
	function get_column_class() {

		switch( $this->get_setting( 'layout' ) ) {
			case 'single_column':
				// Single Column Large
				return 'col-md-12';

			case 'single_column_normal':
				// Single Column
				return 'col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1';

			case 'single_column_narrow':
				// Single Column Narrow
				return 'col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2';

			case 'single_column_extra_narrow':
				// Single Column Extra Narrow
				return 'col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3';

			case 'left_sidebar':
				// Left Sidebar
				return 'col-md-8 pull-right';

			case 'right_sidebar':
				// Right Sidebar
			default:
				return 'col-md-8';
		}
	}

   function get_column_cover_image() {
      switch( $this->get_setting( 'layout' ) )
		{
			case 'single_column':
				// Single Column Large
				return 'col-md-12';

			case 'single_column_normal':
				// Single Column
				return 'col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1';

			case 'single_column_narrow':
				// Single Column Narrow
				return 'col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2';

			case 'single_column_extra_narrow':
				// Single Column Extra Narrow
				return 'col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3';

			case 'left_sidebar':
				// Left Sidebar
				return 'col-md-12';

			case 'right_sidebar':
				// Right Sidebar
			default:
				return 'col-md-12';
		}
   }

   /**
    * ============================================================================
    * Layout Post Setting
    * ============================================================================
    */
   function layout_posts_setting() {

      if ( $this->get_setting('layout_posts') == 'mini_blog' ) {
         echo "mini-blog";
      } else {
         echo "main-content";
      }

   }

   /**
    * ============================================================================
    * Layout Mediaidx Settings
    * ============================================================================
    */
   function layout_mediaidx_setting() {

      switch( $this->get_setting( 'mediaidx_layout' ) )
		{
			case 'no_sidebar':
				// Single Column Large
				return 'col-md-12';

			case 'left_sidebar':
				// Left Sidebar
				return 'col-md-8 pull-right';

			case 'right_sidebar':
				// Right Sidebar
			default:
				return 'col-md-8';
		}

   }

   /**
    * ============================================================================
    * Check if post have a Images and Attachment for Mini Blog Layout
    * ============================================================================
    */
   function have_posts_image() {
      global $Item;

      $have_image = '';

      $item_first_image = $Item->get_images( array(
         'restrict_to_image_position' => 'teaser,aftermore,inline',
         'get_rendered_attachments'   => false,
      ) );

      if ( ! empty( $item_first_image ) ) {
         $have_image = 'have_image';
      }

      return $have_image;
   }

}
