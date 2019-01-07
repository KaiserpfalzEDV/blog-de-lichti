<?php
/**
 * The template for displaying Searchform (HTML5).
 *
 * @package     Authors Notepad
 * @since       1.9
 * @author      Space X-Chimp
 * @copyright   Copyright (c) 2015-2018, Space X-Chimp
 * @link        https://www.spacexchimp.com/themes/authors-notepad.html
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
 */
?>

<div id="search">

    <?php
        $search_placeholder_default_text = __( 'Write your search and hit Enter', 'authors-notepad-arthur' );
        $search_placeholder_text = esc_html( get_theme_mod( 'search_placeholder', $search_placeholder_default_text ) );
    ?>

    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url() ); ?>">
        <label>
            <span class="screen-reader-text">
                <?php _e( 'Search for:', 'authors-notepad-arthur' ); ?>
            </span>
            <input type="search" class="search-field" placeholder="<?php echo $search_placeholder_text; ?>" value="" name="s" title="<?php _e( 'Search', 'authors-notepad-arthur' ); ?>" />
        </label>
        <input type="submit" class="search-submit" value="<?php _e( 'Search', 'authors-notepad-arthur' ); ?>" />
    </form>
</div>
