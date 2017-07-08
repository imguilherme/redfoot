<?php
add_filter('genesis_attr_body', 'add_mobi_frontpage_css');

function add_mobi_frontpage_css($attr) {
    // add original plus extra CSS classes
    $attributes['class'] .= ' frontpage';

    // return the attributes
    return $attributes;
}

add_action('mobi_landing_loop', 'add_mobi_frontpage_content');

function add_mobi_frontpage_content() {
    ?>

    <h1>Insira o template HTML de vocês! :)</h1>

    <?php
}

//* Run the Genesis loop
//genesis();
get_header();
do_action('mobi_landing_loop');
get_footer();
