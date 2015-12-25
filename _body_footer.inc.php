<?php
/**
 * This is the BODY footer include template.
 *
 * For a quick explanation of b2evo 2.0 skins, please start here:
 * {@link http://b2evolution.net/man/skin-development-primer}
 *
 * This is meant to be included in a page template.
 *
 * @package evoskins
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );
?>

<footer id="main-footer">

	<!-- =================================== START OF FOOTER =================================== -->
   <div class="widget_footer">
	   <div class="container">

   		<div class="row">
   		<?php
   			// Display container and contents:
   			skin_container( NT_("Footer"), array(
					// The following params will be used as defaults for widgets included in this container:
					'block_start'       => '<div class="evo_widget $wi_class$ col-xs-12 col-sm-6 col-md-3">',
					'block_end'         => '</div>',
               'block_title_start' => '<h4 class="widget_title">',
               'block_title_end'   => '</h4>',
				) );
   			// Note: Double quotes have been used around "Footer" only for test purposes.
   		?>
   		</div>

      </div><!-- .container -->
   </div><!-- .widget_footer -->

   <div class="copyright">
      <div class="container">

   		<p>
   			<?php
   				// Display footer text (text can be edited in Blog Settings):
   				$Blog->footer_text( array(
						'before' => '',
						'after'  => ' &bull; ',
					) );
   			?>

   			<?php
   				// Display a link to contact the owner of this blog (if owner accepts messages):
   				$Blog->contact_link( array(
						'before' => '',
						'after'  => ' &bull; ',
						'text'   => T_('Contact'),
						'title'  => T_('Send a message to the owner of this blog...'),
					) );

   				// Display a link to help page:
   				$Blog->help_link( array(
						'before'      => ' ',
						'after'       => ' ',
						'text'        => T_('Help'),
					) );
   			?>

   			<?php
   				// Display additional credits:
   				// If you can add your own credits without removing the defaults, you'll be very cool :))
   				// Please leave this at the bottom of the page to make sure your blog gets listed on b2evolution.net
   				credits( array(
						'list_start'  => '&bull;',
						'list_end'    => ' ',
						'separator'   => '&bull;',
						'item_start'  => ' ',
						'item_end'    => ' ',
					) );
   			?>
   		</p>

      <!-- Powered By place -->

	   </div><!-- .container -->
   </div><!-- .copyright -->
</footer><!-- #main-footer -->

</div><!-- #skin_wrapper -->


<?php
// ---------------------------- SITE FOOTER INCLUDED HERE ----------------------------
// If site footers are enabled, they will be included here:
siteskin_include( '_site_body_footer.inc.php' );
// ------------------------------- END OF SITE FOOTER --------------------------------