<?php
/**
 * Theme Information Page
 *
 * @package     Authors Notepad
 * @since       1.9
 * @author      Space X-Chimp
 * @copyright   Copyright (c) 2015-2018, Space X-Chimp
 * @link        https://www.spacexchimp.com/themes/authors-notepad.html
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
 */

/* Add some CSS so we can Style the Theme Options Page */
function anarcho_include_theme_options_style() {
    wp_enqueue_style('anarcho_theme_options_styles', get_template_directory_uri() . '/inc/theme_info.css', false, '1.0');
    wp_enqueue_style('anarcho_theme_options_font_awesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.css', 'screen');
}
add_action( 'admin_print_styles-appearance_page_theme_options', 'anarcho_include_theme_options_style' );

/* Create the Theme Information page (Theme Options) */
function anarcho_theme_options_do_page() {

    $anarcho_spacexchimp_logo = get_template_directory_uri() . '/images/theme_info/spacexchimp-logo.png';
    $anarcho_spacexchimp_banner = get_template_directory_uri() . '/images/theme_info/spacexchimp-banner.png';
    $anarcho_spacexchimp_uri = "https://www.spacexchimp.com";
    $anarcho_theme_uri = "https://www.spacexchimp.com/themes/authors-notepad.html";
    $anarcho_donate_link = "https://www.spacexchimp.com/donate.html";
    $anarcho_donate_image = get_template_directory_uri() . '/images/theme_info/donate.png';

    ?>
    <div class="cover">
        <header id="header"></header>
        <section id="page">

            <div class="content">

                <h3>
                    <?php _e( 'Theme "Author\'s Notepad"', 'authors-notepad-arthur' ); ?>
                </h3>
                <h4>
                    <a title="Space X-Chimp" target="_blank" href="<?php echo $anarcho_spacexchimp_uri; ?>">
                        <?php _e( 'by Space X-Chimp', 'authors-notepad-arthur' ); ?>
                    </a>
                </h4>
                <p>
                    <a title="Space X-Chimp" target="_blank" href="<?php echo $anarcho_spacexchimp_uri; ?>">
                        <img src="<?php echo $anarcho_spacexchimp_logo; ?>" alt="Space X-Chimp" width="170" height="170" class="alignleft size-thumbnail logo-img" />
                    </a>
                    <?php _e( 'We designed this premium WordPress theme for your personal blogs and diaries. This theme is perfect for writers and artists. "Authors Notepad" can be easily customized and already translated to different languages. It utilizes latest HTML-5, CSS-3, PHP and WordPress native functions for creating the awesomeness that looks good on every browser. We are constantly adding new features to this theme to allow you to personalize it to your own needs. We are glad to present you this premium theme. Enjoy!', 'authors-notepad-arthur' ); ?>
                </p>

                <h4>
                    <i class="fa fa-cogs"></i>
                    <?php _e( 'Features', 'authors-notepad-arthur' ); ?>
                </h4>
                <ul class="fa-ul">
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Responsive & Mobile optimized design', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Cross browser compatible (work smooth in any modern browser)', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'RTL compatible (right to left)', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Ready for translation (Translated to 13 languages)', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Hand-coded, no WYSIWYG stuff', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'HTML5 Inside', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'CSS3 Inside', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Easy to set up - Theme Customizer', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Customize using "Google Web Fonts"', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Built-in iconic font "Font Awesome"', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Widget ready (in sidebar and footer)', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Built-in Pagination', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Built-in Breadcrumbs', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Template page "HTML map of the website"', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Template page "Without date"', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Block "About Author" below posts', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Custom text of copyright below posts', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Custom text of copyright in footer', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Custom header image', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Custom background', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'Custom menu', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-check-square-o"></i><?php _e( 'And many more...', 'authors-notepad-arthur' ); ?></li>
                    <li type="none"><i class="fa-li fa fa-square-o"></i><?php _e( 'Got more ideas? Tell us!', 'authors-notepad-arthur' ); ?></li>
                </ul>
                <p>
                    <?php
                        printf(
                            __( 'If you have any questions or suggestions for improving and adding new features, feel free to %1$s contact us %2$s.', 'authors-notepad-arthur' ),
                            '<a href="https://www.spacexchimp.com/contact.html" target="_blank">',
                            '</a>'
                        );
                    ?>
                </p>

                <h4>
                    <i class="fa fa-globe"></i>
                    <?php _e( 'Translation', 'authors-notepad-arthur' ); ?>
                </h4>
                <p>
                    <?php _e( 'This theme is ready for translation. It written on <strong>English</strong> and translated into:', 'authors-notepad-arthur' ); ?>
                </p>
                <ul class="fa-ul">
                    <li type="none"><i class="fa-li fa fa-check-circle"></i><strong>Russian</strong> (translated by <strong>Arthur Gareginyan</strong>)</li>
                    <li type="none"><i class="fa-li fa fa-check-circle"></i><strong>Ukrainian</strong> (translated by <strong>Svetlana Drotyanko</strong>)</li>
                    <li type="none"><i class="fa-li fa fa-check-circle"></i><strong>Slovak</strong> (translated by <strong>Martin Petrus</strong>)</li>
                    <li type="none"><i class="fa-li fa fa-check-circle"></i><strong>Afrikaans</strong> (translated by <strong>MadriVictor</strong>)</li>
                    <li type="none"><i class="fa-li fa fa-check-circle"></i><strong>Spanish</strong> (translated by <strong>Ivan Ratinoff</strong>)</li>
                    <li type="none"><i class="fa-li fa fa-check-circle"></i><strong>Polish</strong> (translated by <strong>Krzysztof Goral</strong>)</li>
                    <li type="none"><i class="fa-li fa fa-check-circle"></i><strong>German</strong> (translated by <strong>Alexander v. Falkenhausen</strong>)</li>
                    <li type="none"><i class="fa-li fa fa-check-circle"></i><strong>Estonian</strong> (translated by <strong>Taavi Tiitsmaa</strong>)</li>
                    <li type="none"><i class="fa-li fa fa-check-circle"></i><strong>Catalan</strong> (translated by <strong>Nestor Malet</strong>)</li>
                    <li type="none"><i class="fa-li fa fa-check-circle"></i><strong>Danish</strong> (translated by <strong>Chano Klinck Andersen</strong>)</li>
                    <li type="none"><i class="fa-li fa fa-check-circle"></i><strong>French</strong> (translated by <strong>Rolland Dudemaine</strong>)</li>
                    <li type="none"><i class="fa-li fa fa-check-circle"></i><strong>Chinese</strong> (translated by <strong>Weiquan Bao</strong>)</li>
                </ul>
                <p>
                    <?php
                        printf(
                            __( 'If you want to help translate this theme, please use the POT file, that is included and placed in the "languages" folder, in order to create a translation files (*.po, *.mo). Just send the translation files (*.po, *.mo) to us ( %s ) and we will include the translation within the next theme update.', 'authors-notepad-arthur' ),
                            '<a href="https://www.spacexchimp.com/contact.html" target="_blank">www.spacexchimp.com/contact.html</a>'
                        );
                    ?>
                    <?php _e( 'Also you can use an existing PO file that placed in the "languages" folder, in order to make corrections.', 'authors-notepad-arthur' ); ?>
                    <?php _e( 'Many of theme users would be delighted if you share your translation with the community. Thanks for your contribution!', 'authors-notepad-arthur' ); ?>
                </p>
                <p>
                    <em><b><?php _e( 'Thanks to all who helped us translate this theme into other languages!', 'authors-notepad-arthur' ); ?></b></em>
                    <em><b><?php _e( 'Thank you very much for your contribution!', 'authors-notepad-arthur' ); ?></b></em>
                </p>
            </div>

            <aside id="sidebar">

                <div class="donate">
                    <h3>
                        <?php _e( 'Happy to enjoy the theme?', 'authors-notepad-arthur' ); ?>
                    </h3>

                    <p>
                        <a href="<?php echo $anarcho_donate_link; ?>" target="_blank" rel="nofollow">
                            <img class="tc-donate" src="<?php echo $anarcho_donate_image; ?>" alt="Make a donation for Authors-Notepad">
                        </a>
                        <?php _e( 'Thanks for your support!', 'authors-notepad-arthur' ); ?>
                    </p>
                </div>

                <div class="store">
                    <h3>
                        <?php _e( 'Explore our website', 'authors-notepad-arthur' ); ?>
                    </h3>
                    <a href="<?php echo $anarcho_spacexchimp_uri; ?>" title="Space X-Chimp studio" target="_blank">
                        <img src="<?php echo $anarcho_spacexchimp_banner; ?>" alt="Space X-Chimp">
                    </a>
                </div>

            </aside>

            <br clear="all">

        </section>
        <footer id="footer"></footer>

    </div>

    <?php
}
add_action('admin_menu', 'anarcho_theme_options_add_page');

/* Page "Theme info" in dashboard */
function anarcho_theme_options_add_page() {
    add_theme_page(
        __( 'Theme Info' , 'authors-notepad-arthur' ),      // Name of page
        __( 'Theme Info' , 'authors-notepad-arthur' ),      // Label in menu
        'edit_theme_options',                        // Capability required
        'theme_options',                             // Menu slug, used to uniquely identify the page
        'anarcho_theme_options_do_page'              // Function to be called to output the content of this page
    );
}
