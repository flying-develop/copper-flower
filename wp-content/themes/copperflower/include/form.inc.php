<?php

add_filter('wpcf7_autop_or_not', '__return_false');

add_action('wpcf7_init', 'antibot_dev');
function antibot_dev() {

    wpcf7_add_form_tag('dev', 'antibot_dev_tag', array( 'name-attr' => true ));

}

add_filter( 'wpcf7_validate_dev', 'antibot_filter', 10, 2 );
add_filter( 'wpcf7_validate_dev*', 'antibot_filter', 10, 2 );
function antibot_filter( $result, $tag ) {

    $dev = isset( $_POST['dev'] ) ? trim( $_POST['dev'] ) : '';
    if ( $dev != 'copperflower' ) {
        $result['valid'] = false;
        $result->invalidate( $tag, wpcf7_get_message('invalid_dev') );
    } else {
        $result['valid'] = true;
    }

    return $result;
}

function antibot_dev_tag($tag) {
    $validation_error = wpcf7_get_validation_error( $tag->name );
    return '<input type="hidden" name="dev" value="wp">';
}