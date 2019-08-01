<?php

wp_deregister_style( 'wp-admin' );

$redirect = esc_url( get_page_link(get_theme_mod('page_tracks')) );

if ( ! ( is_user_logged_in() &&  current_user_can('edit_track') ) ) :
    echo '<div class="alert alert-info">'. esc_html__('You must be a registered author to post.','rekord') .'</div>';
    return;
endif;
if(isset($_GET['post']) && !rekord_can_edit_post($_GET['post'])): 
    esc_html_e('You do not have permission to update this post','rekord'); 
return;
endif;
if(isset($_GET['post'])) :
$options = array(
'post_id' => $_GET['post'],
'field_groups' => array('group_5cd3f58cbea4c'),
'form' => true,
'return' => $redirect.'?status=updated',
'submit_value' => esc_html__('Update Track','rekord'),

'html_submit_button' => '<input type="submit" class="acf-button btn btn-primary my-4 ml-2" value="%s" />',
);
else:

$options = array(
'post_id' => 'new_post',
'field_groups' => array('group_5cd3f58cbea4c'),
'form' => true,
'return' => $redirect.'?status=new',
'submit_value' => esc_html__('Upload Track','rekord'),
'html_submit_button' => '<input type="submit" class="acf-button btn btn-primary my-4 ml-2" value="%s" />',
);
endif; ?>
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            <?php acf_form($options); ?>
        </div>
    </div>
</div>