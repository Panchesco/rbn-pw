<?php
/**
 * Include Theme Customizer.
 *
 * @since v1.0
 */

$theme_customizer = __DIR__ . "/inc/customizer.php";
if (is_readable($theme_customizer)) {
  //require_once $theme_customizer;
}

if (!function_exists("rbn_pw_setup_theme")) {
  /**
   * General Theme Settings.
   *
   * @since v1.0
   *
   * @return void
   */
  function rbn_pw_setup_theme()
  {
    // Make theme available for translation: Translations can be filed in the /languages/ directory.
    load_theme_textdomain("rbn-pw", __DIR__ . "/languages");

    /**
     * Set the content width based on the theme's design and stylesheet.
     *
     * @since v1.0
     */
    global $content_width;
    if (!isset($content_width)) {
      $content_width = 800;
    }

    // Theme Support.
    add_theme_support("title-tag");
    add_theme_support("automatic-feed-links");
    add_theme_support("post-thumbnails");
    add_theme_support("html5", [
      "search-form",
      "comment-form",
      "comment-list",
      "gallery",
      "caption",
      "script",
      "style",
      "navigation-widgets",
      "appearance-tools",
      "custom-spacing",
      "buttons",
    ]);

    // Add support for Block Styles.
    add_theme_support("wp-block-styles");
    // Add support for full and wide alignment.
    add_theme_support("align-wide");
    // Add support for Editor Styles.
    add_theme_support("editor-styles");
    // Enqueue Editor Styles.
    add_editor_style("style-editor.css");

    // Default attachment display settings.
    update_option("image_default_align", "none");
    update_option("image_default_link_type", "none");
    update_option("image_default_size", "large");

    // Custom CSS styles of WorPress gallery.
    add_filter("use_default_gallery_style", "__return_false");
  }
  add_action("after_setup_theme", "rbn_pw_setup_theme");

  // Disable Block Directory: https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/filters/editor-filters.md#block-directory
  //remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
  //remove_action( 'enqueue_block_editor_assets', 'gutenberg_enqueue_block_editor_assets_block_directory' );
}

if (!function_exists("wp_body_open")) {
  /**
   * Fire the wp_body_open action.
   *
   * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
   *
   * @since v2.2
   *
   * @return void
   */
  function wp_body_open()
  {
    do_action("wp_body_open");
  }
}

if (!function_exists("rbn_pw_add_user_fields")) {
  /**
   * Add new User fields to Userprofile:
   * get_user_meta( $user->ID, 'facebook_profile', true );
   *
   * @since v1.0
   *
   * @param array $fields User fields.
   *
   * @return array
   */
  function rbn_pw_add_user_fields($fields)
  {
    // Add new fields.
    $fields["facebook_profile"] = "Facebook URL";
    $fields["twitter_profile"] = "Twitter URL";
    $fields["linkedin_profile"] = "LinkedIn URL";
    $fields["xing_profile"] = "Xing URL";
    $fields["github_profile"] = "GitHub URL";

    return $fields;
  }
  add_filter("user_contactmethods", "rbn_pw_add_user_fields");
}

/**
 * Test if a page is a blog page.
 * if ( is_blog() ) { ... }
 *
 * @since v1.0
 *
 * @return bool
 */
function is_blog()
{
  global $post;
  $posttype = get_post_type($post);

  return is_archive() ||
    is_author() ||
    is_category() ||
    is_home() ||
    is_single() ||
    (is_tag() && "post" === $posttype)
    ? true
    : false;
}

/**
 * Disable comments for Media (Image-Post, Jetpack-Carousel, etc.)
 *
 * @since v1.0
 *
 * @param bool $open    Comments open/closed.
 * @param int  $post_id Post ID.
 *
 * @return bool
 */
function rbn_pw_filter_media_comment_status($open, $post_id = null)
{
  $media_post = get_post($post_id);

  if ("attachment" === $media_post->post_type) {
    return false;
  }

  return $open;
}
add_filter("comments_open", "rbn_pw_filter_media_comment_status", 10, 2);

/**
 * Style Edit buttons as badges: https://getbootstrap.com/docs/5.0/components/badge
 *
 * @since v1.0
 *
 * @param string $link Post Edit Link.
 *
 * @return string
 */
