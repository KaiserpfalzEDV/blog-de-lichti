<?php
/**
 * The sidebar containing the secondary widget area, displays on posts and pages.
 *
 * @package     Authors Notepad
 * @since       1.9
 * @author      Space X-Chimp
 * @copyright   Copyright (c) 2015-2018, Space X-Chimp
 * @link        https://www.spacexchimp.com/themes/authors-notepad.html
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
 */
?>

<aside id="sidebar" role="complementary">

    <!--FOLLOW-->
    <?php if ( get_theme_mod('disable_rss_icon') !== '1' ) { ?>
    <div class="follow">
        <a href="http://click-to-follow.me" target="_blank" rel="nofollow">
            <img src="<?php echo get_template_directory_uri(); ?>/images/follow.png" alt="RSS" />
        </a>
    </div>
    <?php } ?>
    <!--END-FOLLOW-->

    <!--YELLOW STICKER-->
    <?php if ( get_theme_mod('disable_yellow_sticker') !== '1' ) { ?>
    <div class="yellow-sticker-top"></div>
    <div class="yellow-sticker-clip"></div>
    <div class="yellow-sticker-label">
        <?php
            $yellow_sticker_label = __( 'PAGES', 'authors-notepad-arthur' );
            echo esc_html( get_theme_mod( 'yellow_sticker_label', $yellow_sticker_label ) );
        ?>
    </div>
    <nav class="yellow-sticker-middle">
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </nav>
    <div class="yellow-sticker-bottom"></div>
    <?php } ?>
    <!--END-YELLOW STICKER-->

    <?php dynamic_sidebar( 'sidebar-1' ); ?>

    <!--ABOUT (WIDGET)-->
    <?php if ( get_theme_mod('disable_about_box') !== '1' ) { ?>
    <?php
        $about_label = __( 'About this website', 'authors-notepad-arthur' );
        echo '<div class="about-label">' . esc_html( get_theme_mod( 'about_label', $about_label ) ) . '</div>';
    ?>
    <div class="about-widget">
        <p>
            <?php
                $about_text = __( 'Paste here small text about you and/or about your site.', 'authors-notepad-arthur' );
                echo sanitize_text_field( get_theme_mod( 'about_box', $about_text ) );
            ?>
        </p>
    </div>
    <?php } ?>
    <!--END-ABOUT (WIDGET)-->

    <?php dynamic_sidebar( 'sidebar-2' ); ?>

    <!--LINKS (WIDGET)-->
    <?php if ( get_theme_mod('disable_links_box') !== '1' ) { ?>
    <?php
        $links_label = __( 'Friends and Links', 'authors-notepad-arthur' );
        echo '<div class="links-label">' . esc_html( get_theme_mod( 'links_label', $links_label ) ) . '</div>';
    ?>
    <div class="links-widget">
        <p>
            <ul>
                <?php wp_list_bookmarks('categorize=0&title_li=&orderby=rating'); ?>
            </ul>
        </p>
    </div>
    <?php } ?>
    <!--END-LINKS (WIDGET)-->

    <?php dynamic_sidebar( 'sidebar-3' ); ?>

    <!--WHITE STICKER-->
    <?php if ( get_theme_mod('disable_recent_sticker') !== '1' ) { ?>
    <div class="white-sticker-top"></div>
    <div class="white-sticker-clip"></div>
    <div class="white-sticker-label">
        <?php
            $white_sticker_label = __( 'Recent Posts', 'authors-notepad-arthur' );
            echo esc_html( get_theme_mod( 'white_sticker_label', $white_sticker_label ) );
        ?>
    </div>
    <nav class="white-sticker-middle">
        <?php $num_recent_post = get_theme_mod('num_recent_post'); ?>
        <?php $query = new WP_Query( array( 'posts_per_page' => $num_recent_post ) ); ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <ul>
            <li>
                <a href="<?php the_permalink(); ?>">
                    <i class="fa fa-asterisk"></i>
                    <?php the_title(); ?>
                </a>
            </li>
        </ul>
        <?php endwhile; ?>
    </nav>
    <div class="white-sticker-bottom"></div>
    <?php } ?>
    <!--END-WHITE STICKER-->

    <?php dynamic_sidebar( 'sidebar-4' ); ?>

</aside>

<br clear="all">
