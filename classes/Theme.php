<?php
namespace RbnPw;

class Theme {

    public $theme_version;
	private $theme_path;

    function __construct() {
        $this->theme_version = wp_get_theme()->get( 'Version' );
		$this->theme_path = get_template_directory();
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
		wp_enqueue_style( 'dashicons' );
		wp_enqueue_style( 'theme', get_theme_file_uri( '/dist/css/app.min.css' ), ['style'], filemtime(__DIR__ . '/../dist/css/app.min.css'), 'all' );
		if ( is_rtl() ) {
			wp_enqueue_style( 'rtl', get_theme_file_uri( 'dist/css/rtl.css' ), array(), $this->theme_version, 'all' );
		}
	}

    function google_fonts() {
        ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,600;1,400;1,600&family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
        <?php
    }

    function image_sizes() {
		add_image_size('rbn-thumbnail','150','150',[]);
        add_image_size('rbn-card','600','600',['center','center']);
		add_image_size('rbn-large','690','690',[]);
		add_image_size('original','1200','1200',[]);
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
		wp_enqueue_script( 'be-editor', get_stylesheet_directory_uri() . '/dist/js/editor.js', array( 'wp-blocks', 'wp-dom' ), filemtime( $this->theme_path . '/dist/js/editor.js' ), true );
	}

	function register_acf_blocks() {
		if( function_exists('acf_register_block_type') ) {
			register_block_type( $this->theme_path . '/blocks/contributors-grid',[ 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-3x3-gap" viewBox="0 0 16 16">
			  <path d="M4 2v2H2V2h2zm1 12v-2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V7a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm5 10v-2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V7a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zM9 2v2H7V2h2zm5 0v2h-2V2h2zM4 7v2H2V7h2zm5 0v2H7V7h2zm5 0h-2v2h2V7zM4 12v2H2v-2h2zm5 0v2H7v-2h2zm5 0v2h-2v-2h2zM12 1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zm-1 6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V7zm1 4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-2z"/>
			</svg>'] );
			register_block_type( $this->theme_path . '/blocks/news-feed',['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-megaphone" viewBox="0 0 16 16">
			  <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49a68.14 68.14 0 0 0-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 74.663 74.663 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199V2.5zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0zm-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233c.18.01.359.022.537.036 2.568.189 5.093.744 7.463 1.993V3.85zm-9 6.215v-4.13a95.09 95.09 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A60.49 60.49 0 0 1 4 10.065zm-.657.975 1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68.019 68.019 0 0 0-1.722-.082z"/>
			</svg>'] );
			register_block_type( $this->theme_path . '/blocks/profile-grid',["icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
			  <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
			  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
			</svg>'] );
			register_block_type( $this->theme_path . '/blocks/selected-events',['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
			  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
			  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
			</svg>'] );
			register_block_type( $this->theme_path . '/blocks/spotlight-widget',['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun" viewBox="0 0 16 16">
			  <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
			</svg>'] );
			register_block_type( $this->theme_path . '/blocks/logos-row',['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-columns-gap" viewBox="0 0 16 16">
			  <path d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"/>
			</svg>'] );
		}
	}

	function sidebars() {
		register_sidebar( array(
			'name'          => __( 'Footer Area One', 'rbn-pw' ),
			'id'            => 'footer-area-one',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
				'name'          => __( 'Footer Area Two', 'rbn-pw' ),
				'id'            => 'footer-area-2',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );

		register_sidebar( array(
				'name'          => __( 'Footer Area Three', 'rbn-pw' ),
				'id'            => 'footer-area-three',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );

			register_sidebar( array(
				'name'          => __( 'Events Page - Upcoming Events - Intro Copy', 'rbn-pw' ),
				'id'            => 'upcoming-events-intro',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => '',
			) );


			register_sidebar( array(
				'name'          => __( 'Events Page - Past Events - Intro Copy', 'rbn-pw' ),
				'id'            => 'past-events-intro',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => '',
			) );

			register_sidebar( array(
				'name'          => __( 'Events Archive - Header - Spotlight', 'rbn-pw' ),
				'id'            => 'events-header-spotlight',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => '',
			) );

			register_sidebar( array(
				'name'          => __( 'News Archive - Header - Spotlight', 'rbn-pw' ),
				'id'            => 'news-header-spotlight',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => '',
			) );

			register_sidebar( array(
				'name'          => __( 'News Archive - Intro Copy', 'rbn-pw' ),
				'id'            => 'news-archive-intro',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => '',
			) );

	}

} //

