<?php
if ( ! function_exists( 'exam_setup' ) ) :

function exam_setup() {

	load_theme_textdomain( 'exam', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'header-menu' => esc_html__( 'Header menu', 'exam' ),
		'footer-menu' => esc_html__( 'Footer menu', 'exam' ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'exam_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'exam_setup' );


function exam_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'exam_content_width', 640 );
}
add_action( 'after_setup_theme', 'exam_content_width', 0 );


function exam_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar footer', 'exam' ),
		'id'            => 'footer-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'exam' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'exam_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function exam_scripts() {
	wp_enqueue_style( 'exam-style', get_stylesheet_uri() );

	wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/styles/owl.carousel.css');

	wp_enqueue_style('owl-theme', get_template_directory_uri() . '/styles/owl.theme.css');

	wp_enqueue_script('jquery');

	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js');

	wp_enqueue_script('slider', get_template_directory_uri() . '/js/slider.js');

	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );

	wp_enqueue_script( 'exam-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_style('OpenSans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700,600');

	wp_enqueue_style('Raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,800,700,600');

	wp_enqueue_style('Lora', 'https://fonts.googleapis.com/css?family=Lora:400,700italic');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'exam_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Post-type.
 */
require get_template_directory() . '/inc/post-type.php';

/*-------------------Social----------------------*/

function my_social_media_icons()
{
	$social_sites = my_customizer_social_media_array();
	foreach ($social_sites as $social_site) {
		if (strlen(get_theme_mod($social_site)) > 0) {
			$active_sites[] = $social_site;
		}
	}
	if (!empty($active_sites)) {
		echo "<ul class='social-media-icons'>";
		foreach ($active_sites as $active_site) {
			$class = 'fa fa-' . $active_site;
			if ($active_site == 'email') {
				?>
				<li>
					<a class="email" target="_blank"
					   href="mailto:<?php echo antispambot(is_email(get_theme_mod($active_site))); ?>">
						<span class="fa fa-envelope" title="<?php _e('email icon', 'text-domain'); ?>"></span>
					</a>
				</li>
			<?php } else { ?>
				<li>
					<a class="<?php echo $active_site; ?>" target="_blank"
					   href="<?php echo esc_url(get_theme_mod($active_site)); ?>">
						<span class="<?php echo esc_attr($class); ?>"
							  title="<?php printf(__('%s icon', 'text-domain'), $active_site); ?>"></span>
					</a>
				</li>
				<?php
			}
		}
		echo "</ul>";
	}
}