function rbn_pw_custom_edit_post_link($link)
{
  return str_replace(
    'class="post-edit-link"',
    'class="post-edit-link badge bg-secondary"',
    $link
  );
}
add_filter("edit_post_link", "rbn_pw_custom_edit_post_link");

/**
 * Style Edit buttons as badges: https://getbootstrap.com/docs/5.0/components/badge
 *
 * @since v1.0
 *
 * @param string $link Comment Edit Link.
 */
function rbn_pw_custom_edit_comment_link($link)
{
  return str_replace(
    'class="comment-edit-link"',
    'class="comment-edit-link badge bg-secondary"',
    $link
  );
}
add_filter("edit_comment_link", "rbn_pw_custom_edit_comment_link");

/**
 * Responsive oEmbed filter: https://getbootstrap.com/docs/5.0/helpers/ratio
 *
 * @since v1.0
 *
 * @param string $html Inner HTML.
 *
 * @return string
 */
function rbn_pw_oembed_filter($html)
{
  return '<div class="ratio ratio-16x9">' . $html . "</div>";
}
add_filter("embed_oembed_html", "rbn_pw_oembed_filter", 10);

if (!function_exists("rbn_pw_content_nav")) {
  /**
   * Display a navigation to next/previous pages when applicable.
   *
   * @since v1.0
   *
   * @param string $nav_id Navigation ID.
   */
  function rbn_pw_content_nav($nav_id)
  {
    global $wp_query;

    if ($wp_query->max_num_pages > 1) { ?>
			<div id="<?php echo esc_attr(
     $nav_id
   ); ?>" class="d-flex mb-4 justify-content-between">
				<div><?php next_posts_link(
      '<span aria-hidden="true">&larr;</span> ' .
        esc_html__("Older posts", "rbn-pw")
    ); ?></div>
				<div><?php previous_posts_link(
      esc_html__("Newer posts", "rbn-pw") .
        ' <span aria-hidden="true">&rarr;</span>'
    ); ?></div>
			</div><!-- /.d-flex -->
	<?php } else {echo '<div class="clearfix"></div>';}
  }

  /**
   * Add Class.
   *
   * @since v1.0
   *
   * @return string
   */
  function posts_link_attributes()
  {
    return 'class="btn btn-secondary btn-lg"';
  }
  add_filter("next_posts_link_attributes", "posts_link_attributes");
  add_filter("previous_posts_link_attributes", "posts_link_attributes");
}

if (!function_exists("rbn_pw_article_posted_on")) {
  /**
   * "Theme posted on" pattern.
   *
   * @since v1.0
   */
  function rbn_pw_article_posted_on()
  {
    printf(
      wp_kses_post(
        __(
          '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author-meta vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>',
          "rbn-pw"
        )
      ),
      esc_url(get_the_permalink()),
      esc_attr(get_the_date() . " - " . get_the_time()),
      esc_attr(get_the_date("c")),
      esc_html(get_the_date() . " - " . get_the_time()),
      esc_url(get_author_posts_url((int) get_the_author_meta("ID"))),
      sprintf(esc_attr__("View all posts by %s", "rbn-pw"), get_the_author()),
      get_the_author()
    );
  }
}

/**
 * Template for Password protected post form.
 *
 * @since v1.0
 *
 * @return string
 */
function rbn_pw_password_form()
{
  global $post;
  $label = "pwbox-" . (empty($post->ID) ? rand() : $post->ID);

  $output = '<div class="row">';
  $output .=
    '<form action="' .
    esc_url(site_url("wp-login.php?action=postpass", "login_post")) .
    '" method="post">';
  $output .=
    '<h4 class="col-md-12 alert alert-warning">' .
    esc_html__(
      "This content is password protected. To view it please enter your password below.",
      "rbn-pw"
    ) .
    "</h4>";
  $output .= '<div class="col-md-6">';
  $output .= '<div class="input-group">';
  $output .=
    '<input type="password" name="post_password" id="' .
    esc_attr($label) .
    '" placeholder="' .
    esc_attr__("Password", "rbn-pw") .
    '" class="form-control" />';
  $output .=
    '<div class="input-group-append"><input type="submit" name="submit" class="btn btn-primary" value="' .
    esc_attr__("Submit", "rbn-pw") .
    '" /></div>';
  $output .= "</div><!-- /.input-group -->";
  $output .= "</div><!-- /.col -->";
  $output .= "</form>";
  $output .= "</div><!-- /.row -->";

  return $output;
}
add_filter("the_password_form", "rbn_pw_password_form");

