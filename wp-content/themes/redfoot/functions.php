<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme
define('CHILD_THEME_NAME', 'RedFoot Theme');
define('CHILD_THEME_URL', 'https://redfoot.com');
define('CHILD_THEME_VERSION', '1.0.0');


//* mobilize init
include('BaseDao.php');

function isDevelopmentMode() {
    //DEV
    return true;

    //PRODUCTION
    return false;
}



/* Table of Contents

  - General
  - Viewport meta for mobile
  - HTML5 markup structure
  - Structural Wraps
  - Enqueue scripts and styles
  - Genesis Layout
  - Content-Sidebar layout
  - Unregister Site Layouts
  - Remove the site description
  - Unregister the header right widget area
  - Remove breadcrumb and navigation meta boxes
  - Remove comment form allowed tags
  - Remove Edit Link
  - Header
  - LOGO: Filter the genesis_seo_site_title function to insert an inline image
  - Primary Menu
  - Reposition the primary navigation menu
  - Remove output of primary navigation right extras
  - Add categories-map sidebar
  - Secondary Menu
  - Reposition the secondary navigation menu
  - Reduce the secondary navigation menu to one level depth
  - Post
  - Customize the post meta function
  - Customize the post info function
  - Modify the length of post excerpts
  - Add Read More Link to Excerpts
  - Remove the post meta function from entry footer
  - Author Box
  - Add Author box
  - Modify the author box title
  - Avatar-size (gravatar)
  - Author box avatar size
  - Comments avatar size
  - Yarpp - Related Posts Plugin
  - Add yarpp on entry footer
  - Footer
  - Add logo before footer credits
  - Customize footer credits
  - Admin - User Roles and Capabilities
  - Widgets
  - Banner sending to Portal SSD
  - Scripts
  - Add Google Analytics script before </head>
  - Hotmart
  - Add Hotleads Script
  - Facebook
  - Facebook sdk
  - Facebook like and share button_count
  - Add facebook comments box
  - Add facebook comments admins genesis_meta
  - Translation
  - Customize the "Previous" page link
  - Customize the "Next" page link
  - Customize search form input box text
  - Search Results message
 */


/* 	----------------------------------------------------------------------------
 * 	Função para gerar log
 * 	log_var(conteúdo, título, grava em arquivo = true; exiba na tela coloca = false
 *   ex:  log_var ($_POST, "POST recebido: ", true); 
 * 	---------------------------------------------------------------------------- */

// if (!function_exists('log_var')) {
//       function log_var($var_content, $var_title='', $to_file=false){
//         if ($to_file==true) {
//             $txt = @fopen(STYLESHEETPATH . '/functions_log.txt','a');
//             if ($txt){
//             	$the_text = "-----------------------------------\n" .
//             				$var_title . "\n" .
//             				print_r($var_content, true) . "\n";
//             	fwrite($txt, $the_text);
//                 fclose($txt);
//             }
//         } else {
//              echo '<pre><b>'.$var_title.'</b>'.
//                   print_r($var_content,true).'</pre>';
//         }
//       }
// }


/* 	----------------------------------------------------------------------------
 * 	Função para gerar log no debug.log
 *   ex:  write_log($whatever_you_want_to_log);
 * 	---------------------------------------------------------------------------- */

if (!function_exists('write_log')) {

    function write_log($log) {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }

}



/* ----------------------------------------------------------
  DATABASE FUNCTIONS
  ---------------------------------------------------------- */

function mobi_mail($params) {

    $nome = $params['nome'];
    $email = $params['email'];
    $tipo = $params['tipo'];

    $to_email = 'taigfs@gmail.com';

    $url = 'http://mobilizesolucoes.com.br/send-mail-mobi.php?to_email=' . urlencode($to_email) . '&email=' . urlencode($email) . '&nome=' . urlencode($nome) . '&tipo=' . urlencode($tipo);
    $response = get_web_page($url);
    //print_r($response);
}

