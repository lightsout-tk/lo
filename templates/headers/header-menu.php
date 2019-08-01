<?php
/**
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */
?>

<!--navbar-->
<nav class="navbar-wrapper shadow <?php echo get_theme_mod('top_bar') ? 'top-bar':'navbar-bottom-fixed'; ?>">
    <div class="navbar navbar-expand player-header justify-content-between  bd-navbar">
        <div class="d-flex align-items-center">
            <?php if ( has_nav_menu('main-menu') ) : ?>
            <div class="ml-2 mr-2">
                <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle d-xl-none">
                    <i></i>
                </a>
            </div>
            <?php endif; ?>
            <a class="navbar-brand d-none d-lg-block" href="<?php echo esc_url(home_url('/')); ?>"
                title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">

                <?php
                    // check to see if the logo exists and add it to the page
                    if (get_theme_mod('custom_logo')): ?>

                <img class="d-inline-block align-top" src="<?php echo rekord_the_custom_logo(); ?>"
                    alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                <?php  else: ?>

                <div class="d-flex align-items-center s-14 l-s-2">
                    <span><?php bloginfo('name');?></span>
                </div>

                <?php endif;?>

            </a>

        </div>

        <?php
        if (get_theme_mod('rekord_player')) :
             get_template_part('templates/headers/header', 'player') ;
        endif; 
        ?>

        <!--Top Menu Start -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- Right Sidebar Toggle Button -->
                <?php if(rekord_has_posts('track') ): ?>
                <li class="searchOverlay-wrap">
                    <a href="#" id="btn-searchOverlay" class="nav-link mr-3 btn--searchOverlay no-ajaxy">
                        <i class="icon icon-search s-24"></i>
                    </a>
                </li>
                <?php endif; ?>
                <?php do_action('rekord_nav_item'); ?>
            </ul>
        </div>
    </div>

</nav>
<?php do_action('rekord_after_nav'); ?>


<!--search-->
<?php get_template_part('templates/headers/header', 'search'); ?>