if (!function_exists("rbn_pw_comment")) {
  /**
   * Style Reply link.
   *
   * @since v1.0
   *
   * @param string $class Link class.
   *
   * @return string
   */
  function rbn_pw_replace_reply_link_class($class)
  {
    return str_replace(
      "class='comment-reply-link",
      "class='comment-reply-link btn btn-outline-secondary",
      $class
    );
  }
  add_filter("comment_reply_link", "rbn_pw_replace_reply_link_class");

  /**
   * Template for comments and pingbacks:
   * add function to comments.php ... wp_list_comments( array( 'callback' => 'rbn_pw_comment' ) );
   *
   * @since v1.0
   *
   * @param object $comment Comment object.
   * @param array  $args    Comment args.
   * @param int    $depth   Comment depth.
   */
  function rbn_pw_comment($comment, $args, $depth)
  {
    $GLOBALS["comment"] = $comment;
    switch ($comment->comment_type):
      case "pingback":
      case "trackback": ?>
		<li class="post pingback">
			<p>
				<?php
    esc_html_e("Pingback:", "rbn-pw");
    comment_author_link();
    edit_comment_link(
      esc_html__("Edit", "rbn-pw"),
      '<span class="edit-link">',
      "</span>"
    );
    ?>
			</p>
	<?php break;default: ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php
      $avatar_size = "0" !== $comment->comment_parent ? 68 : 136;
      echo get_avatar($comment, $avatar_size);

      /* Translators: 1: Comment author, 2: Date and time */
      printf(
        wp_kses_post(__('%1$s, %2$s', "rbn-pw")),
        sprintf('<span class="fn">%s</span>', get_comment_author_link()),
        sprintf(
          '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
          esc_url(get_comment_link($comment->comment_ID)),
          get_comment_time("c"),
          /* Translators: 1: Date, 2: Time */
          sprintf(
            esc_html__('%1$s ago', "rbn-pw"),
            human_time_diff(
              (int) get_comment_time("U"),
              current_time("timestamp")
            )
          )
        )
      );

      edit_comment_link(
        esc_html__("Edit", "rbn-pw"),
        '<span class="edit-link">',
        "</span>"
      );
      ?>
					</div><!-- .comment-author .vcard -->

					<?php if ("0" === $comment->comment_approved) { ?>
						<em class="comment-awaiting-moderation">
							<?php esc_html_e("Your comment is awaiting moderation.", "rbn-pw"); ?>
						</em>
						<br />
					<?php } ?>
				</footer>

				<div class="comment-content"><?php comment_text(); ?></div>

				<div class="reply">
					<?php comment_reply_link(
       array_merge($args, [
         "reply_text" => esc_html__("Reply", "rbn-pw") . " <span>&darr;</span>",
         "depth" => $depth,
         "max_depth" => $args["max_depth"],
       ])
     ); ?>
				</div><!-- /.reply -->
			</article><!-- /#comment-## -->
		<?php break;endswitch;
  }

  /**
   * Custom Comment form.
   *
   * @since v1.0
   * @since v1.1: Added 'submit_button' and 'submit_field'
   * @since v2.0.2: Added '$consent' and 'cookies'
   *
   * @param array $args    Form args.
   * @param int   $post_id Post ID.
   *
   * @return array
   */
  function rbn_pw_custom_commentform($args = [], $post_id = null)
  {
    if (null === $post_id) {
      $post_id = get_the_ID();
    }

    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : "";

    $args = wp_parse_args($args);

    $req = get_option("require_name_email");
    $aria_req = $req ? " aria-required='true' required" : "";
    $consent = empty($commenter["comment_author_email"])
      ? ""
      : ' checked="checked"';
    $fields = [
      "author" =>
        '<div class="form-floating mb-3">
							<input type="text" id="author" name="author" class="form-control" value="' .
        esc_attr($commenter["comment_author"]) .
        '" placeholder="' .
        esc_html__("Name", "rbn-pw") .
        ($req ? "*" : "") .
        '"' .
        $aria_req .
        ' />
							<label for="author">' .
        esc_html__("Name", "rbn-pw") .
        ($req ? "*" : "") .
        '</label>
						</div>',
      "email" =>
        '<div class="form-floating mb-3">
							<input type="email" id="email" name="email" class="form-control" value="' .
        esc_attr($commenter["comment_author_email"]) .
        '" placeholder="' .
        esc_html__("Email", "rbn-pw") .
        ($req ? "*" : "") .
        '"' .
        $aria_req .
        ' />
							<label for="email">' .
        esc_html__("Email", "rbn-pw") .
        ($req ? "*" : "") .
        '</label>
						</div>',
      "url" => "",
      "cookies" =>
        '<p class="form-check mb-3 comment-form-cookies-consent">
							<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" class="form-check-input" type="checkbox" value="yes"' .
        $consent .
        ' />
							<label class="form-check-label" for="wp-comment-cookies-consent">' .
        esc_html__(
          "Save my name, email, and website in this browser for the next time I comment.",
          "rbn-pw"
        ) .
        '</label>
						</p>',
    ];

    $defaults = [
      "fields" => apply_filters("comment_form_default_fields", $fields),
      "comment_field" =>
        '<div class="form-floating mb-3">
											<textarea id="comment" name="comment" class="form-control" aria-required="true" required placeholder="' .
        esc_attr__("Comment", "rbn-pw") .
        ($req ? "*" : "") .
        '"></textarea>
											<label for="comment">' .
        esc_html__("Comment", "rbn-pw") .
        '</label>
										</div>',
      /** This filter is documented in wp-includes/link-template.php */
      "must_log_in" =>
        '<p class="must-log-in">' .
        sprintf(
          wp_kses_post(
            __(
              'You must be <a href="%s">logged in</a> to post a comment.',
              "rbn-pw"
            )
          ),
          wp_login_url(esc_url(get_the_permalink(get_the_ID())))
        ) .
        "</p>",
      /** This filter is documented in wp-includes/link-template.php */
      "logged_in_as" =>
        '<p class="logged-in-as">' .
        sprintf(
          wp_kses_post(
            __(
              'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>',
              "rbn-pw"
            )
          ),
          get_edit_user_link(),
          $user->display_name,
          wp_logout_url(
            apply_filters(
              "the_permalink",
              esc_url(get_the_permalink(get_the_ID()))
            )
          )
        ) .
        "</p>",
      "comment_notes_before" =>
        '<p class="small comment-notes">' .
        esc_html__("Your Email address will not be published.", "rbn-pw") .
        "</p>",
      "comment_notes_after" => "",
      "id_form" => "commentform",
      "id_submit" => "submit",
      "class_submit" => "btn btn-primary",
      "name_submit" => "submit",
      "title_reply" => "",
      "title_reply_to" => esc_html__("Leave a Reply to %s", "rbn-pw"),
      "cancel_reply_link" => esc_html__("Cancel reply", "rbn-pw"),
      "label_submit" => esc_html__("Post Comment", "rbn-pw"),
      "submit_button" =>
        '<input type="submit" id="%2$s" name="%1$s" class="%3$s" value="%4$s" />',
      "submit_field" => '<div class="form-submit">%1$s %2$s</div>',
      "format" => "html5",
    ];

    return $defaults;
  }
  add_filter("comment_form_defaults", "rbn_pw_custom_commentform");
}