function create_prospect($params) {
    $nome = htmlspecialchars($params['nome']);
    $email = htmlspecialchars($params['email']);
    $msg = htmlspecialchars($params['msg']);


    if (empty($params['tipo'])) {
        $tipo = 'ebook-transformacao-empresa';
    } else {
        $tipo = htmlspecialchars($params['tipo']);
    }

    mobi_mail(array('email' => $email, 'nome' => $nome, 'msg' => $msg, 'tipo' => $tipo));

    $dao = new \BaseDao();

    //criando endereco
    $stm = $dao->prepare("insert into endereco (empresa) values (1)");
    $stm->execute();
    $codEndereco = $dao->lastInsertId();

    //criando pessoa
    $stm = $dao->prepare("insert into pessoa (nome, email, codEndereco, empresa) values ('" . $nome . "', '" . $email . "', '" . $codEndereco . "', 1)");
    $stm->execute();

    //criando prospecto
    $codPessoa = $dao->lastInsertId();
    $stm = $dao->prepare("insert into prospecto (codPessoa, origem, mensagem, empresa) values ('" . $codPessoa . "', 'ebook', '" . $msg . "', 1)");
    $stm->execute();
}

function get_web_page($url) {

    if (isDevelopmentMode()) {
        return true;
    }

    $user_agent = 'Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';

    $options = array(
        CURLOPT_CUSTOMREQUEST => "GET", //set request type post or get
        CURLOPT_POST => false, //set to GET
        CURLOPT_USERAGENT => $user_agent, //set user agent
        CURLOPT_COOKIEFILE => "cookie.txt", //set cookie file
        CURLOPT_COOKIEJAR => "cookie.txt", //set cookie jar
        CURLOPT_RETURNTRANSFER => true, // return web page
        CURLOPT_HEADER => false, // don't return headers
        CURLOPT_FOLLOWLOCATION => true, // follow redirects
        CURLOPT_ENCODING => "", // handle all encodings
        CURLOPT_AUTOREFERER => true, // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
        CURLOPT_TIMEOUT => 120, // timeout on response
        CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
    );

    $ch = curl_init($url);
    curl_setopt_array($ch, $options);
    $content = curl_exec($ch);
    $err = curl_errno($ch);
    $errmsg = curl_error($ch);
    $header = curl_getinfo($ch);
    curl_close($ch);

    $header['errno'] = $err;
    $header['errmsg'] = $errmsg;
    $header['content'] = $content;

    return $header;
}

/* ----------------------------------------------------------
  GENERAL
  ---------------------------------------------------------- */


//* Add viewport meta tag for mobile browsers
add_theme_support('genesis-responsive-viewport');

//* Add HTML5 markup structure
add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption'
));

//* Add support for structural wraps
add_theme_support('genesis-structural-wraps', array(
    'header',
    'site-inner',
    'footer-widgets'
));

/* ----------------------------------------------------------
  GENESIS REPLACE FAVICON
  ---------------------------------------------------------- */

add_filter('genesis_pre_load_favicon', 'new_icon');

function new_icon($icon) {
    $icon = 'https://app.mobilizeeventos.com/imgs/logo.ico';
    return $icon;
}

/* ----------------------------------------------------------
  PREPEND DESCRIPTION IN HTML TITLE
  ---------------------------------------------------------- */

add_filter('wp_title', 'add_custom_title_suffix');

function add_custom_title_suffix($title) {

    $post_slug = $post->post_name;
    echo $post_slug;

    if($post_slug === 'blog'){
        $title = 'mobilize eventos | O blog do cerimonialista de casamentos';
        
    } else if (is_single()) {//páginas do blog
        $title = $title . ' - blog do mobilize eventos';
        
    } else if (!is_home()) {//páginas da home, exceto home
        $title = $title . ' - mobilize eventos | ' . get_bloginfo('description');
        
    }
    
    return $title;
}

//* Enqueue scripts and styles

add_action('wp_enqueue_scripts', 'child_home_enqueue_scripts_styles');

