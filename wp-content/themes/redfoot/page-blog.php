<?php

add_action('genesis_header', 'blog_custom_css');

function blog_custom_css(){
    global $post;
    $post_slug = $post->post_name;

    if($post_slug === 'blog'){
    ?>
    <style>
        .entry-content p {
            margin: 0 0!important;
        }
    </style>
    <?php
    }
}

/*
	Template Name: Blog
*/

//* Add Genesis grid loop
/*
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'custom_grid_loop_helper' );

function custom_grid_loop_helper() {

	genesis_standard_loop();

}

*/
//* Run the Genesis loop

genesis();

