<?php

/*	----------------------------------------------------------------------------
* 	Função para gerar log no debug.log
*   ex:  write_log($whatever_you_want_to_log);
*	----------------------------------------------------------------------------*/
// if (!function_exists('write_log')) {
//     function write_log ( $log )  {
//         if ( true === WP_DEBUG ) {
//             if ( is_array( $log ) || is_object( $log ) ) {
//                 error_log( print_r( $log, true ) );
//             } else {
//                 error_log( $log );
//             }
//         }
//     }
// }

?>

<li class="amp-wp-byline">

	<?php 

		$post_author = $this->get( 'post_author' );

		if(function_exists('get_simple_local_avatar')) {

			$str_avatar_img_html = get_avatar($post_author->user_email, 48);

			// preg_match_all("/src='([^']*)'/i", $str_avatar_img_html, $img_src_array);
			// $author_img_url = $img_src_array[1][0];
			// write_log("A URL:");
			// write_log($author_img_url);

			$str_avatar_img_html = str_replace('<img', '<amp-img', $str_avatar_img_html);
			// write_log("amp img formatted" . $str_avatar_img_html);

			echo $str_avatar_img_html;
		}

	?>

	
</li>
<li class="amp-wp-author"><?php echo esc_html( $post_author->display_name ); ?></li>