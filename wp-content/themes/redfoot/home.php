<?php

//* Add Genesis grid loop

remove_action('genesis_loop', 'genesis_do_loop');

add_action('genesis_loop', 'custom_grid_loop_helper');

function custom_grid_loop_helper() {

    genesis_standard_loop();
}

//* Run the Genesis loop

genesis();

