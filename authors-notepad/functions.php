<?php
/**
 * Theme functions and definitions.
 *
 * @package     Authors Notepad
 * @since       1.9
 * @author      Space X-Chimp
 * @copyright   Copyright (c) 2015-2018, Space X-Chimp
 * @link        https://www.spacexchimp.com/themes/authors-notepad.html
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
 *
 * ███████╗██████╗  █████╗  ██████╗███████╗    ██╗  ██╗      ██████╗██╗  ██╗██╗███╗   ███╗██████╗
 * ██╔════╝██╔══██╗██╔══██╗██╔════╝██╔════╝    ╚██╗██╔╝     ██╔════╝██║  ██║██║████╗ ████║██╔══██╗
 * ███████╗██████╔╝███████║██║     █████╗       ╚███╔╝█████╗██║     ███████║██║██╔████╔██║██████╔╝
 * ╚════██║██╔═══╝ ██╔══██║██║     ██╔══╝       ██╔██╗╚════╝██║     ██╔══██║██║██║╚██╔╝██║██╔═══╝
 * ███████║██║     ██║  ██║╚██████╗███████╗    ██╔╝ ██╗     ╚██████╗██║  ██║██║██║ ╚═╝ ██║██║
 * ╚══════╝╚═╝     ╚═╝  ╚═╝ ╚═════╝╚══════╝    ╚═╝  ╚═╝      ╚═════╝╚═╝  ╚═╝╚═╝╚═╝     ╚═╝╚═╝
 *
 */

/******************************************************************************
 *              PLEASE DON'T EDIT THIS FILE DIRECTLY                          *
 *                                                                            *
 *  To add custom functions, consider using a plugin from the same developer  *
 * "My Custom Functions" (https://wordpress.org/plugins/my-custom-functions/) *
 ******************************************************************************/


/**
 * Define global constants
 *
 * @since 1.5
 */
$theme_data = wp_get_theme();
function spacexchimp_t000_define_constants( $constant_name, $value ) {
    $constant_name = 'SPACEXCHIMP_T000_' . $constant_name;
    if ( !defined( $constant_name ) )
        define( $constant_name, $value );
}
spacexchimp_t000_define_constants( 'VERSION', $theme_data->get( 'Version' ) );
spacexchimp_t000_define_constants( 'PREFIX', 'spacexchimp_t000' );

/* Ladies and Gentlemans, boys and girls let's start our engine */
function anarcho_setup() {
    global $content_width;

    // Localization Init
    load_theme_textdomain( 'authors-notepad-arthur', get_template_directory() . '/languages' );

    // This feature enables Custom Backgrounds.
    add_theme_support( 'custom-background', array(
        'default-image' => get_template_directory_uri() . '/images/background.png'
    ));

    // This feature enables Custom Header.
    add_theme_support( 'custom-header', array(
        'flex-width'             => true,
        'width'                  => 500,
        'flex-height'            => true,
        'height'                 => 120,
        //'default-text-color'   => '#e5e5e5',
        'header-text'            => true,
        //'default-image'        => get_template_directory_uri() . '/images/logotype.png',
        'uploads'                => true,
    ));

    // This feature enables Featured Images (also known as post thumbnails).
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(540,230,!1);

    // This feature enables post and comment RSS feed links to <head>.
    add_theme_support('automatic-feed-links');

    // Add HTML5 elements
    add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', 'gallery', 'caption', ) );

    // Add Title-tag
    add_theme_support('title-tag');

    // Add WooCommerce support
    add_theme_support( 'woocommerce' );

    // This feature enables menu.
    register_nav_menus( array(
        'primary' => __( 'Primary Navigation', 'authors-notepad-arthur' ),
        'primary mobile' => __( 'Mobile Navigation', 'authors-notepad-arthur' )
    ));

    // This feature enables Link Manager in Admin page.
    add_filter( 'pre_option_link_manager_enabled', '__return_true' );
}
add_action( 'after_setup_theme', 'anarcho_setup' );

