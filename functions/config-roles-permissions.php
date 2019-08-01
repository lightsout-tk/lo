<?php

      
/**
 *  Media : Restric user to view their own uploads
 */
add_filter( 'posts_where', 'rekord_media_attachments' );
function rekord_media_attachments( $where ){
    global $current_user;

    if( is_user_logged_in() ){
         // logged in user, but are we viewing the library?
         if( isset( $_POST['action'] ) && ( $_POST['action'] == 'query-attachments' ) ){
            // here you can add some extra logic if you'd want to.
            $where .= ' AND post_author='.$current_user->data->ID;
        }
    }
    return $where;
}
/**
 *  Check who can edit post
 */
function rekord_can_edit_post($id){

  $post = get_post($id);

  $current_user = wp_get_current_user();

  return current_user_can( 'edit_track', $post->ID ) && ($post->post_author == $current_user->ID);
}
/**
 *  Subscriber Permissions
 */
add_action('wp', 'rekord_allow_subscriber_uploads');
      function rekord_allow_subscriber_uploads() {
      global $post;

        $subscriber = get_role('subscriber');
        // author caps
        $subscriber->add_cap('edit_track');
        $subscriber->add_cap('delete_track');
        $subscriber->add_cap('upload_files');

        $administrator = get_role('administrator');
        $administrator->add_cap('edit_track');
        $administrator->add_cap('delete_track');
        $subscriber->add_cap('upload_files');
}