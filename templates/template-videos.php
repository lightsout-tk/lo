<?php
/**
 * Template Name: Videos
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */


get_header();?>
<!--Page Content-->
<main>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="animated fadeInUpShort p-md-5 p-3">
            <div class="relative mb-5">
                <h1 class="mb-2 text-primary"><?php the_title(); ?></h1>
                <?php
					while ( have_posts() ) : the_post();

						get_template_part( 'content', 'page' );

					endwhile; // end of the loop.
                    ?>

                <div class="row">
                    <?php query_posts(array('post_type'=>'video','paged'=>$paged));  ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post();?>

                    <div class="col-md-4">
                        <?php get_template_part( 'templates/blog/content', 'video' );?>
                    </div>

                    <?php  endwhile; endif;   ?>
                </div>
                <div class="my-3">
                    <?php
                  if (function_exists("rekord_get_pagination")) {rekord_get_pagination();}
                   ?>
                </div>
            </div>
        </div>
    </div>
</main>
<!--@Page Content-->
<?php get_footer(); ?>