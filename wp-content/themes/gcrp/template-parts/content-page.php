<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GCRP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
			the_content();

            if ( $post->post_parent == '8' || is_page(8) ) {
	            $map = get_the_post_thumbnail(null,'post-thumbnail');
	            echo '<pre>',print_r($map),'</pre>';
            }

		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
