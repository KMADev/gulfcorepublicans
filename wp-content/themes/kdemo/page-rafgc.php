<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package KMA_DEMO
 */

get_header();
?>
<div class="container">

	<div id="primary"
		class="content-area">
		<main id="main"
			class="site-main"
			role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<div class="row">
				<?php
					$mls = new rafgc_idx();
					$allrows = $mls->search_mls("SELECT * from listings LIMIT 36");
					$i=1;

					foreach($allrows as $currententry){

						$photos = $mls->getMedia( $currententry['MLS_ACCT'], 'Photo', 1 );

						$mainphoto = ($photos[0]['FILE_NAME'] == '') ? get_template_directory_uri() . '/img/nophoto.jpg' :
							'http://rafgc.net/RAFSGReports/media/' . $photos[0]['FILE_NAME'];

						$baths     = $currententry['BATHS_FULL'] + ( $currententry['BATHS_HALF'] / 2 );
						$beds      = $currententry['BEDROOMS'];
						$acreage   = $currententry['ACREAGE'];
						$sqft      = $currententry['SQFT_TOTAL'];

						$tendaysago = strtotime('-10 days');
						$tendaysago = date('Y-m-d',$tendaysago);

						if($currententry['LIST_DATE'] >= $tendaysago){
							$isNew = TRUE;
						}else{
							$isNew = FALSE;
						}

						include(get_template_directory().'/modules/idx/templates/search-listing.php');

						$i++;
					}

				?>
				</div>

			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div>
<?php

get_footer();

