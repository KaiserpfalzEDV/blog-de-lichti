<?php
/**
 * The template for displaying 404 pages (Not Found).
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

        <!-- YOU CAN EDIT FROM HERE -->

        <h1>
            <?php _e( 'Page Not Found', 'authors-notepad-arthur' ); ?>
        </h1>
        <p>
            <?php _e( 'We\'re very sorry, but the page you requested has not been found! It may have been moved or deleted.', 'authors-notepad-arthur' ); ?>
        </p>
        <p>
            <?php _e( 'I\'m not blaming you, but have you checked your address bar? There might be a typo in the URL.', 'authors-notepad-arthur' ); ?>
        </p>
        <p>
            <?php _e( 'If there isn\'t, you could try searching my website for the content you were looking for:', 'authors-notepad-arthur' ); ?>
        </p>

        <?php get_search_form(); ?>

        <!-- YOU CAN EDIT UP TO HERE -->

    </div>

    <?php get_sidebar(); ?>

</section>

<br clear="all">

<?php get_footer(); ?>
