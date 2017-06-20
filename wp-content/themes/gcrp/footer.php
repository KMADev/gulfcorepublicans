<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GCRP
 */

?>
        </div><!-- #mid -->
	</div><!-- #content -->
<div id="stripe"></div>
    <div id="sticky-footer" class="unstuck">
        <div id="bot">
            <div class="container">
                <div class="row">
                    <div class="col-md-7" >
                        <div class="row mb-md-4 mb-lg-6">
                            <div class="col-md-4 text-center">
                                <img src="<?php echo get_template_directory_uri().'/img/gcrp-round-logo.png'; ?>" alt="Gulf County Republican Party" class="img-fluid" >
                            </div>
                            <div class="col-md-4 text-center">
                                <img src="<?php echo get_template_directory_uri().'/img/rpof-logo.png'; ?>" alt="Republican Party of Florida" class="img-fluid mt-4" >
                            </div>
                            <div class="col-md-4 text-center">
                                <img src="<?php echo get_template_directory_uri().'/img/gop.png'; ?>" alt="GOP" class="img-fluid mb-5 mb-md-0 mt-4" >
                            </div>
                        </div>
                        <div class="row no-gutters justify-content-center justify-content-lg-start align-items-middle">
                            <div class="col-md-5 my-auto text-center text-md-right mt-2 order-md-2">
                                <div class="social"><span class="social-label">Follow Us:</span> <?php $socialLinks = getSocialLinks('svg','square');
				                    if(is_array($socialLinks)) {
					                    foreach ( $socialLinks as $socialId => $socialLink ) {
						                    echo '<a class="' . $socialId . '" href="' . $socialLink[0] . '" target="_blank" >' . $socialLink[1] . '</a>';
					                    }
				                    }
				                    ?></div>
                            </div>
                            <div class="col-md-7 my-auto text-center text-md-left order-md-1">
                                <p class="copyright">&copy;<?php echo date('Y'); ?> <?php echo get_bloginfo(); ?>. All Rights Reserved.</p>
                                <p class="siteby"><svg version="1.1" id="kma" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12.5 8.7" style="enable-background:new 0 0 12.5 8.7;" xml:space="preserve">
                                    <defs><style>.kma{fill:#b4be35;}</style></defs>
                                        <path class="kma" d="M6.4,0.1c0,0,0.1,0.3,0.2,0.9c1,3,3,5.6,5.7,7.2l-0.1,0.5c0,0-0.4-0.2-1-0.4C7.7,7,3.7,7,0.2,8.5L0.1,8.1
                        c2.8-1.5,4.8-4.2,5.7-7.2C6,0.4,6.1,0.1,6.1,0.1H6.4L6.4,0.1z"/>
                        </svg> <a href="https://keriganmarketing.com">Site by KMA</a>.</p>
                            </div>

                        </div>
                    </div>

                    <div id="botnav" class="col-md-5 hidden-sm-down">
                        <nav>
                            <?php wp_nav_menu(
                                array(
                                    'theme_location'  => 'footer-menu',
                                    'container_class' => '',
                                    'container_id'    => 'navbar-footer',
                                    'menu_class'      => 'justify-content-end',
                                    'fallback_cb'     => '',
                                    'menu_id'         => 'footer-menu',
                                    //'walker'          => new WP_Bootstrap_Navwalker(),
                                )
                            ); ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div id="bot-bot">
            <div class="container">

            </div><!-- .container -->
        </div>
    </div>
</div><!-- #page -->

<?php wp_footer(); ?>

<script>

function stickFooter(){

    var body = $('body'),
        bodyHeight = body.height(),
        windowHeight = $(window).height(),
        selector = $('#sticky-footer');


    if ( bodyHeight < windowHeight ) {

        body.addClass("full");
        selector.addClass("stuck");
        selector.removeClass("unstuck");
    }else{

        body.removeClass("full");
        selector.removeClass("stuck");
        selector.addClass("unstuck");
    }

    //console.log(windowHeight);
    //console.log(bodyHeight);

}

$(window).scroll(function() {
    if ($(this).scrollTop() > 10){
        $('#top').addClass("smaller");
    }else{
        $('#top').removeClass("smaller");
    }
    //stickFooter();
});

$(window).load(function() {
    stickFooter();
});

</script>

</body>
</html>
