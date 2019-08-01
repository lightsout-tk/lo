<?php
/**
 * Template Name: User Dashboard
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */

acf_form_head();

get_header();

 
get_template_part('templates/global/wrapper', 'start');
if ( ! ( is_user_logged_in() ) ) :
      get_template_part('templates/auth/not', 'login');
    else :
?>
<div class="row">
    <div class="col-md-3">
        <div class="b-r">
            <?php   get_template_part('templates/auth/loggedin', 'user'); ?>
            <?php
                          wp_nav_menu(
                            array(
                                'theme_location' => 'user-menu',
                           'menu'           => 'nav navbar-nav',
                                'container'      => 'false',
                    
                             'menu_class'     => 'user-menu',
                                'fallback_cb'    => '',
                                'menu_id'        =>  'user-menu',
                                'depth'          => 1,
                            )
                        );

                ?>
        </div>
    </div>
    <div class="col-md-9 dashboard">

        <!--ACF Form Hack to work with ajax-->
        <div class="d-none">
            <?php acf_form(
                array(
                'field_groups' => array('group_5cd3f58cbea4c'),
                'form' => true,
                )); ?>
        </div>


        <?php while ( have_posts() ) : the_post(); ?>
        <h1 class="text-primary mb-3"><?php the_title(); ?></h1>
        <div class="entry-content">
            <?php the_content(); ?>
        </div><!-- .entry-content -->
        <?php endwhile; ?>
    </div>
</div>

<?php 
endif;
get_template_part('templates/global/wrapper', 'end');
get_footer(); ?>