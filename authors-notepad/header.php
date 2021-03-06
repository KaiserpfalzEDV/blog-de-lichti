<?php
/**
 * The Header for our theme.
 *
 * @package     Authors Notepad
 * @since       1.9
 * @author      Space X-Chimp
 * @copyright   Copyright (c) 2015-2018, Space X-Chimp
 * @link        https://www.spacexchimp.com/themes/authors-notepad.html
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
 */
?>

<!DOCTYPE html>
<!--[if IE 7]>
    <html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
    <html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
    <html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <header id="masthead" class="site-header" role="banner">

    <?php echo esc_html(get_template_part( 'top-bar' )); ?>

        <?php if ( get_theme_mod('disable_paper_search') !== '1') { ?>
        <div class="search-paper"></div>
        <div class="search-label">
            <?php
                $search_label = __( 'Search', 'authors-notepad-arthur' );
                echo esc_html( get_theme_mod( 'search_label', $search_label ) );
            ?>
        </div>
        <div class="top-search-form">
            <?php get_search_form(); ?>
        </div>
        <?php } ?>

        <div id="title">
            <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">

                <?php
                    $header_image = get_header_image();
                    if ( !empty( $header_image ) ) :
                ?>
                <img
                    class="logo"
                    src="<?php esc_url(header_image()); ?>"
                    height="<?php echo esc_attr(get_custom_header()->height); ?>"
                    width="<?php echo esc_attr(get_custom_header()->width); ?>"
                    alt="<?php bloginfo('name'); ?>"
                />
                <?php endif; ?>

                <?php if ( is_front_page() ) : ?>
                <h1 class="site-title">
                    <?php bloginfo('name'); ?>
                </h1>
                <?php else : ?>
                <p class="site-title">
                    <?php bloginfo('name'); ?>
                </p>
                <?php endif; ?>
                <p class="site-description">
                    <?php bloginfo('description'); ?>
                </p>

            </a>
        </div>

    </header>

<div class="notepad-top"></div>
