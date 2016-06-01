<?php
/**
 * This is the template that displays the item block: title, author, content (sub-template), tags, comments (sub-template)
 *
 * This file is not meant to be called directly.
 * It is meant to be called by an include in the main.page.php template (or other templates)
 *
 * b2evolution - {@link http://b2evolution.net/}
 * Released under GNU GPL License - {@link http://b2evolution.net/about/gnu-gpl-license}
 * @copyright (c)2003-2015 by Francois Planque - {@link http://fplanque.com/}
 *
 * @package evoskins
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

global $Item, $Skin, $app_version;


// Default params:
$params = array_merge( array(
	'feature_block'              => false,			// fp>yura: what is this for??
	// Classes for the <article> tag:
	'item_class'                 => 'evo_post evo_content_block',
	'item_type_class'            => 'evo_post__ptyp_',
	'item_status_class'          => 'evo_post__',
	// Controlling the title:
	'disp_title'                 => true,
	'item_title_line_before'     => '<div class="evo_post_title">',	// Note: we use an extra class because it facilitates styling
	'item_title_before'          => '<h3>',
	'item_title_after'           => '</h3>',
	'item_title_single_before'   => '<h1>',	// This replaces the above in case of disp=single or disp=page
	'item_title_single_after'    => '</h1>',
	'item_title_line_after'      => '</div>',
	// Controlling the content:
	'content_mode'               => 'auto',// excerpt|full|normal|auto -- auto will auto select depending on $disp-detail
	'image_class'                => 'img-responsive',
	'image_size'                 => 'fit-1280x720',
	'author_link_text'           => 'preferredname',
), $params );

$column = '';
$post_item = '';
if( $Skin->get_setting( 'layout_posts' ) == 'masonry' && $disp == 'posts' ) {
	$column = $Skin->change_class( 'posts_masonry_column' );
	$post_item = 'post_items';
}

echo '<div class="evo_content_block  '.$post_item.' '.$column.'">'; // Beginning of post display

?>

<?php if ( $Skin->get_setting( 'layout_posts' ) == 'masonry' ) : ?>
	<div class="<?php echo $Item->is_intro() ? 'posts_date evo_intro_post': 'posts_date'; ?>" >
		<?php
		   if( $Item->status != 'published' )
		   {
		      $Item->format_status( array(
		         'template' => '<div class="evo_status evo_status__$status$ badge pull-right">$status_title$</div>',
		      ) );
		   }
		   // We want to display the post time:
		   $Item->issue_time( array(
		      'before'      => '',
		      'after'       => '',
		      'time_format' => 'F j, Y',
		   ) );
		?>
	</div>
<?php endif; ?>

<?php if( $disp == 'posts' && $Skin->get_setting('layout_posts') == 'regular' || $Skin->get_setting( 'layout_posts' ) == 'masonry' ) : ?>
	<div class="<?php echo $Item->is_intro() ? 'timeline evo_intro_post': 'timeline'; ?>"></div>
<?php endif; ?>

<article id="<?php $Item->anchor_id() ?>" class="<?php $Item->div_classes( $params ) ?>" lang="<?php $Item->lang() ?>">

	<header>
   	<?php
   		$Item->locale_temp_switch(); // Temporarily switch to post locale (useful for multilingual blogs)

   		// ------- Title -------
   		if( $params['disp_title'] )
   		{
   			echo $params['item_title_line_before'];

   			if( $disp == 'single' || $disp == 'page' )
   			{
   				$title_before = $params['item_title_single_before'];
   				$title_after  = $params['item_title_single_after'];
   			}
   			else
   			{
   				$title_before = $params['item_title_before'];
   				$title_after  = $params['item_title_after'];
   			}

   			// POST TITLE:
   			$Item->title( array(
					'before'    => $title_before,
					'after'     => $title_after,
					'link_type' => '#'
				) );

   			// EDIT LINK:
   			if( $Item->is_intro() )
   			{ // Display edit link only for intro posts, because for all other posts the link is displayed on the info line.
   				$Item->edit_link( array(
						'before' => '<div class="'.button_class( 'group' ).'">',
						'after'  => '</div>',
						'text'   => $Item->is_intro() ? get_icon( 'edit' ).' '.T_('Edit Intro') : '#',
						'class'  => button_class( 'text' ),
					) );
   			}

   			echo $params['item_title_line_after'];
   		}
   	?>

   	<?php	if( ! $Item->is_intro() ){ // Don't display the following for intro posts ?>
   	<div class="small text-muted">
   	<?php
   		if( $Item->status != 'published' ) {
   			$Item->format_status( array(
					'template' => '<div class="evo_status evo_status__$status$ badge pull-right">$status_title$</div>',
				) );
   		}

         // Permalink:
         $Item->permanent_link( array(
            // 'text' => '#icon#',
            'text' => '', // without icon
         ) );

         // Show Author If on disp posts
         if ( $disp == 'posts' ) {
      		// Author
      		$Item->author( array(
      			'before'    => ' '.T_('By').' ',
      			'after'     => ' ',
      			'link_text' => $params['author_link_text'],
      		) );

         } else if ( $disp == 'single' ) {
      		// Author
      		$Item->author( array(
      			'before'    => ' '.T_('Posted by').' ',
      			'after'     => ' ',
      			'link_text' => $params['author_link_text'],
      		) );

            // We want to display the post time:
            $Item->issue_time( array(
               'before'      => ' '.T_('on').' ',
               'after'       => ' ',
               'time_format' => 'F j, Y',
            ) );

         }

         // Categories
         $Item->categories( array(
            'before'          => T_(' in ').'<div class="cat-links"> ',
            'after'           => ' </div>',
            'include_main'    => true,
            'include_other'   => true,
            'include_external'=> true,
            'link_categories' => true,
         ) );

   		// Link for editing
   		$Item->edit_link( array(
   			'before'    => ' &bull; ',
   			'after'     => '',
   		) );

   	?>
	</div>
	<?php } ?>
	</header>

	<?php
	// this will create a <section>
		// ---------------------- POST CONTENT INCLUDED HERE ----------------------
		skin_include( '_item_content.inc.php', $params );
		// Note: You can customize the default item content by copying the generic
		// /skins/_item_content.inc.php file into the current skin folder.
		// -------------------------- END OF POST CONTENT -------------------------
	// this will end a </section>
	?>

	<footer>
		<?php

      if( ! $Item->is_intro() )
      { // List all tags attached to this post:
         $Item->tags( array(
            'before'    => '<div class="post_tags"><h3>'.T_( 'Tags :' ).'</h3>',
            'after'     => '</div>',
            'separator' => '',
            'text'      => ''
         ) );
      }
		?>

		<nav class="post_comments_link">
		<?php
			// Link to comments, trackbacks, etc.:
			$Item->feedback_link( array(
				'type'            => 'comments',
				'link_before'     => '',
				'link_after'      => '',
				'link_text_zero'  => '#',
				'link_text_one'   => '#',
				'link_text_more'  => '#',
				'link_title'      => '#',
				// fp> WARNING: creates problem on home page: 'link_class' => 'btn btn-default btn-sm',
				// But why do we even have a comment link on the home page ? (only when logged in)
			) );

			// Link to comments, trackbacks, etc.:
			$Item->feedback_link( array(
				'type'            => 'trackbacks',
				'link_before'     => ' &bull; ',
				'link_after'      => '',
				'link_text_zero'  => '#',
				'link_text_one'   => '#',
				'link_text_more'  => '#',
				'link_title'      => '#',
			) );
		?>
		</nav>
	</footer>

	<?php
		// ------------------ FEEDBACK (COMMENTS/TRACKBACKS) INCLUDED HERE ------------------
		skin_include( '_item_feedback.inc.php', array_merge( array(
			'before_section_title' => '<div class="clearfix"></div><h3 class="evo_comment__list_title">',
			'after_section_title'  => '</h3>',
			'before_images'        => '<div class="evo_post_images">',
			'before_image'         => '<figure class="evo_image_block">',
			'after_image'          => '</figure>',
			'after_images'         => '</div>',
		), $params ) );
		// Note: You can customize the default item feedback by copying the generic
		// /skins/_item_feedback.inc.php file into the current skin folder.
		// ---------------------- END OF FEEDBACK (COMMENTS/TRACKBACKS) ---------------------
	?>

	<?php
	if( evo_version_compare( $app_version, '6.7' ) >= 0 )
	{    // We are running at least b2evo 6.7, so we can include this file:
		 // ------------------ WORKFLOW PROPERTIES INCLUDED HERE ------------------
		 skin_include( '_item_workflow.inc.php' );
		 // ---------------------- END OF WORKFLOW PROPERTIES ---------------------
	}
	?>

	<?php if ( $disp == 'single' || $disp == 'page' ) { ?>
		<div class="item_meta_comments">
			<?php
			if( evo_version_compare( $app_version, '6.7' ) >= 0 )
			{    // We are running at least b2evo 6.7, so we can include this file:
				// ------------------ META COMMENTS INCLUDED HERE ------------------
				skin_include( '_item_meta_comments.inc.php', array(
					'comment_start'         => '<article class="evo_comment evo_comment__meta panel panel-default">',
					'comment_end'           => '</article>',
					'comment_post_before'   => '<h3 class="evo_comment_post_title">',
					'comment_post_after'    => '</h3>',
					'comment_title_before'  => '<div class="panel-heading"><h4 class="evo_comment_title panel-title">',
					'comment_title_after'   => '</h4></div><div class="panel-body">',
				) );
				// ---------------------- END OF META COMMENTS ---------------------
			}
			?>
		</div>
	<?php } ?>

	<?php
		locale_restore_previous();	// Restore previous locale (Blog locale)
	?>

</article>

<?php echo '</div>'; // End of post display ?>
