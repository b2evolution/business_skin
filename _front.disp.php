<?php
/**
 * This is the template that displays the front page of a collection (when front page enabled)
 *
 * This file is not meant to be called directly.
 * It is meant to be called by an include in a *.main.php template.
 *
 * b2evolution - {@link http://b2evolution.net/}
 * Released under GNU GPL License - {@link http://b2evolution.net/about/gnu-gpl-license}
 * @copyright (c)2003-2015 by Francois Planque - {@link http://fplanque.com/}
 *
 * @package evoskins
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );
$params = array_merge( array(
	'author_link_text'              => 'name',
	'featured_intro_before'         => '',
	'featured_intro_after'          => '',
	'front_block_start'             => '<div class="evo_widget $wi_class$ clearfix">',
	'front_block_end'               => '</div>',
	'front_block_first_title_start' => '<h3>',
	'front_block_first_title_end'   => '</h3>',
	'front_block_title_start'       => '<h3>',
	'front_block_title_end'         => '</h3>',
), $params );
// ------------------ "Front Page Main Area" CONTAINER EMBEDDED HERE -------------------
// Display container and contents:
?>
<div class="evo_container evo_container__front_page_primary">
   <?php
   skin_container( NT_('Front Page Main Area'), array(
   	// The following params will be used as defaults for widgets included in this container:
   	'author_link_text'        => $params['author_link_text'],
   	'featured_intro_before'   => $params['featured_intro_before'],
   	'featured_intro_after'    => $params['featured_intro_after'],
   	'block_start'             => $params['front_block_start'],
   	'block_end'               => $params['front_block_end'],
   	'block_first_title_start' => $params['front_block_first_title_start'],
   	'block_first_title_end'   => $params['front_block_first_title_end'],
   	'block_title_start'       => $params['front_block_title_start'],
   	'block_title_end'         => $params['front_block_title_end'],
      // Search
      'search_input_before'     => '<div class="input-group">',
      'search_input_after'      => '',
      'search_submit_before'    => '<span class="input-group-btn">',
      'search_submit_after'     => '</span></div>',
   ) );
   // --------------------- END OF "Front Page Main Area" CONTAINER -----------------------
   ?>
</div>
