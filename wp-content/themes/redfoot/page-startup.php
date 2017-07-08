<?php
add_action('mobi_landing_loop', 'add_mobi_frontpage_content');

function add_mobi_frontpage_content() {
    ?>

    <div>
        PÁGINA PERFIL DA STARTUP
    </div>

    <?php
}

get_header();
do_action('mobi_landing_loop');
get_footer();
