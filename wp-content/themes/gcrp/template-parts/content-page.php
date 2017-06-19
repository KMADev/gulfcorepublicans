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
	            $map = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' );
	            //echo '<pre>',print_r($map),'</pre>';
	            echo '<a href="'.$map[0].'" class="btn btn-primary mb-2 mr-2 lightbox-link" data-lightbox="lightbox" >Open voting precinct map<a/>';
	            echo '<a class="btn mb-2 mr-2 btn-primary" href="http://www.votegulf.com/Voting-Information/Voter-Information-Lookup" target="_blank" >Look up voting information on votegulf.com</a>';

	            wp_enqueue_script( 'lightbox' );
	            wp_enqueue_style( 'lightbox-styles' );
	            add_action( 'wp_footer', 'lightbox_to_footer',100 );

            }

		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