if (function_exists("register_nav_menus")) {
  /**
   * Nav menus.
   *
   * @since v1.0
   *
   * @return void
   */
  register_nav_menus([
    "main-menu" => "Main Navigation Menu",
    "footer-menu" => "Footer Menu",
  ]);
}

// Custom Nav Walker: wp_bootstrap_navwalker().
$custom_walker = __DIR__ . "/inc/wp-bootstrap-navwalker.php";
if (is_readable($custom_walker)) {
  require_once $custom_walker;
}

$custom_walker_footer = __DIR__ . "/inc/wp-bootstrap-navwalker-footer.php";
if (is_readable($custom_walker_footer)) {
  require_once $custom_walker_footer;
}

if (!function_exists("pagination")) {
  function pagination($paged = "", $max_page = "")
  {
    $big = 999999999; // need an unlikely integer
    if (!$paged) {
      $paged = get_query_var("paged");
    }

    if (!$max_page) {
      global $wp_query;
      $max_page = isset($wp_query->max_num_pages)
        ? $wp_query->max_num_pages
        : 1;
    }

    echo paginate_links([
      "base" => str_replace($big, "%#%", esc_url(get_pagenum_link($big))),
      "format" => "?paged=%#%",
      "current" => max(1, $paged),
      "total" => $max_page,
      "mid_size" => 1,
      "prev_text" => __("«"),
      "next_text" => __("»"),
      "type" => "list",
    ]);
  }
}

