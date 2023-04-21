<?php
namespace RbnPw;

class Theme {

    public $theme_version;

    function __construct() {
        $this->theme_version = wp_get_theme()->get( 'Version' );
		//$this->pallette();
    }

    function load_scripts() {

        //  Scripts.
        wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/dist/js/vendor/bootstrap.bundle.min.js' ), array(), filemtime( plugin_dir_path(__DIR__) . 'dist/js/vendor/bootstrap.bundle.min.js'), true );
wp_enqueue_script( 'mainjs', get_theme_file_uri( 'dist/js/app.min.js' ), array('bootstrap'), filemtime( plugin_dir_path(__DIR__) . 'dist/js/app.min.js'), true );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }

	function load_styles() {

		// Styles.
		wp_enqueue_style( 'style', get_theme_file_uri( 'style.css' ), array(), $this->theme_version, 'all' );

		wp_enqueue_style( 'theme', get_theme_file_uri( '/dist/css/app.min.css' ), ['style'], filemtime(__DIR__ . '/../dist/css/app.min.css'), 'all' );

		if ( is_rtl() ) {
			wp_enqueue_style( 'rtl', get_theme_file_uri( 'dist/css/rtl.css' ), array(), $this->theme_version, 'all' );
		}

	}


    function google_fonts() {
        ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
        <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,600;1,400;1,600&family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
        <?php
    }


    function image_sizes() {
        add_image_size('rbn-card','600','600',['center','center']);
    }

    function custom_image_sizes( $sizes ) {
        return array_merge( $sizes, [
            'rbn-card' => __('RBN Card','rbn-pw')
        ]);
    }

	function pallette() {

		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'Raw Sienna', 'rbn-pw' ),
				'slug'  => 'raw-sienna',
				'color'	=> '#B85E00',
			),
			array(
				'name'  => __( 'Mesa', 'rbn-pw' ),
				'slug'  => 'mesa',
				'color' => '#a95c42',
			),
			array(
				'name'  => __( 'Ivory Buff', 'rbn-pw' ),
				'slug'  => 'ivory-buff',
				'color' => '#EBD999',
			),
			array(
				'name'	=> __( 'Ivory', 'rbn-pw' ),
				'slug'	=> 'ivory',
				'color'	=> '#F4EDE5',
			),
			array(
				'name'  => __( 'Deep Grayish Olive', 'rbn-pw' ),
				'slug'  => 'deep-grayish-olive',
				'color'	=> '#505427',
			),
			array(
				'name'  => __( 'Vizcaya Palm', 'rbn-pw' ),
				'slug'  => 'vizcaya-palm',
				'color' => '#4a634e',
			),
			array(
				'name'  => __( 'Mineral Gray', 'rbn-pw' ),
				'slug'  => 'mineral-gray',
				'color' => '#9FC2B2',
			),
			array(
				'name'	=> __( 'Black', 'rbn-pw' ),
				'slug'	=> 'black',
				'color'	=> '#222222',
			),
			array(
				'name'	=> __( 'Dim Gray', 'rbn-pw' ),
				'slug'	=> 'dim-gray',
				'color'	=> '#707070',
			),
			array(
				'name'	=> __( '60% Black', 'rbn-pw' ),
				'slug'	=> 'sixty-percent-black',
				'color'	=> '#999999',
			),
			array(
				'name'	=> __( 'Silver Medal', 'rbn-pw' ),
				'slug'	=> 'silver-medal',
				'color'	=> '#d6d6d6',
			),
			array(
				'name'	=> __( 'White', 'rbn-pw' ),
				'slug'	=> 'white',
				'color'	=> '#ffffff',
			),
			array(
				'name'	=> __( 'Transparent', 'rbn-pw' ),
				'slug'	=> 'transparent',
				'color'	=> 'transparent',
			),
		)
	);


	}
	/**
	 * Gutenberg scripts and styles
	 * @link https://www.billerickson.net/wordpress-color-palette-button-styling-gutenberg
	 */
	function block_editor_scripts() {
		wp_enqueue_script( 'be-editor', get_stylesheet_directory_uri() . '/dist/js/editor.js', array( 'wp-blocks', 'wp-dom' ), filemtime( get_stylesheet_directory() . '/assets/js/editor.js' ), true );
	}

	function sidebars() {
		register_sidebar( array(
			'name'          => __( 'Footer Area One', 'rbn-pw' ),
			'id'            => 'footer-area-one',
			'before_widget' => '<span id="%1$s" class="widget %2$s">',
			'after_widget'  => '</span>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
				'name'          => __( 'Footer Area Two', 'rbn-pw' ),
				'id'            => 'footer-area-2',
				'before_widget' => '<span id="%1$s" class="widget %2$s">',
				'after_widget'  => '</span>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );

		register_sidebar( array(
				'name'          => __( 'Footer Area Three', 'rbn-pw' ),
				'id'            => 'footer-area-three',
				'before_widget' => '<span id="%1$s" class="widget %2$s">',
				'after_widget'  => '</span>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );

	}

} //
