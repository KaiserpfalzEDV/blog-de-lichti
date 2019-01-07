<?php
/**
 * The template for displaying Search Results pages.
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

        <div id="breadcrumbs">
            <span>
                <?php
                    printf(
                        'Search Results for: %s',
                        get_search_query()
                    );
                ?>
            </span>
        </div>

        <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php anarcho_date_tag(); ?>

            <h2 class="post-title">
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'authors-notepad-arthur' ); ?> <?php the_title(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>

            <div class="post-inner">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
                <?php the_content( __( 'Continue reading', 'authors-notepad-arthur' ) ); ?>
            </div>

            <?php anarcho_entry_meta(); ?>

        </article>

        <?php endwhile; ?>

        <?php anarcho_page_nav(); ?>

        <?php else : ?>
            <?php echo _e( 'Sorry for your result nothing found', 'authors-notepad-arthur' ); ?>
        <?php endif; ?>

    </div>

    <?php get_sidebar(); ?>

</section>

<br clear="all">

<?php get_footer(); ?>