//include_once( __DIR__ . '/fields/contributor.php');
//include_once( __DIR__ . '/fields/spotlight.php');
include_once __DIR__ . "/classes/Theme.php";
include_once __DIR__ . "/classes/RbnContributorsGrid.php";
$rbnpw = new RbnPw\Theme();

add_action("wp_enqueue_scripts", [$rbnpw, "google_fonts"], 10);
add_action("wp_enqueue_scripts", [$rbnpw, "load_scripts"], 20);
add_action("wp_enqueue_scripts", [$rbnpw, "load_styles"], 20);
add_action("after_setup_theme", [$rbnpw, "image_sizes"]);
add_action("acf/init", [$rbnpw, "register_acf_blocks"]);
add_action("enqueue_block_editor_assets", [$rbnpw, "block_editor_scripts"]);
add_action("widgets_init", [$rbnpw, "sidebars"]);
add_filter("image_size_names_choose", [$rbnpw, "custom_image_sizes"]);

function rbn_pw_where()
{
  global $template;
  $tfile = basename($template);
  if ($tfile == "front-page.php") {
    return "home";
  } elseif ($tfile == "archive-events.php") {
    return "events";
  } elseif ($tfile == "archive-news.php") {
    return "news";
  } elseif ($tfile == "archive.php") {
    return "post";
  } elseif ($tfile == "page.php") {
    return "page";
  }
}

// Include theme and Bootstrap stylesheet on editor
function rbn_editor_bootstrap_setup()
{
  add_theme_support("wp-block-styles");
  add_editor_style("./dist/css/app.min.css");
  add_editor_style("style.css");
}
add_action("after_setup_theme", "rbn_editor_bootstrap_setup");

function add_style_select_buttons($buttons)
{
  array_unshift($buttons, "styleselect");
  return $buttons;
}
// Register our callback to the appropriate filter
add_filter("mce_buttons_2", "add_style_select_buttons");

//add custom styles to the WordPress editor
function rbn_pw_block_custom_styles($init_array)
{
  $style_formats = [
    // These are the custom styles
    /*
     * Each array child is a format with it's own settings
     * Notice that each array has title, block, classes, and wrapper arguments
     * Title is the label which will be visible in Formats menu
     * Block defines whether it is a span, div, selector, or inline style
     * Classes allows you to define CSS classes
     * Wrapper whether or not to add a new block-level element around any selected elements
     */
    [
      "title" => "Small",
      "block" => "p",
      "classes" => "small",
      "wrapper" => false,
    ],
    [
      "title" => "Arrow Left",
      "block" => "div",
      "classes" => "arrow-left",
      "wrapper" => false,
    ],
    [
      "title" => "Arrow Right",
      "block" => "div",
      "classes" => "arrow-right",
      "wrapper" => false,
    ],
    [
      "title" => "Event Metadata",
      "block" => "div",
      "classes" => "event-metadata",
      "wrapper" => false,
    ],
    [
      "title" => "Sans-Serif Regular",
      "block" => "div",
      "classes" => "h5",
      "wrapper" => false,
    ],
    [
      "title" => "Sans-Serif Large",
      "block" => "div",
      "classes" => "h3",
      "wrapper" => false,
    ],
    [
      "title" => "Sans-Serif Extra Large UPPERCASE",
      "block" => "div",
      "classes" => "h4",
      "wrapper" => false,
    ],
    [
      "title" => "Sans-Serif Extra Large",
      "block" => "div",
      "classes" => "h2",
      "wrapper" => false,
    ],
    [
      "title" => "1:1 Aspect Ratio",
      "block" => "div",
      "classes" => "ratio ratio-1x1",
      "wrapper" => false,
    ],
    [
      "title" => "16:9 Aspect Ratio",
      "block" => "div",
      "classes" => "ratio ratio-16x9",
      "wrapper" => false,
    ],
    [
      "title" => "4:3 Aspect Ratio",
      "block" => "div",
      "classes" => "ratio ratio-4x3",
      "wrapper" => false,
    ],
    [
      "title" => "21:9 Aspect Ratio",
      "block" => "div",
      "classes" => "ratio ratio-21x9",
      "wrapper" => false,
    ],
    [
      "title" => "Margin Bottom",
      "block" => "div",
      "classes" => "mb-4",
      "wrapper" => false,
    ],
  ];
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array["style_formats"] = json_encode($style_formats);
  return $init_array;
}

