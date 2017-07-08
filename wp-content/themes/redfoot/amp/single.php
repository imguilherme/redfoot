<?php


function custom_related_posts() {
	//for use in the loop, list 5 post titles related to first tag on current post
	$the_post_id = get_the_ID();

	$tags = wp_get_post_tags($the_post_id);
	if ($tags) {

		$first_tag = $tags[0]->term_id;

		$args=array(
		'tag__in' => array($first_tag),
		'post__not_in' => array($the_post_id),
		'posts_per_page'=>5,
		'caller_get_posts'=>1
		);
		
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {

			?>
				<div class="amp-related-posts">
					<h2>RECOMENDADOS:</h2>
					<ul>
			<?php

			while ($my_query->have_posts()) : $my_query->the_post(); 
				?>
					<li>
						<a href="<?php the_permalink() ?>amp" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</li>
				<?php
			endwhile;
			?>

					</ul>
				</div>
			<?php

		}
		wp_reset_query();

	}
}
?>

<!doctype html>
<html amp>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<?php do_action( 'amp_post_template_head', $this ); ?>

	<style amp-custom>
		<?php $this->load_parts( array( 'style' ) ); ?>
		<?php do_action( 'amp_post_template_css', $this ); ?>

		html {
		    background: #FFFFFF;
		}

		body {
			color: #41121E;
		}

		nav.amp-wp-title-bar {
	        padding: 12px 0 0;
	        background: #4d4f62;
	        background: #64b9e0;
	    }

	    nav.amp-wp-title-bar a {
	        width: 133px;
    		height: 30px;
	        display: block;
	        margin: 0 auto;
	    }

	    nav.amp-wp-title-bar div {
		    padding-bottom: 12px;
	    }

	    .amp-wp-title {
	    	color: #41121E;
	    	margin: 15px 0 24px 0;
	    	font-size: 28px;
	    	text-align: center;
	    	font-family: 'Merriweather', 'Times New Roman', Times, Serif;
	    }

	    .amp-wp-enforced-sizes {
	    	margin: 20px auto;
	    }

	    ul, ol {
	    	margin: 0 0 1em 40px;
	    }

	    ul.amp-wp-meta {
	    	margin-left: 0;
	    	list-style-type: none;
	    }

	    ul.amp-wp-meta li {
	    	float: left;
	    }

	    li.amp-wp-author,
	    li.amp-wp-posted-on,
	    li.amp-wp-tax-category {
		    padding-top: 10px;
		    margin-right: 10px;
		}

		.amp-related-posts {
		    float: left;
		    width: 100%;
		}

		.amp-related-posts li {
		    padding: 0px 0 14px;
		    list-style-type: disc;
		}

		p.bg-light-blue {
		    background: #ddedfd;
		    padding: 10px;
		}
	</style>
</head>
<body>
	<nav class="amp-wp-title-bar">
		<div>


			<a href="<?php echo esc_url( $this->get( 'home_url' ) ); ?>/blog">
		 		<amp-img src=<?php echo '"'. get_stylesheet_directory_uri() .'/images/logo-eventos-white-transparent.png"' ; ?>
		 			title=<?php echo '"' . esc_attr( $this->get( 'blog_name' ) ) . '"'; ?> class="amp-ssd-site-logo" 
		 			alt=<?php echo '"' . esc_attr( $this->get( 'blog_name' ) ) . '"'; ?> 
		 			width="133" height="30"
		 		></amp-img>
		 	</a>



		</div>
	</nav>
	<div class="amp-wp-content">
		<h1 class="amp-wp-title"><?php echo wp_kses_data( $this->get( 'post_title' ) ); ?></h1>
		<?php echo $this->get( 'post_amp_content' ); // amphtml content; no kses ?>
		<ul class="amp-wp-meta">
			<?php 
				$this->load_parts( apply_filters( 'amp_post_template_meta_parts', array( 'meta-author', 'meta-time') ) ); 
				// $this->load_parts( apply_filters( 'amp_post_template_meta_parts', array( 'meta-author', 'meta-time', 'meta-taxonomy' ) ) ); 
			?>
		</ul>

		<?php custom_related_posts(); ?>

	</div>
	<?php 
		do_action( 'amp_post_template_footer', $this ); 
	?>
</body>
</html>


