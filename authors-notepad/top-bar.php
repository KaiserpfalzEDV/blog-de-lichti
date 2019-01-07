<?php
/**
 * The top bar containing the navigation menu for mobile devices, displays on every pages.
 *
 * @package     Authors Notepad
 * @since       1.0
 * @author      Space X-Chimp
 * @copyright   Copyright (c) 2015-2018, Space X-Chimp
 * @link        https://www.spacexchimp.com/themes/authors-notepad.html
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
 */
?>


<div class="top-bar">

    <div class="container">

        <!--NAVIGATION (MOBILE)-->
        <div class="primary-mobile-nav-trigger">
            <a href="#menu" class="menu-icon">Menu</a>
        </div>
        <nav class="primary-mobile-nav">
            <?php wp_nav_menu( array( 'theme_location' => 'primary mobile', 'menu_class' => 'primary-mobile-nav-list' ) ); ?>
        </nav>
        <!--END-NAVIGATION (MOBILE)-->

    </div>

</div>