function child_home_enqueue_scripts_styles() {
    wp_enqueue_style('dashicons');
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,400,700', array(), PARENT_THEME_VERSION);

    //load jquery
    wp_enqueue_script('mobi-jquery', get_stylesheet_directory_uri() . '/js/jquery/jquery-1.11.0.js');

    //load bootstrap
    wp_enqueue_style('mobi-bootstrap', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('mobi-bootstrap-theme', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap-theme.min.css');
    wp_enqueue_script('mobi-bootstrap-js', get_stylesheet_directory_uri() . '/bootstrap/js/bootstrap.min.js');
}

/* ----------------------------------------------------------
  GENESIS LAYOUT
  ---------------------------------------------------------- */



// Default layout: Content-Sidebar
add_filter('genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar');

// Unregister Site Layouts
genesis_unregister_layout('content-sidebar-sidebar');
genesis_unregister_layout('sidebar-sidebar-content');
genesis_unregister_layout('sidebar-content-sidebar');

//* Remove the site description
remove_action('genesis_site_description', 'genesis_seo_site_description');

// Unregister the header right widget area
unregister_sidebar('header-right');

//* Remove breadcrumb and navigation meta boxes
add_action('genesis_theme_settings_metaboxes', 'child_remove_genesis_metaboxes');

function child_remove_genesis_metaboxes($_genesis_theme_settings_pagehook) {

    remove_meta_box('genesis-theme-settings-nav', $_genesis_theme_settings_pagehook, 'main');
}

//* Remove comment form allowed tags
add_filter('comment_form_defaults', 'child_remove_comment_form_allowed_tags');

function child_remove_comment_form_allowed_tags($defaults) {

    $defaults['comment_notes_after'] = '';
    return $defaults;
}

//*  Remove Edit Link
add_filter('edit_post_link', '__return_false');


/* ----------------------------------------------------------
  HEADER
  ---------------------------------------------------------- */

/* --------------------------------------
  LOGO IMAGE
  -------------------------------------- */

/**
 * Filter the genesis_seo_site_title function to insert an inline image for the logo instead of a background image
 * 
 * The genesis_seo_site_title function is located in genesis/lib/structure/header.php
 * @link http://thewebprincess.com/?p=3350
 *
 */
add_filter('genesis_seo_title', 'twp_genesis_replace_header_background_img', 10, 2);

function twp_genesis_replace_header_background_img($title, $inside) {
    $inline_logo = sprintf(
            '<a href="%s" title="%s" class="logo"></a>', trailingslashit(home_url()), esc_attr(get_bloginfo('name')));

    $title = str_replace($inside, $inline_logo, $title);
    return $title;
}

/* ----------------------------------------------------------
  PRIMARY MENU
  ---------------------------------------------------------- */


//* Reposition the primary navigation menu to the header
remove_action('genesis_after_header', 'genesis_do_nav');
add_action('genesis_header', 'genesis_do_nav', 12);

//* Remove output of primary navigation right extras
remove_filter('genesis_nav_items', 'genesis_nav_right', 10, 2);
remove_filter('wp_nav_menu_items', 'genesis_nav_right', 10, 2);



/* ----------------------------------------------------------
  SECONDARY MENU
  ---------------------------------------------------------- */

//* Reposition the secondary navigation menu to the footer
remove_action('genesis_after_header', 'genesis_do_subnav');
add_action('genesis_footer', 'genesis_do_subnav', 9);

//* Reduce the secondary navigation menu to one level depth
add_filter('wp_nav_menu_args', 'child_secondary_menu_args');

function child_secondary_menu_args($args) {

    if ('secondary' != $args['theme_location'])
        return $args;

    $args['depth'] = 1;
    return $args;
}

/* ----------------------------------------------------------
  POST - POST META, INFO, EXCERPT LENGHT
  ---------------------------------------------------------- */

// Customize the post meta function - it was with "[post_categories]"
add_filter('genesis_post_meta', 'sp_post_meta_filter');

function sp_post_meta_filter($post_meta) {

    if (!is_page()) {
        $post_meta = '';
        return $post_meta;
    }
}

// Customize the post info function
add_filter('genesis_post_info', 'sp_post_info_filter');

function sp_post_info_filter($post_info) {
    $post_info = ''; //'[post_categories before=""]'
    return $post_info;
}

// Modify the length of post excerpts

add_filter('excerpt_length', 'sp_excerpt_length');

function sp_excerpt_length($length) {

    return 50; // pull first 50 words
}

// Add Read More Link to Excerpts
add_filter('excerpt_more', 'get_read_more_link');
add_filter('the_content_more_link', 'get_read_more_link');

function get_read_more_link() {

    return '...&nbsp;<a href="' . get_permalink() .
            '">[Continue&nbsp;lendo&nbsp;&raquo;]</a>';
}

//* Remove the post meta function from entry footer
remove_action('genesis_entry_footer', 'genesis_post_meta');




// Limit on 10 posts per page on TAG pages

add_filter('pre_get_posts', 'limit_posts_per_archive_page');

function limit_posts_per_archive_page() {
    if (is_tag() || is_category()) {
        $limit = 10;
    } else {
        $limit = get_option('posts_per_page');
    }

    set_query_var('posts_per_archive_page', $limit);
}

add_shortcode('inicio-resumo', 'child_beginning_resume_box');

function child_beginning_resume_box() {

    if (is_single()) {

        $resume_beg = '<div class="container">
						<div class="resumo-artigo">';

        return $resume_beg;
    }
}

add_shortcode('fim-resumo', 'child_end_resume_box');

function child_end_resume_box() {

    if (is_single()) {

        $resume_end = '</div> <!-- End of resumo-artigo -->
					   </div> <!-- End of container -->';

        return $resume_end;
    }
}

/* ----------------------------------------------------------
  AUTHOR BOX
  ---------------------------------------------------------- */

// Add Author box
add_filter('get_the_author_genesis_author_box_single', '__return_true');


// Add a button right after Author box description
add_filter('genesis_author_box', 'child_author_box', 10, 6);

function child_author_box($output, $context, $pattern, $gravatar, $title, $description) {

    global $authordata;

    $authordata = is_object($authordata) ? $authordata : get_userdata(get_query_var('author'));
    $gravatar_size = apply_filters('genesis_author_box_gravatar_size', 70, $context);
    $gravatar = get_avatar(get_the_author_meta('email'), $gravatar_size);

    $doctor_name = get_the_author();
    $doctor_url = get_the_author_meta('url');

    if ($doctor_url) {
        $description = wpautop(get_the_author_meta('description')) . '<div class="small" style="color:#ccc;">Whats: (44) 9 9704-5188 | Email: <a href="mailto:tainan@mobilizeeventos.com">tainan@mobilizeeventos.com</a></div>';
    } else {
        $description = wpautop(get_the_author_meta('description'));
    }



    //* The author box markup, contextual
    if (genesis_html5()) {

        $title = __('About', 'genesis') . ' <span itemprop="name">' . get_the_author() . '</span>';

        /**
         * Author box title filter.
         *
         * Allows you to filter the title of the author box. $context passed as second parameter to allow for contextual filtering.
         *
         * @since unknown
         *
         * @param string $title Assembled Title.
         * @param string $context Context.
         */
        $title = apply_filters('genesis_author_box_title', $title, $context);

        if ('single' === $context && !genesis_get_seo_option('semantic_headings')) {
            $heading_element = 'h4';
        } elseif (genesis_a11y('headings') || get_the_author_meta('headline', (int) get_query_var('author'))) {
            $heading_element = 'h4';
        } else {
            $heading_element = 'h1';
        }

        $pattern = sprintf('<section %s>', genesis_attr('author-box'));
        $pattern .= '%s<' . $heading_element . ' class="author-box-title">%s</' . $heading_element . '>';
        $pattern .= '<div class="author-box-content" itemprop="description">%s</div>';
        $pattern .= '</section>';
    } else {

        $title = apply_filters('genesis_author_box_title', sprintf('<strong>%s %s</strong>', __('About', 'genesis'), get_the_author()), $context);

        if ('single' === $context || get_the_author_meta('headline', (int) get_query_var('author'))) {
            $pattern = '<div class="author-box"><div>%s %s<br />%s</div></div>';
        } else {
            $pattern = '<div class="author-box">%s<h1>%s</h1><div>%s</div></div>';
        }
    }

    $output = sprintf($pattern, $gravatar, $title, $description);

    return $output;
}

/** Modify the author box title */
add_filter('genesis_author_box_title', 'graceful_author_box_title');

function graceful_author_box_title($title) {

    //$title = sprintf( '%s', get_the_author_meta('display_name') );
    //$title = sprintf( '<strong>%s</strong>', get_the_author_meta('display_name') );
    $title = do_shortcode('[post_author_posts_link]');
    //$title =  do_shortcode('[post_author_link]');
    return $title;
}

/* ----------------------------------------------------------
  AVATAR-SIZE (GRAVATAR)
  ---------------------------------------------------------- */

//* Modify the size of the Gravatar in the author box
add_filter('genesis_author_box_gravatar_size', 'child_author_box_gravatar');

function child_author_box_gravatar($size) {

    return 128;
}

//* Modify the size of the Gravatar in the entry comments
add_filter('genesis_comment_list_args', 'child_comments_gravatar');

function child_comments_gravatar($args) {

    $args['avatar_size'] = 96;
    return $args;
}

/* ----------------------------------------------------------
  Rating Plugin - WP-PostRating
  ---------------------------------------------------------- */

add_action('genesis_entry_footer', 'child_wp_post_rating', 8);

function child_wp_post_rating() {
    if (is_single()) {
        if (function_exists('the_ratings')) {
            the_ratings();
        }
    }
}

/* ----------------------------------------------------------
  YARPP - RELATED POSTS - PLUGIN
  ---------------------------------------------------------- */

//* Add yarpp related posts after_entry (on single posts)
add_action('genesis_after_entry', 'child_add_wpp_post', 12);

function child_add_wpp_post() {

    if (is_single()) {

        if (function_exists('related_posts')) {
            related_posts();
        }
    }
}

/* ----------------------------------------------------------
  FOOTER
  ---------------------------------------------------------- */

// Customize the footer credits
add_filter('genesis_footer_creds_text', 'child_footer_creds_text');

function child_footer_creds_text() {
    ?>
    <div class="creds" style="position:relative;">
      Insira o HTML em child_footer_creds_text(), no arquivo functions.php
    </div>
    <?php
}

/* ----------------------------------------------------------
  ADMIN AREA - USER ROLES AND CAPABILITIES
  ---------------------------------------------------------- */

// Let Editors manage users, and run this only once.

function isa_editor_manage_users() {

    if (get_option('isa_add_cap_editor_once') != 'done') {

        // let editor manage users

        $edit_editor = get_role('editor'); // Get the user role
        $edit_editor->add_cap('edit_users');
        $edit_editor->add_cap('list_users');
        $edit_editor->add_cap('promote_users');
        $edit_editor->add_cap('create_users');
        $edit_editor->add_cap('add_users');
        $edit_editor->add_cap('delete_users');

        update_option('isa_add_cap_editor_once', 'done');
    }
}

add_action('init', 'isa_editor_manage_users');



// prevent editor from deleting, editing, or creating an administrator
// only needed if the editor was given right to edit users
// Add our filters
add_filter('editable_roles', 'custom_editable_roles');
add_filter('map_meta_cap', 'custom_map_meta_cap', 10, 4);

// Remove 'Administrator' from the list of roles if the current user is not an admin
function custom_editable_roles($roles) {
    if (isset($roles['administrator']) && !current_user_can('administrator')) {
        unset($roles['administrator']);
    }
    return $roles;
}

// If someone is trying to edit or delete an
// admin and that user isn't an admin, don't allow it
function custom_map_meta_cap($caps, $cap, $user_id, $args) {

    switch ($cap) {
        case 'edit_user':
        case 'remove_user':
        case 'promote_user':
            if (isset($args[0]) && $args[0] == $user_id)
                break;
            elseif (!isset($args[0]))
                $caps[] = 'do_not_allow';
            $other = new WP_User(absint($args[0]));
            if ($other->has_cap('administrator')) {
                if (!current_user_can('administrator')) {
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        case 'delete_user':
        case 'delete_users':
            if (!isset($args[0]))
                break;
            $other = new WP_User(absint($args[0]));
            if ($other->has_cap('administrator')) {
                if (!current_user_can('administrator')) {
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        default:
            break;
    }
    return $caps;
}

// hide admin from user list
add_action('pre_user_query', 'isa_pre_user_query');

function isa_pre_user_query($user_search) {
    $user = wp_get_current_user();
    if ($user->ID != 1) { // Is not administrator, remove administrator
        global $wpdb;
        $user_search->query_where = str_replace('WHERE 1=1', "WHERE 1=1 AND {$wpdb->users}.ID<>1", $user_search->query_where);
    }
}

/**
 * Now hide the administrators tab for non-dmin
 */
function hide_user_count() {
    $user = wp_get_current_user();
    if ($user->ID != 1) {
        ?>
        <style>
            li.administrator { display: none; }
        </style> 
        <?php
    }
}

add_action('admin_head', 'hide_user_count');



/**
 * Redirection Plugin Editor access
 */
add_filter('redirection_role', 'redirection_to_editor');

function redirection_to_editor() {
    return 'edit_pages';
}

/* ----------------------------------------------------------
  WIDGETS
  ---------------------------------------------------------- */

/* --------------------------------------------------------
  Banner Ebook Gratuito
  ------------------------------------------------------- */

// Creating the widget 
class child_widget_ebook_banner extends WP_Widget {

    function __construct() {
        parent::__construct(
                // Base ID of your widget
                'child_widget_ebook_banner',
                // Widget name will appear in UI
                __('Banner Ebook', 'child_widget_domain'),
                // Widget description
                array('description' => __('Adicione esse widget para exibir o banner lateral do ebook gratuito', 'child_widget_domain'),)
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance) {

        $banner_link = home_url() . '/livro-gratuito/';

        // build the HTML:

        echo $args['before_widget'];

        // title
        if (!empty($instance['title']) && ($instance['title'] != 'New title')) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        ?>
        <div class="container">
            <a 
                onClick="ga('send', 'event', 'side-banner', 'livro-gratuito', 'v1');"
                href="<?php echo esc_url($banner_link); ?>">
                <img <?php echo 'src="' . get_stylesheet_directory_uri() . '/images/banner-livro-gratuito-3.png"'; ?> >
            </a>
        </div>	
        <?php
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('New title', 'text_domain');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'text_domain'); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }

}

// Class child_widget ends here
// Register and load the widget
add_action('widgets_init', 'child_widget_ebook_banner_function');

function child_widget_ebook_banner_function() {
    register_widget('child_widget_ebook_banner');
}

/* --------------------------------------------------------
  Facebook Page Sidebar Widget
  ------------------------------------------------------- */

// Creating the widget 
class child_widget_facebook_page extends WP_Widget {

    function __construct() {
        parent::__construct(
                // Base ID of your widget
                'child_widget_facebook_page',
                // Widget name will appear in UI
                __('Facebook Page', 'child_widget_domain'),
                // Widget description
                array('description' => __('Adicione esse widget para exibir o plugin da página do facebook', 'child_widget_domain'),)
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance) {

        // build the HTML:

        echo $args['before_widget'];
        ?>
        <div class="container" style="padding-left:0;">
            <div class="fb-page"
                 data-href="https://www.facebook.com/mobilizeeventos/" 
                 data-width="270"
                 data-hide-cover="false"
                 data-show-facepile="true">
            </div>
        </div>	
        <?php
        echo $args['after_widget'];
    }

}

// Class child_widget ends here
// Register and load the widget
add_action('widgets_init', 'child_widget_facebook_page_function');

function child_widget_facebook_page_function() {
    register_widget('child_widget_facebook_page');
}

/* 	----------------------------------------------------------
  SCRIPTS
  ---------------------------------------------------------- */

/* 	----------------------------------
  OPTIMIZELY
  ---------------------------------- */

add_action('wp_head', 'add_optimizely_code');

function add_optimizely_code() {
    ?>
    <script src="https://cdn.optimizely.com/js/7832572616.js"></script>
    <?php
}

/*  ----------------------------------
  HELLOBAR
  ---------------------------------- */

add_action('wp_head', 'add_hellobar_code');

function add_hellobar_code() {
  if(is_single()){
    ?>
    <script src="//my.hellobar.com/784a9a0990b36a1c49f8b1702a119f872ad0273b.js" type="text/javascript" charset="utf-8" async="async"></script></body>
    <?php
  }
}

/* 	----------------------------------
  ANALYTICS
  ---------------------------------- */

// add google analytics code right before /HEAD
add_action('wp_head', 'add_analytics_code');

function add_analytics_code() {
    ?>
    <script>
                (function (i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                            m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                ga('create', 'UA-65834369-2', 'auto');
                ga('require', 'displayfeatures');
                ga('send', 'pageview');

    </script>

    <?php
}

/* 	----------------------------------
  HELLO BAR e Custom Header bar
  ---------------------------------- */

// add_action( 'wp_footer',  'add_hellobar_script');
// function add_hellobar_script()
// {
//   echo "<script src=\"//my.hellobar.com/e76c009f1120b2fea4ecc397bec7c5b4eca88bca.js\" type=\"text/javascript\" async=\"async\"></script>";
// }


/* add_action( 'genesis_before_header',  'add_custom_headerbar_script');

  function add_custom_headerbar_script() {

  ?>
  <div class="custom-header-bar container" id="chb-block">

  <div class="chb-content-wrap">
  <div class="chb-headline">Ebook: Como fazer uma mulher ter um orgasmo?</div>

  <div class="chb-cta">
  <a href="<?php echo home_url() . '/como-provocar-orgasmos-femininos/?utm_medium=hello-bar&utm_source=ssd-header&utm_campaign=ssd-hello-bar' ;?>">
  » Clique aqui «
  </a>
  </div>
  </div>

  <script type="text/javascript">
  function hideChb() {
  document.getElementById('chb-block').style.display = "none" ;

  var siteHeader = document.getElementsByClassName("site-header")[0];
  siteHeader.style.padding = "0";
  }
  </script>

  <div class="chb-close">
  <a href="#" onclick="hideChb()">
  <img src="<?php echo get_stylesheet_directory_uri() . '/images/close-icon.png' ; ?>" >
  </a>
  </div>



  </div>
  <?php

  } */



/* 	----------------------------------
  HOTMART - HOTLEADS
  ---------------------------------- */

// Add hotleads script right before the end of the </body> tag



/* 	----------------------------------
  FACEBOOK
  ---------------------------------- */

// Add facebook pixel
add_action('wp_head', 'child_add_face_pixel');

function child_add_face_pixel() {
    ?>
    <!-- Facebook Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq)
                return;
            n = f.fbq = function () {
                n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq)
                f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window,
                document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '303007036745410');
        fbq('track', 'PageView');
    </script>
    <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=303007036745410&ev=PageView&noscript=1"/>
    </noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->
    <?php
}

// Add facebook sdk code right after de BODY opening tag
add_action('genesis_before', 'child_init_facebook_sdk', 9);

function child_init_facebook_sdk() {
    ?>
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: '1490024397680488',
                xfbml: true,
                version: 'v2.8'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/pt_BR/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <?php
}

// Add facebook comments box
add_action('genesis_after_entry', 'child_add_facebook_comments', 13);

function child_add_facebook_comments() {
    if (is_single()) {
        ?>


        <div id="child-comments">

            <span class="child-comments-title">

                <h4>Comentários</h4>

            </span>

            <div class="fb-comments" 
                 data-href="<?php echo get_permalink(); ?>" 
                 data-numposts="5">
            </div>

        </div>


        <?php
    }
}

//add facebook comments admins genesis_meta
add_action('genesis_meta', 'child_add_facebook_admins');

function child_add_facebook_admins() {
    if (is_single()) {
        ?>
        <meta property="fb:app_id" content="1490024397680488" />
        <?php
    }
}

/* ----------------------------------------------------------
  TRANSLATION
  ---------------------------------------------------------- */

// Customize the "Previous" page link
add_filter('genesis_prev_link_text', 'custom_prev_link_text');

function custom_prev_link_text() {
    $prevlink = '&laquo; Anteriores';
    return $prevlink;
}

// Customize the "Next" page link
add_filter('genesis_next_link_text', 'custom_next_link_text');

function custom_next_link_text() {
    $nextlink = 'Próximos&nbsp;&raquo;';
    return $nextlink;
}

// Customize search form input box text
add_filter('genesis_search_text', 'sp_search_text');

function sp_search_text($text) {
    return esc_attr('Digite para buscar...');
}

// Search Results message
add_filter('genesis_search_title_text', 'child_search_title_text');

function child_search_title_text() {
    return 'Resultados para: ';
}

/* ----------------------------------------------------------
  AMP Pages
  ---------------------------------------------------------- */


// amp proper analytics
add_filter('amp_post_template_analytics', 'custom_amp_add_custom_analytics');

function custom_amp_add_custom_analytics($analytics) {
    if (!is_array($analytics)) {
        $analytics = array();
    }

    // https://developers.google.com/analytics/devguides/collection/amp-analytics/
    $analytics['ssd-googleanalytics'] = array(
        'type' => 'googleanalytics',
        'attributes' => array(
        // 'data-credentials' => 'include',
        ),
        'config_data' => array(
            'vars' => array(
                'account' => "UA-65834369-2"
            ),
            'triggers' => array(
                'trackPageview' => array(
                    'on' => 'visible',
                    'request' => 'pageview',
                ),
            ),
        ),
    );

    return $analytics;
}

/* ----------------------------------------------------------
  CUSTOM HEADER
  ---------------------------------------------------------- */

add_action('genesis_header', 'custom_single_post_css');

function custom_single_post_css() {

    global $post;
    $post_slug = $post->post_name;

    if (is_single() || $post_slug === 'blog') {
        ?>
        <style>
            .site-inner { padding-top: 15px; }
            .sidebar { padding-top: 45px; }
            #pre-footer, #footer-links {
                display:none;
            }
        </style>
        <?php
    }
}

add_action('genesis_header', 'custom_fixed_navbar');

function custom_fixed_navbar() {
    ?>
    <div class="fixed-navbar fixed-navbar-hidden">
        <div class="wrap" style="padding-top:10px;">
            <a href="<?= bloginfo('url') ?>">
                <img class="my-animation smaller" src="<?= get_stylesheet_directory_uri() ?>/images/logo-small-white.png" style="height:30px;padding-left:15px;">
            </a>
            <div class="smaller-menu-ul header-widget-area">
                <?php custom_site_menu_ul(); ?>
            </div>
        </div>
    </div>
    <?php
}

add_action('genesis_header_right', 'custom_site_menu_ul');

function custom_site_menu_ul() {

    global $post;
    $post_slug = $post->post_name;
    echo $post_slug;

    if ($post_slug === 'blog' || $post_slug === 'ola-mundo' || is_single()) {//blog & posts
        ?>

        <ul>
          <li>alterar html na funcao custom_site_menu_ul (functions.php, if1)</li>
        </ul>


        <?php
    } else {//home & pages
        ?>

        <ul>
          <li>alterar html na funcao custom_site_menu_ul (functions.php, if2)</li>
        </ul>

        <?php
    }
}

add_action('genesis_site_title', 'custom_site_title');

function custom_site_title() {

    global $post;
    $post_slug = $post->post_name;

    if (is_single() || $post_slug === 'blog') {
        $url = get_bloginfo('url') . '/blog';
    } else {
        $url = get_bloginfo('url');
    }
    ?>
    <a href="<?= $url ?>">
        <img id="logo" class="my-animation" src="https://static.wixstatic.com/media/a6596d_7c3f7919b2fb4d79a57b1627ccc31a28~mv2.png/v1/fill/w_168,h_32,al_c,usm_0.66_1.00_0.01/a6596d_7c3f7919b2fb4d79a57b1627ccc31a28~mv2.png" id="logo-mobile">
    </a>
    <?php
}

/* ----------------------------------------------------------
  CUSTOM FOOTER
  ---------------------------------------------------------- */

add_action('genesis_before_footer', 'custom_footer');

function custom_footer() {
    ?>
    <div id="pre-footer" class="wrap" style='border-top: 1px solid #eee;padding-top: 30px;'>
        Insira o HTML em custom_footer() no arquivo functions.php
    </div>
    <?php
}

add_action('genesis_before', 'custom_show_hide_navbar', 9);

function custom_show_hide_navbar() {
    ?>
    <script>
        var hidden = true;
        $(window).scroll(function () {
            if ($(this).scrollTop() >= 120 && hidden) { //show

                hidden = false;
                $('.fixed-navbar').removeClass('fixed-navbar-hidden');

            } else if ($(this).scrollTop() < 120 && !hidden) {//hide

                hidden = true;
                $('.fixed-navbar').addClass('fixed-navbar-hidden');

            }
        });
    </script>
    <?php
}

add_action('genesis_after_entry', 'custom_rodape_banner', 9);

function custom_rodape_banner() {

    if (is_single()) {
        ?>
        <a href="https://goo.gl/bnQung" target="_blank">
            <img class="spb_banner_img" style="margin-bottom: 25px;margin-top: -15px;" src="https://mobilizeeventos.com/wp-content/uploads/2016/10/20161020-banner-blog-small.png">
        </a>
        <?php
    }
}