/**
 * Upgrade DB settings
 *
 * @since 1.5
 */
function anarcho_upgrade_settings() {

    // Read saved theme settings
    $settings_saved = get_option( 'theme_mods_authors-notepad-arthur' );

    // Return if the upgrade has already been made
    if ( isset($settings_saved['upgraded']) && $settings_saved['upgraded'] == 'yes' ) {
        return;
    }

    // Make array with default values
    $settings_default = array(
        'enable_title_animation'    => '',
        'disable_paper_search'      => '',
        'disable_about_box'         => '',
        'disable_links_box'         => '',
        'disable_stickers'          => '',
        'disable_yellow_sticker'    => '',
        'disable_recent_sticker'    => '',
        'enable_breadcrumbs'        => '',
        'enable_page-nav'           => '',
        'disable_about_bio'         => '',
        'disable_scroll_to_top'     => '',
        'disable_google_fonts'      => '',
        'disable_author_copy'       => '',
        'show_info_line'            => '',
        'disable_rss_icon'          => '',
        'num_recent_post'           => '6',
        'upgraded'                  => 'yes'
    );

    if ( !empty( $settings_saved ) ) {

        // Merge array of saved settings with array of new default settings
        $settings = array_merge( $settings_default, $settings_saved );

    } else {
        $settings = $settings_default;
    }

    // Save new setting with default values
    update_option( 'theme_mods_authors-notepad-arthur', $settings );

}
anarcho_upgrade_settings();

//Adding backwards compatibility for title-tag less than WordPress version 4.1
if ( ! function_exists( '_wp_render_title_tag' ) ) {
    function anarcho_render_title() {
        ?>
        <title>
            <?php wp_title( '|', true, 'right' ); ?>
        </title>
        <?php
    }
    add_action( 'wp_head', 'anarcho_render_title' );
}

/* Add Theme Information Page */
require get_template_directory() . '/inc/theme_info.php';

/* Add help button to admin bar */
function anarcho_add_help_button() {
    if ( current_user_can( 'edit_theme_options' ) ) {
        global $wp_admin_bar;
        $wp_admin_bar->add_menu( array(
            'parent' => 'top-secondary',     // Off on the right side
            'id'     => 'anarcho-help' ,
            'title'  =>  __( 'Help' , 'authors-notepad-arthur' ),
            'href'   => admin_url( 'themes.php?page=theme_options' ),
            'meta'   => array(
                            'title'  => __( 'Need help with Authors-Notepad? Click here!', 'authors-notepad-arthur' )
                        )
        ));
    }
}
add_action ( 'wp_before_admin_bar_render', 'anarcho_add_help_button' );

/* Add IE conditional HTML5 shim to header */
function anarcho_add_ie_html5_shiv () {
    global $is_IE;
    if ( $is_IE )
        echo '<!--[if lt IE 9]>';
        echo '<script src="', get_template_directory_uri() .'/js/html5shiv.min.js"></script>';
        echo '<![endif]-->';
}
add_action( 'wp_head', 'anarcho_add_ie_html5_shiv' );

/**
 * Enqueue scripts and styles on the admin pages.
 */
function anarcho_scripts_admin() {

    // Load additional stylesheet for admin screens
    wp_enqueue_style( 'anarcho-admin-css', get_template_directory_uri() . '/inc/admin.css', array(), SPACEXCHIMP_T000_VERSION, 'all' );

}
add_action( 'admin_enqueue_scripts', 'anarcho_scripts_admin' );

/**
 * Enqueue scripts and styles on the front end.
 */
