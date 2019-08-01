    <?php
     $track_url  =  rekord_get_field('track_upload')['url'];
     $track_wave  =  rekord_get_field('track_wave')['url'];
    if(rekord_get_field('track') != 'upload'):
        $track_url  = rekord_get_field('track_url')  ;
    endif;   
    ?>
    <a data-title="<?php the_title(); ?>" data-time="<?php rekord_the_field('track_time');?>"
        data-permalink="<?php the_permalink(); ?>" class="no-ajaxy media-url track-url"
        href="<?php echo esc_url($track_url); ?>" <?php if(!empty( $track_wave )) echo 'data-wave="'.esc_url($track_wave).'"';
 ?>>
        <i class="icon-play <?php echo !empty($icon_classes) ? $icon_classes : 's-28'; ?>"></i>
    </a>

    <?php  set_query_var( 'icon_classes', null ); ?>