// Disable Comments on the Site. ////////////////////////////////////

add_action("admin_init", function () {
  // Redirect any user trying to access comments page
  global $pagenow;

  if ($pagenow === "edit-comments.php") {
    wp_redirect(admin_url());
    exit();
  }

  // Remove comments metabox from dashboard
  remove_meta_box("dashboard_recent_comments", "dashboard", "normal");

  // Disable support for comments and trackbacks in post types
  foreach (get_post_types() as $post_type) {
    if (post_type_supports($post_type, "comments")) {
      remove_post_type_support($post_type, "comments");
      remove_post_type_support($post_type, "trackbacks");
    }
  }
});

// Close comments on the front-end
add_filter("comments_open", "__return_false", 20, 2);
add_filter("pings_open", "__return_false", 20, 2);

// Hide existing comments
add_filter("comments_array", "__return_empty_array", 10, 2);

// Remove comments page in menu
add_action("admin_menu", function () {
  remove_menu_page("edit-comments.php");
});

// Remove comments links from admin bar
add_action("init", function () {
  if (is_admin_bar_showing()) {
    remove_action("admin_bar_menu", "wp_admin_bar_comments_menu", 60);
  }
});

/////////////////////////////////////////////////////////////////////

// Attach callback to 'tiny_mce_before_init'
add_filter("tiny_mce_before_init", "rbn_pw_block_custom_styles");

function rbnpw_block_editor_assets()
{
  wp_register_script(
    "contributors-grid",
    get_template_directory_uri() . "/blocks/contributors-grid/index.js",
    [],
    null,
    true
  );
}

add_action("enqueue_block_editor_assets", "rbnpw_block_editor_assets");
add_post_type_support("page", "excerpt");

apply_filters("wp_lazy_loading_enabled", true, "img");

add_action("wp_enqueue_scripts", function () {
  global $post;
  $excerpt = isset($post->post_excerpt) ? $post->post_excerpt : "";
  $excerpt =
    strlen($excerpt) > 156
      ? trim(substr($excerpt, 0, 156), ".") . "..."
      : $excerpt;
  ?>
<meta name="description" content="<?php echo esc_attr($excerpt); ?>">
	<?php
});

/*
 ** Return image object data along with Spanish alt text.
 ** @param $post_id int;
 ** @return obj
 */
function rbn_get_attachment($post_id, $size = "large")
{
  if (!$post_id) {
    return "";
  }

  $locale = get_locale();
  $img = get_post($post_id);

  if (!$img) {
    return "";
  }
  $img->url = wp_get_attachment_image_url($img->ID, $size, [
    "class" => "img-fluid",
  ]);
  $img->alt_text = ["en_US" => "", "es_ES" => ""];
  $img->alt_text =
    $locale == "es_ES"
      ? get_field("es_alt", $img->ID)
      : get_post_meta($img->ID, "_wp_attachment_image_alt", true);
  $img->alt_text = esc_attr($img->alt_text);
  return $img;
}

add_filter("jpeg_quality", function ($arg) {
  return 100;
});

add_filter("xmlrpc_enabled", "__return_false");
