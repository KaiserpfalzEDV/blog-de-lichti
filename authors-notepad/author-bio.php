<?php
/**
 * The template for displaying Author bios.
 *
 * @package     Authors Notepad
 * @since       1.9
 * @author      Space X-Chimp
 * @copyright   Copyright (c) 2015-2018, Space X-Chimp
 * @link        https://www.spacexchimp.com/themes/authors-notepad.html
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
 */
?>

<div class="author-info">
    <div class="author-avatar">
        <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'anarcho_author_bio_avatar_size', 80 ) ); ?>
    </div>
    <div class="author-description">
        <h2 class="author-title">
            <?php _e( 'About the Author', 'authors-notepad-arthur' ); ?>
        </h2>
        <p class="author-bio">
            <?php the_author_meta( 'description' ); ?>
            <a
               class="author-link"
               href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
               rel="author"
            >
                <?php printf( __( 'View all posts by %s', 'authors-notepad-arthur' ), get_the_author() ); ?>
            </a>
        </p>
    </div>
</div>