function anarcho_scripts_frontend() {

    // Load JQuery library
    wp_enqueue_script( 'jquery' );

    // Load JavaScript and JQuery code
    wp_enqueue_script( 'anarcho-frontend-js', get_template_directory_uri() . '/js/frontend.js', array( 'jquery' ), SPACEXCHIMP_T000_VERSION, true );

    // Responsive Menu. Load the responsive-menu.js
    wp_enqueue_script( 'anarcho-responsive-menu-js', get_template_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), SPACEXCHIMP_T000_VERSION, true );

    // Load the Font-Awesome iconic font
    wp_enqueue_style( 'anarcho-font-awesome-css', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.css', array(), SPACEXCHIMP_T000_VERSION, 'screen' );

    // Comments. Enable comment_reply
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );

    // Scroll to Top Button. Load the smoothscroll.js
    wp_enqueue_script( 'anarcho-smooth-scroll-js', get_template_directory_uri() . '/js/smoothscroll.js', array( 'jquery' ), SPACEXCHIMP_T000_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'anarcho_scripts_frontend' );

/* Add Theme Customizer functionality */
require get_template_directory() . '/inc/customizer-arrays.php';
require get_template_directory() . '/inc/customizer.php';

/* This feature enables widgets area in the sidebar */
function anarcho_widgets_init() {
    register_sidebar(array(
        'name'          => __( 'Sidebar Area 1', 'authors-notepad-arthur' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown below "Pages".', 'authors-notepad-arthur' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => __( 'Sidebar Area 2', 'authors-notepad-arthur' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Widgets in this area will be shown below "What is this place?".', 'authors-notepad-arthur' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => __( 'Sidebar Area 3', 'authors-notepad-arthur' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Widgets in this area will be shown below "Friends & Links".', 'authors-notepad-arthur' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => __( 'Sidebar Area 4', 'authors-notepad-arthur' ),
        'id'            => 'sidebar-4',
        'description'   => __( 'Widgets in this area will be shown below "Recent Posts".', 'authors-notepad-arthur' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action( 'widgets_init', 'anarcho_widgets_init' );

/* This feature enables widgets area in the footer */
function anarcho_widgets_footer_init() {
    register_sidebar(array(
        'name'          => __( 'Footer Area 1', 'authors-notepad-arthur' ),
        'id'            => 'footer-1',
        'description'   => __( 'Widgets in this area will be shown left.', 'authors-notepad-arthur' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => __( 'Footer Area 2', 'authors-notepad-arthur' ),
        'id'            => 'footer-2',
        'description'   => __( 'Widgets in this area will be shown center.', 'authors-notepad-arthur' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => __( 'Footer Area 3', 'authors-notepad-arthur' ),
        'id'            => 'footer-3',
        'description'   => __( 'Widgets in this area will be shown right.', 'authors-notepad-arthur' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action( 'widgets_init', 'anarcho_widgets_footer_init' );

/* Display block "About the Author" */
function anarcho_author_bio() {
    if ( get_theme_mod('disable_about_bio') !== '1' ) {
        if ( ( get_the_author_meta( 'description' ) != '' ) ) {
            echo esc_html( get_template_part( 'author-bio' ) );
        }
    }
}

/* Date Tag (Yellow stickers) */
function anarcho_date_tag() {
    if ( get_theme_mod('disable_stickers') !== '1' ) {
        if ( is_home() || is_category() || is_archive() || is_search() ) {
            printf( '<a href="%1$s">',
                esc_url( get_permalink() )
            );
        }
        printf( '<div class="date-tab">
                    <span class="day-month">%1$s</span>
                    <span class="year">%2$s</span>
                </div>',
                esc_attr( get_the_date('j F') ),
                esc_attr( get_the_date('Y') )
        );
        if ( is_home() || is_category() || is_archive() || is_search() ) {
            printf( '</a>' );
        }
    }
}

/* Enable Breadcrumbs */
function anarcho_breadcrumbs() {
    if ( get_theme_mod('enable_breadcrumbs') == '1' ) {
        $delimiter = '&raquo;';
        $before = '<span>';
        $after = '</span>';
        echo '<nav id="breadcrumbs">';
        global $post;
        $homeLink = esc_url( home_url() );
        echo '<a href="' . $homeLink . '" style="font-family: FontAwesome; font-size: 20px; vertical-align: bottom;">&#xf015;</a> ' . $delimiter . ' ';
        if ( is_category() ) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) echo (get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ')) ;
            echo $before . __( 'Archive by category ', 'authors-notepad-arthur' ) . '"' . single_cat_title('', false) . '"' . $after;
        } elseif ( is_day() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . __( 'Archive by date ', 'authors-notepad-arthur' ) . '"' . get_the_time('d') . '"' . $after;
        } elseif ( is_month() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . __( 'Archive by month ', 'authors-notepad-arthur' ) . '"' . get_the_time('F') . '"' . $after;
        } elseif ( is_year() ) {
            echo $before . __( 'Archive by year ', 'authors-notepad-arthur' ) . '"' . get_the_time('Y') . '"' . $after;
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>' . $delimiter . ' ';
                echo $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                echo ' ' . get_category_parents($cat, TRUE, ' ' . $delimiter . ' ') . ' ';
                echo $before . __( 'You&apos;re currently reading ', 'authors-notepad-arthur' ) . '"' . get_the_title() . '"' .  $after;
            }
            /* } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;*/
        } elseif ( is_attachment() ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id    = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo ' ' . $crumb . ' ' . $delimiter . ' ';
            echo $before . 'You&apos;re currently viewing "' . get_the_title() . '"' . $after;
        } elseif ( is_page() && !$post->post_parent ) {
            echo $before . 'You&apos;re currently reading "' . get_the_title() . '"' . $after;
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id    = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo ' ' . $crumb . ' ' . $delimiter . ' ';
            echo $before . __( 'You&apos;re currently reading ', 'authors-notepad-arthur' ) . '"' . get_the_title() . '"' . $after;
        } elseif ( is_search() ) {
            echo $before . __( 'Search results for ', 'authors-notepad-arthur' ) . '"' . get_search_query() . '"' . $after;
        } elseif ( is_tag() ) {
            echo $before . __( 'Archive by tag ', 'authors-notepad-arthur' ) . '"' . single_tag_title('', false) . '"' . $after;
        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . __( 'Articles posted by ', 'authors-notepad-arthur' ) . '"' . $userdata->display_name . '"' . $after;
        } elseif ( is_404() ) {
            echo $before . __( 'You got it ', 'authors-notepad-arthur' ) . '"' . 'Error 404 not Found' . '"&nbsp;' . $after;
        }
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo ('Page') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
        echo '</nav>';
    }
}

/*
 * Page Navigation
 * Display navigation to next/previous set of posts when applicable
 */
function anarcho_page_nav() {
    if ( get_theme_mod('enable_page-nav') == '1' ) {
        global $wp_query, $wp_rewrite;
        $pages = '';
        $max = $wp_query->max_num_pages;
        if (!$current = get_query_var('paged')) $current = 1;
        $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
        $a['total'] = $max;
        $a['current'] = $current;
        $total = 0;
        $a['mid_size'] = 3;
        $a['end_size'] = 1;
        $a['prev_text'] = __( 'Previous page', 'authors-notepad-arthur' );
        $a['next_text'] = __( 'Next page', 'authors-notepad-arthur' );
        if ($max > 0) echo '<nav id="page-nav">';
        if ($total == 1 && $max > 0) $pages = '<span class="pages-nav">' . __( 'Page ', 'authors-notepad-arthur' ) . $current . __( ' of the ', 'authors-notepad-arthur' ) . $max . '</span>'."\r\n";
        echo $pages . paginate_links($a);
        if ($max > 0) echo '</nav><br>';
    } else {
        global $wp_query;

        // Don't print empty markup if there's only one page.
        if ( $wp_query->max_num_pages < 2 ) return;
        ?>
        <nav class="navigation paging-navigation" role="navigation">
            <h1 class="screen-reader-text">
                <?php _e( 'Posts navigation', 'authors-notepad-arthur' ); ?>
            </h1>
            <div class="nav-links">

                <?php if ( get_next_posts_link() ) : ?>
                    <div class="nav-previous">
                        <?php next_posts_link( '<i class="fa fa-arrow-left"></i> Older posts' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( get_previous_posts_link() ) : ?>
                    <div class="nav-next">
                        <?php previous_posts_link( 'Newer posts <i class="fa fa-arrow-right"></i>' ); ?>
                    </div>
                <?php endif; ?>

            </div>
        </nav>
        <?php
    }
}

/*
 * Post navigation
 * Display navigation to next/previous post when applicable
 */
function anarcho_post_nav() {
    global $post;

    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous ) return;
    ?>
    <nav class="navigation post-navigation" role="navigation">
        <h2 class="screen-reader-text">
            <?php _e( 'Post navigation', 'authors-notepad-arthur' ); ?>
        </h2>
        <div class="nav-links">

            <?php previous_post_link( '%link', '<i class="fa fa-arrow-left"></i> %title' ); ?>
            <?php next_post_link( '%link', '%title <i class="fa fa-arrow-right"></i>' ); ?>

        </div>
    </nav>
    <?php
}

/*
 * Template for comments and pingbacks.
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function anarcho_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
        // Display trackbacks differently than normal comments.
        ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            <p>
                <?php _e( 'Pingback:', 'authors-notepad-arthur' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'authors-notepad-arthur' ), '<span class="edit-link">', '</span>' ); ?>
            </p>
            <?php
                break;
                default :
                // Proceed with normal comments.
                global $post;
            ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comment">
                    <header class="comment-meta comment-author vcard">
                        <?php
                            echo get_avatar( $comment, 44 );
                            printf(
                                '<cite>By <b class="fn">%1$s</b> %2$s</cite>',
                                get_comment_author_link(),
                                // If current post author is also comment author, make it known visually.
                                ( $comment->user_id === $post->post_author ) ? '<span>' . __( '(Post author) ', 'authors-notepad-arthur' ) . '</span>' : ''
                            );
                            printf(
                                '<b> on <a href="%1$s"><time datetime="%2$s">%3$s</time></a></b>',
                                esc_url( get_comment_link( $comment->comment_ID ) ),
                                get_comment_time( 'c' ),
                                sprintf( '%1$s', get_comment_date( 'j F, Y' ) )
                            );
                        ?>
            </header>

            <?php if ( '0' == $comment->comment_approved ) : ?>
                <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'authors-notepad-arthur' ); ?></p>
            <?php endif; ?>

            <section class="comment-content comment">
                <?php comment_text(); ?>
                <?php edit_comment_link( __( 'Edit', 'authors-notepad-arthur' ), '<p class="edit-link">', '</p>' ); ?>
            </section>

            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'authors-notepad-arthur' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div>
        </article>
        <?php
            break;
            endswitch; // end comment_type check
}

/*
 * Copyright
 * Enable info about copyright
 */
function anarcho_copyright() {

    $anarcho_copy_website = __( 'Copyright 2018. All rights reserved.', 'authors-notepad-arthur' );
    echo get_theme_mod( 'site-info', $anarcho_copy_website ) . "<br>";

    if ( get_theme_mod('disable_author_copy') !== '1' ) {

        $anarcho_copy_theme_uri = "https://www.spacexchimp.com/themes/authors-notepad.html";
        $anarcho_copy_theme_name = "Author's Notepad";
        $anarcho_copy_theme_link = '<a title="Theme page" target="_blank" href=' . $anarcho_copy_theme_uri . '>' . $anarcho_copy_theme_name . '</a>';

        $anarcho_copy_author_uri = "https://www.spacexchimp.com/";
        $anarcho_copy_author_name = "Space X-Chimp";
        $anarcho_copy_author_link = '<a title="Theme author" target="_blank" href=' . $anarcho_copy_author_uri . '>' . $anarcho_copy_author_name . '</a>';

        echo '<div class="anarchocopy" style="margin-top:10px;">' . 'WordPress theme "' . $anarcho_copy_theme_link . '" by ' . $anarcho_copy_author_link . '.' . '</div>';

    }
}
add_action( 'wp_footer','anarcho_copyright', 999 );

/*
 * Queries
 * Display info about a database queries
 */
function anarcho_mysql_queries() {
    if ( get_theme_mod('show_info_line') == '1' ) {
        echo "\n";
        echo get_num_queries();
        _e( ' queries in ', 'authors-notepad-arthur' );
        timer_stop(1);
        _e( ' seconds', 'authors-notepad-arthur' );
        echo ' / ';
        echo round(memory_get_usage()/1024/1024, 2);
        _e( ' mb', 'authors-notepad-arthur' );
        echo "\n";
    }
}
add_action( 'wp_footer','anarcho_mysql_queries', 999 );

/*
 * Scroll to Top Button
 * Load smoothscroll.js and Enable Scroll to Top Button
 */
function anarcho_scroll_to_top() {
    if ( get_theme_mod('disable_scroll_to_top') !== '1' ) {
        echo '
            <a class="scroll-to-top" href="#top">
                <i class="fa fa-arrow-up fa-lg"></i>
            </a>
        ';
    }
}
add_action( 'wp_footer','anarcho_scroll_to_top', 999 );

/*
 * No Content
 * The Message if no content
 */
function anarcho_not_found() {
    ?>
    <div class="no-results">
        <h1>
            <?php _e( 'Not Found', 'authors-notepad-arthur' ); ?>
        </h1>
        <p>
            <?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'authors-notepad-arthur' ); ?>
        </p>
    </div>
    <?php
}

/*
 * Entry Meta
 * Display Entry Meta
 */
function anarcho_entry_meta() {
    ?>
    <div class="meta">
        <?php
            if ( is_page() ) {
                if ( the_category() != '' ) {
                    ?>
                    <i class="fa fa-folder-open"></i>
                    <?php
                    _e( 'Category: ', 'authors-notepad-arthur' );
                    the_category( ', ' );
                }
                edit_post_link( __( 'EDIT', 'authors-notepad-arthur' ), ' | <div class="button"><i class="fa fa-pencil"> ', '</i></div>');
            } elseif ( is_single() ) {
                _e( 'Posted ', 'authors-notepad-arthur' );
                the_date( get_option( 'm.d.Y' ) );
                _e( ' by ', 'authors-notepad-arthur' );
                the_author();
                _e( ' in category "', 'authors-notepad-arthur' );
                the_category( '", "' );
                edit_post_link( __( 'EDIT', 'authors-notepad-arthur' ), '" | <div class="button"><i class="fa fa-pencil"> ', '</i></div>');
                ?>
                <br>
                <?php
                anarcho_author_bio();
            } elseif ( is_home() || is_category() || is_archive() || is_search() ) {
                ?>
                <i class="fa fa-folder-open"></i>
                <?php
                _e( 'Category: ', 'authors-notepad-arthur' );
                the_category( ', ' );
                ?>
                |
                <i class="fa fa-commenting"></i>
                <?php
                comments_popup_link( __( 'LEAVE A COMMENT', 'authors-notepad-arthur' ) );
                edit_post_link( __( 'EDIT', 'authors-notepad-arthur' ), ' | <div class="button"><i class="fa fa-pencil"> ', '</i></div>');
            } else {
                ?>
                <i class="fa fa-folder-open"></i>
                <?php
                _e( 'Category: ', 'authors-notepad-arthur' );
                the_category( ', ' );
                ?>
                |
                <i class="fa fa-commenting"></i>
                <?php
                comments_popup_link( __( 'LEAVE A COMMENT', 'authors-notepad-arthur' ) );
                edit_post_link( __( 'EDIT', 'authors-notepad-arthur' ), ' | <div class="button"><i class="fa fa-pencil"> ', '</i></div>');
            }
        ?>
        </div>
        <?php
}

/******************************************************************************
 *              PLEASE DON'T EDIT THIS FILE DIRECTLY                          *
 *                                                                            *
 *  To add custom functions, consider using a plugin from the same developer  *
 * "My Custom Functions" (https://wordpress.org/plugins/my-custom-functions/) *
 ******************************************************************************/

?>
