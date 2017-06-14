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
<div class="container-fluid">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php

					$mls = new ecar_idx();
					$mls->getVars();
                    $searchCriteria = $mls->variables;

                    include(get_template_directory().'/modules/idx/templates/search-engine.php');
				    include(get_template_directory().'/modules/idx/templates/search-bar.php');

				?><div class="row"><?php

				$allrows = $mls->search_mls($realQuery);
				$i=1;

					foreach($allrows as $currententry){

					    $currententry   = $mls->translateRow($currententry);
						$photos         = $mls->getMedia( $currententry['MLS_ACCT'], 'Photo', 1 );
						$mainphoto      = ($photos[0]['location'] == '') ? get_template_directory_uri() . '/img/nophoto.jpg' : $photos[0]['location'];
						$baths          = $currententry['BATHS_FULL'] + ( $currententry['BATHS_HALF'] / 2 );
						$beds           = $currententry['BEDROOMS'];
						$acreage        = $currententry['ACREAGE'];
						$sqft           = $currententry['TOT_HEAT_SQFT'];
						$tendaysago     = strtotime('-10 days');
						$tendaysago     = date('Y-m-d',$tendaysago);

						if($currententry['LIST_DATE'] >= $tendaysago){
							$isNew = TRUE;
						}else{
							$isNew = FALSE;
						}

						include(get_template_directory().'/modules/idx/templates/search-listing.php');
						$i++;
					}

	                    //PAGINATION
	                    // print the link to access each page
	                    $self = $_SERVER['SELF'] . "?pg=";
	                    $nav  = '';

	                    //figure out which pages to show in paging
	                    $startpage = 1;
	                    $endpage = $numpages;

	                    //if pageNum is unset than it will automatically go to 1
	                    if($pageNum == '' || $pageNum == NULL){$pageNum = '1';}else{$pageNum = $_GET['pg'];}

	                    if($numpages > 6){
		                    if(($pageNum - 3 > 0) && ($pageNum + 3 < $numpages)){
			                    //start 3 pages away from current page
			                    $startpage = $pageNum - 3;
			                    $endpage = $pageNum + 3;
		                    }else if($pageNum - 3 <= 1){
			                    //show pages 1 - 6
			                    $endpage = 6;
		                    }else{
			                    //show last 5 pages
			                    $startpage = $numpages - 5;
		                    }
	                    }

	                    for($page = $startpage; $page <= $endpage; $page++){
		                    if ($page == $pageNum){
			                    $nav .= '<li class="page-item active"><span class="page-link">'.$page.' <span class="sr-only">(current)</span></span></li>'; // no need to create a link to current page
		                    }else{
			                    $nav .= '<li class="page-item"><a class="page-link" href="'.$self.$page.'">'.$page.'</a></li>';
		                    }
	                    }

	                    if ($pageNum > 1){
		                    $page  = $pageNum - 1;
		                    $prev  = '<li class="page-item"><a class="page-link" href="'.$self.$page.'" aria-label="Previous"><span aria-hidden="true">&#8249;</span></a></li>';
		                    $first = '<li class="page-item"><a class="page-link" href="'.$self.'1" aria-label="First"><span aria-hidden="true">&laquo;</span></a></li>';
	                    }else{
		                    $prev  = '<li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&#8249;</span></a></li>'; // we're on page one, disable prev link
		                    $first = '<li class="page-item disabled"><a class="page-link" href="#" aria-label="First"><span aria-hidden="true">&laquo;</span></a></li>'; // nor the first page link
	                    }

	                    if ($pageNum < $numpages){
		                    $page = $pageNum + 1;
		                    $next = '<li class="page-item"><a class="page-link" href="'.$self.$page.'">&#8250;</a></li>';
		                    $last = '<li class="page-item"><a class="page-link" href="'.$self.$numpages.'">&raquo;</a></li>';
	                    }else{
		                    $next = '<li class="page-item disabled"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&#8250;</span></a></li>'; // we're on the last page, don't print next link
		                    $last = '<li class="page-item disabled"><a class="page-link" href="#" aria-label="Last"><span aria-hidden="true">&raquo;</span></a></li>'; // nor the last page link
	                    }
	                    ?>
                    </div>
            <div class="row">
                <div class="col-12 mx-auto">
					<?php if($numrows > $resultsperpage){ ?>
                        <nav aria-label="Page navigation" class="text-center mx-auto">
                            <ul class="pagination justify-content-center">
								<?php echo $first . $prev . $nav . $next . $last; ?>
                            </ul>
                        </nav>
					<?php } ?>
                </div>

				<?php endwhile; ?>
            </div>
        </main><!-- #main -->
	</div><!-- #primary -->

</div>
<?php

get_footer();

