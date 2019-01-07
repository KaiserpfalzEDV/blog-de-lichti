<?php
/**
 * The template for displaying Author page.
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

        <div class="post-inner">

            <?php
                $curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
                $nickname = $curauth->nickname;
                $user_description = $curauth->user_description;
                $user_url = $curauth->user_url;
            ?>

            <h1 class="post-title">
                <?php _e( 'Author:', 'authors-notepad-arthur' ); ?>
                <?php echo $nickname; ?>
            </h1>

            <div class="author-avatar-big">
                <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'anarcho_author_bio_avatar_size', 80 ) ); ?>
            </div>

            <dl>
                <dt>
                    <?php _e( 'Profile:', 'authors-notepad-arthur' ); ?>
                </dt>
                <dd>
                    <?php echo $user_description; ?>
                </dd>
                <dt>
                    <?php _e( 'Website:', 'authors-notepad-arthur' ); ?>
                </dt>
                <dd>
                    <a href="<?php echo $user_url; ?>">
                        <?php echo $user_url; ?>
                    </a>
                </dd>
                <dt>
                    <?php _e( 'Posts:', 'authors-notepad-arthur' ); ?>
                </dt>
            </dl>

            <ul>
                <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                <li>
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
                        <?php the_title(); ?>
                    </a>
                    ,
                    <?php the_time('d M Y'); ?>
                    <?php _e( 'in', 'authors-notepad-arthur' ); ?>
                    <?php the_category(' & ');?>
                </li>

                <?php endwhile; ?>

                <?php else : ?>
                <p>
                    <?php _e( 'No posts by this author.', 'authors-notepad-arthur' ); ?>
                </p>
                <?php endif; ?>
            </ul>

        </div>

    </div>

    <?php get_sidebar(); ?>

</section>

<br clear="all">

<?php get_footer(); ?>
