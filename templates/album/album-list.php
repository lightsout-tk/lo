<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */

 $slug = 'templates/track/track';
 $options=  get_query_var('options');
?>
<li
    class="track <?php echo (isset($options) && !empty($options['list_classes'])) ?$options['list_classes']: 'm-1 list-group-item';?>">
    <div class="d-flex align-items-center">
        <div>
            <?php get_template_part( $slug, 'url' );  ?>
        </div>
        <div class="d-flex align-items-center col-md-6">
            <?php if(isset($options['show_thumb']) && $options['show_thumb']): ?>
            <figure class="avatar-md mr-3 ml-3 track-fiqure">
                <?php get_template_part( $slug, 'featured-image' );  ?>
            </figure>
            <?php endif; ?>
            <div>
                <h6 class="track-title"><?php the_title(); ?></h6>
                <?php 
                if(isset($options['show_artists']) && $options['show_artists']):
                    get_template_part( $slug, 'artists' );
                endif;  
            ?>
            </div>
        </div>
        <div class="col-md-6 d-none d-lg-block">
            <div class="d-flex">
                <div class="d-flex align-items-center ">
                    <?php if(isset($options['show_share']) && $options['show_share']): ?>
                    <div class="col">
                        <?php get_template_part( $slug, 'share' );  ?>
                    </div>
                    <?php endif;  ?>
                    <?php if(isset($options['show_favourite']) && $options['show_favourite']): ?>
                    <div class="col">
                        <?php get_template_part(  'templates/favourites/favourites', 'button' );  ?>
                    </div>
                    <?php endif;  ?>
                </div>
            </div>
        </div>
    </div>
</li>
<?php  set_query_var( 'options', null ); ?>