<?php
/**
 * The template for displaying all pages.
 *
 * @package     Authors Notepad
 * @since       1.9
 * @author      Space X-Chimp
 * @copyright   Copyright (c) 2015-2018, Space X-Chimp
 * @link        https://www.spacexchimp.com/themes/authors-notepad.html
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
 */
?>

<?php get_header(); ?>

<section id="content" role="main">
    <div class="col01">

        <?php anarcho_breadcrumbs(); ?>

        <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php anarcho_date_tag(); ?>

            <h1 class="post-title">
                <?php the_title(); ?>
            </h1>

            <div class="post-inner">
                <?php the_post_thumbnail(); ?>
                <?php the_content( __( 'Continue reading', 'authors-notepad-arthur' ) ); ?>
            </div>

            <?php anarcho_entry_meta(); ?>

        </article>

        <?php comments_template(); ?>

        <?php endwhile; ?>

        <?php else : ?>
            <?php anarcho_not_found(); ?>
        <?php endif; ?>

    </div>

    <?php get_sidebar(); ?>

</section>

<br clear="all">

<?php get_footer(); ?>
