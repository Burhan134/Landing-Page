<?php
/**
 *
 * Theme WordPress by Tebar System Development
 */

function tbr_theme_wp_setup()
{
	add_theme_support('automatic-feed-links');

    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(360, 260, array('center', 'center'));
    add_image_size('single-thumbnail', 710, 513, true);
    
    register_nav_menu(
    	'primary',
    	__('Primary Menu', 'landing-page')
    );
}

add_action('after_setup_theme', 'tbr_theme_wp_setup');

function tebar_scripts()
{
    wp_enqueue_style(
        'tebar-bootstrap',
        get_template_directory_uri() .'/css/bootstrap.min.css'
    );
    
    wp_enqueue_style(
        'tebar-fontawesome',
        get_template_directory_uri() .'/font-awesome/css/font-awesome.min.css'
    );

    wp_enqueue_style(
        'tebar-freelancer',
        get_template_directory_uri() .'/css/freelancer.css'
    );
    
    wp_enqueue_style('tebar-style', get_stylesheet_uri());
    
    wp_enqueue_script(
        'jquery-cdn',
        get_template_directory_uri() . '/js/jquery.js',
        array(), '', true
    );

    wp_enqueue_script(
        'bootstrap-js',
        get_template_directory_uri() . '/js/bootstrap.min.js',
        array(), '', true
    );
    
    wp_enqueue_script(
        'jquery-easing',
        '//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js',
        array(), '', true
    );

    wp_enqueue_script(
        'classie',
        get_template_directory_uri() . '/js/classie.js',
        array(), '', true
    );

    wp_enqueue_script(
        'cbpAnimatedHeader',
        get_template_directory_uri() . '/js/cbpAnimatedHeader.js',
        array(), '', true
    );

    wp_enqueue_script(
        'jqBootstrapValidation',
        get_template_directory_uri() . '/js/jqBootstrapValidation.js',
        array(), '', true
    );

    wp_enqueue_script(
        'contact_me',
        get_template_directory_uri() . '/js/contact_me.js',
        array(), '', true
    );

    wp_enqueue_script(
        'freelancer',
        get_template_directory_uri() . '/js/freelancer.js',
        array(), '', true
    );
}

add_action('wp_enqueue_scripts', 'tebar_scripts');

/**
 * Custom Menus
 */
function my_menus()
{
	$arg = array(
		       'theme_location'  => 'primary',
               'container_class' => 'collapse navbar-collapse',
               'container_id'    => 'bs-example-navbar-collapse-1',
               'menu_class'      => 'nav navbar-nav navbar-right',
               'fallback_cb'     => false,
		   );

	wp_nav_menu($arg);
}

function footer_widget_init()
{

	register_sidebar( array(
		'name'          => 'Footer Widget',
		'id'            => 'footer-widget',
		'before_widget' => '<div class="footer-col col-md-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}
add_action('widgets_init', 'footer_widget_init');

if (isset($_POST['email']) && $_POST['email'] != '') {
	$to   = 'myemail@onphpid.com';
	$name = $_POST['name'];
	$from    = $_POST['email'];
	$phone   = $_POST['phone'];
	$message = $_POST['message'];

	$headers[] = 'From: '.$name.' <'.$from.'>';
	$subject   = 'contact';

	wp_mail( $to, $subject, $message, $headers );

	exit;
}