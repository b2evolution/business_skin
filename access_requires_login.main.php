<?php
/**
 * This file is the template that displays "login required" for non logged-in users.
 *
 * For a quick explanation of b2evo 2.0 skins, please start here:
 * {@link http://b2evolution.net/man/skin-development-primer}
 *
 * @package evoskins
 * @subpackage bootstrap_blog
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );


global $app_version, $disp, $Blog;

if( version_compare( $app_version, '6.4' ) < 0 )
{ // Older skins (versions 2.x and above) should work on newer b2evo versions, but newer skins may not work on older b2evo versions.
	die( 'This skin is designed for b2evolution 6.4 and above. Please <a href="http://b2evolution.net/downloads/index.html">upgrade your b2evolution</a>.' );
}

// This is the main template; it may be used to display very different things.
// Do inits depending on current $disp:
skin_init( $disp );


// -------------------------- HTML HEADER INCLUDED HERE --------------------------
skin_include( '_html_header.inc.php', array() );
// -------------------------------- END OF HEADER --------------------------------


// ---------------------------- SITE HEADER INCLUDED HERE ----------------------------
// If site headers are enabled, they will be included here:
skin_include( '_body_header.inc.php' );
// ------------------------------- END OF SITE HEADER --------------------------------
?>


<div class="container">
<div class="row">
	<div class="<?php echo $Skin->is_visible_sidebar( true ) ? $Skin->get_column_class() : 'col-md-12'; ?>">
		<main><!-- This is were a link like "Jump to main content" would land -->

		<!-- ================================= START OF MAIN AREA ================================== -->
		<?php
			// -------------- MAIN CONTENT TEMPLATE INCLUDED HERE (Based on $disp) --------------
			skin_include( '$disp$', array(
					// Form params for the forms below: login, register, lostpassword, activateinfo and msgform
					'skin_form_before'      => '<div class="panel panel-default skin-form">'
														.'<div class="panel-heading">'
															.'<h3 class="panel-title">$form_title$</h3>'
														.'</div>'
														.'<div class="panel-body">',
					'skin_form_after'       => '</div></div>',
					// Login
					'display_form_messages' => true,
					'form_title_login'      => T_('Log in to your account').'$form_links$',
					'form_title_lostpass'   => get_request_title().'$form_links$',
					'lostpass_page_class'   => 'evo_panel__lostpass',
					'login_form_inskin'     => false,
					'login_page_class'      => 'evo_panel__login',
					'login_page_before'     => '<div class="$form_class$">',
					'login_page_after'      => '</div>',
					'display_reg_link'      => true,
					'abort_link_position'   => 'form_title',
					'abort_link_text'       => '<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
				) );
			// Note: you can customize any of the sub templates included here by
			// copying the matching php file into your skin directory.
			// ------------------------- END OF MAIN CONTENT TEMPLATE ---------------------------
		?>
		</main>

	</div><!-- .col -->

	<?php
	if( $Skin->is_visible_sidebar( true ) )
	{ // Display sidebar:
	?>
	<aside class="col-md-3<?php echo ( $Skin->get_setting( 'layout' ) == 'left_sidebar' ? ' pull-left' : '' ); ?>">
		<?php
		if( $Skin->is_visible_container( 'sidebar' ) )
		{ // Display 'Sidebar' widget container
		?>
		<!-- =================================== START OF SIDEBAR =================================== -->
		<div class="evo_container evo_container__sidebar">
		<?php
			// ------------------------- "Sidebar" CONTAINER EMBEDDED HERE --------------------------
			// Display container contents:
			skin_container( NT_('Sidebar'), array(
					// The following (optional) params will be used as defaults for widgets included in this container:
					// This will enclose each widget in a block:
					'block_start'          => '<div class="panel panel-default evo_widget $wi_class$">',
					'block_end'            => '</div>',
					// This will enclose the title of each widget:
					'block_title_start'    => '<div class="panel-heading"><h4 class="panel-title">',
					'block_title_end'      => '</h4></div>',
					// This will enclose the body of each widget:
					'block_body_start'     => '<div class="panel-body">',
					'block_body_end'       => '</div>',
					// If a widget displays a list, this will enclose that list:
					'list_start'           => '<ul>',
					'list_end'             => '</ul>',
					// This will enclose each item in a list:
					'item_start'           => '<li>',
					'item_end'             => '</li>',
					// This will enclose sub-lists in a list:
					'group_start'          => '<ul>',
					'group_end'            => '</ul>',
					// This will enclose (foot)notes:
					'notes_start'          => '<div class="notes">',
					'notes_end'            => '</div>',
					// Widget 'Search form':
					'search_class'         => 'compact_search_form',
					'search_input_before'  => '<div class="input-group">',
					'search_input_after'   => '',
					'search_submit_before' => '<span class="input-group-btn">',
					'search_submit_after'  => '</span></div>',
				) );
			// ----------------------------- END OF "Sidebar" CONTAINER -----------------------------
		?>
		</div>
		<?php } ?>

		<?php
		if( $Skin->is_visible_container( 'sidebar2' ) )
		{ // Display 'Sidebar 2' widget container
		?>
		<div class="evo_container evo_container__sidebar2">
		<?php
			// ------------------------- "Sidebar" CONTAINER EMBEDDED HERE --------------------------
			// Display container contents:
			skin_container( NT_('Sidebar 2'), array(
				// The following (optional) params will be used as defaults for widgets included in this container:
				// This will enclose each widget in a block:
				'block_start'          => '<div class="panel panel-default evo_widget $wi_class$">',
				'block_end'            => '</div>',
				// This will enclose the title of each widget:
				'block_title_start'    => '<div class="panel-heading"><h4 class="panel-title">',
				'block_title_end'      => '</h4></div>',
				// This will enclose the body of each widget:
				'block_body_start'     => '<div class="panel-body">',
				'block_body_end'       => '</div>',
				// If a widget displays a list, this will enclose that list:
				'list_start'           => '<ul>',
				'list_end'             => '</ul>',
				// This will enclose each item in a list:
				'item_start'           => '<li>',
				'item_end'             => '</li>',
				// This will enclose sub-lists in a list:
				'group_start'          => '<ul>',
				'group_end'            => '</ul>',
				// This will enclose (foot)notes:
				'notes_start'          => '<div class="notes">',
				'notes_end'            => '</div>',
				// Widget 'Search form':
				'search_class'         => 'compact_search_form',
				'search_input_before'  => '<div class="input-group">',
				'search_input_after'   => '',
				'search_submit_before' => '<span class="input-group-btn">',
				'search_submit_after'  => '</span></div>',
			) );
			// ----------------------------- END OF "Sidebar" CONTAINER -----------------------------
		?>
		</div>
		<?php } ?>

	</aside><!-- .col -->
	<?php } ?>

</div><!-- .row -->

</div><!-- .container -->


<?php
// ---------------------------- SITE FOOTER INCLUDED HERE ----------------------------
// If site footers are enabled, they will be included here:
skin_include( '_body_footer.inc.php' );
// ------------------------------- END OF SITE FOOTER --------------------------------


// ------------------------- HTML FOOTER INCLUDED HERE --------------------------
skin_include( '_html_footer.inc.php' );
// ------------------------------- END OF FOOTER --------------------------------
?>
