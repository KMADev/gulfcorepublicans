<?php

use Includes\Modules\Facebook\FacebookSettings;

/**
 * @package GCRP
 */

$facebook = new FacebookSettings();
$results = $facebook->getFeed(9);
$now = time();

get_header(); ?>
    <div id="content" class="site-content support">

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php if (have_posts()) :

                if (is_home() && !is_front_page()) : ?>
                    <header id="blogheader">
                        <div class="container wide">
                            <h1 class="page-title"><?php single_post_title(); ?></h1>
                        </div>
                    </header>
                <?php endif; ?>

                <div class="blog-container">
                    <div class="container wide">
                        <div class="row">
                            <?php

                            foreach ($results->posts as $result) {
                                $trimmed = wp_trim_words($result->message, $num_words = 26, '...');
                                $photo_url = isset($result->full_picture) ? $result->full_picture : null;
                                //echo '<pre>',print_r($result),'</pre>';
                                ?>

                                <div class="col-sm-6 col-lg-4 text-center">
                                    <div class="blog-article">
                                        <div class="blog-image">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <a href="<?php echo $result->link; ?>" target="_blank" ><img
                                                            src="<?php echo $photo_url; ?>"
                                                            alt="<?php echo $result->caption; ?>"
                                                            class="embed-responsive-item img-fluid border-bottom"></a>
                                            </div>
                                        </div>

                                        <header class="blog-header">
                                            <div class="entry-meta">
                                                <p class="time-posted">
                                                    posted <?php echo human_time_diff($now, strtotime($result->created_time)); ?>
                                                    ago</p>
                                            </div><!-- .entry-meta -->
                                        </header><!-- .entry-header -->
                                        <p style="margin:0;"><?php echo $trimmed; ?></p>
                                    </div>
                                    <div class="blog-link">
                                        <a href="<?php echo $result->link; ?>" target="_blank" >Read more</a>
                                    </div><!-- .entry-content -->
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>

            <?php else :
                get_template_part('template-parts/content', 'none');
            endif; ?>
        </main><!-- #main -->

    </div>

<?php
get_footer();
