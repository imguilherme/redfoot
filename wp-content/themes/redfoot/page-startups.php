<?php
add_action('mobi_landing_loop', 'add_mobi_frontpage_content');

function add_mobi_frontpage_content() {
    ?>

    <div>
        PÁGINA LISTA DAS STARTUPS
    </div>

    <?php
}

get_header();
do_action('mobi_landing_loop');
get_footer();
