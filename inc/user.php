<?php

//Add ACF Form Head
add_action( 'wp_head', 'rekord_acf_form_head', 2);
 function rekord_acf_form_head() {
     acf_form_head();
     
}
//Set Featured Image from ACF Field
function acf_set_featured_image( $value, $post_id, $field ) {
    if($value != ''){
        update_post_meta($post_id, '_thumbnail_id', $value);
    } else {
        if ( has_post_thumbnail() ) {
            delete_post_thumbnail( $post_id);
        } 
    }
    return $value;
}
add_filter('acf/update_value/name=thumbnail', 'acf_set_featured_image', 10, 3);
/**
 * Assing Templates
 *
 * @return $content;
 */
function rekord_templates_assign($content){

    ob_start();
    
    if (is_page(get_theme_mod('page_tracks')) && get_theme_mod('can_upload_track') ) {
        get_template_part('templates/user/user', 'tracks');
    }
    
    //Track Form Page Id
    if (is_page(get_theme_mod('page_track_save')) && get_theme_mod('can_upload_track')) {
        get_template_part('templates/user/track', 'create');  
    }

    //Track Form Page Id

    if(!empty(get_theme_mod('page_favourites')) && is_page(get_theme_mod('page_favourites'))) {
       get_template_part('templates/favourites/template', 'favourites'); 

    }
    
    $content .=  ob_get_contents();
    ob_end_clean();
    

    return $content;
}
add_filter( "the_content", "rekord_templates_assign" );

/**
 * Track Pre Save
 *
 * @return $post_id
 */
function rekord_track_pre_save_post( $post_id ) {

    // check if this is to be a new post
    if( $post_id != 'new_post' ) {
         // Create a new post
         $post = array(
            'ID'           => $post_id,
            'post_type'     => 'track',
            'post_title'    => wp_strip_all_tags($_POST['acf']['field_5cd55ca62562e']), // Post Title ACF field key
            'post_content'  => $_POST['acf']['field_5cd55cbe2562f'], // Post Content ACF field key
        ); 
            // insert the post
       $post_id = wp_update_post( $post );
        return $post_id;
    }
    // Create a new post
    $post = array(
        'post_type'     => 'track', // Your post type ( post, page, custom post type )
        'post_status'   => 'draft', // (publish, draft, private, etc.)
        'post_title'    => wp_strip_all_tags($_POST['acf']['field_5cd55ca62562e']), // Post Title ACF field key
        'post_content'  => $_POST['acf']['field_5cd55cbe2562f'], // Post Content ACF field key
    );  
    
    // insert the post
    $post_id = wp_insert_post( $post );
    
    // return the new ID
    return $post_id;
}
add_filter('acf/pre_save_post' , 'rekord_track_pre_save_post', 1, 1 );

/**
 * Track AJAX Delete
 *
 * @return void
 */
add_action( 'wp_ajax_my_delete_post', 'my_delete_post' );
function my_delete_post(){
    $permission = check_ajax_referer( 'my_delete_post_nonce', 'nonce', false );
    if( $permission == false ) {
        echo 'error';
    }
    else {
        wp_delete_post( $_REQUEST['id'] );
        echo 'success';
    }
die(); 
}