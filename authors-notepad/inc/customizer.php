<?php
/**
 * Theme Customizer support
 *
 * @package     Authors Notepad
 * @since       1.9
 * @author      Space X-Chimp
 * @copyright   Copyright (c) 2015-2018, Space X-Chimp
 * @link        https://www.spacexchimp.com/themes/authors-notepad.html
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
 */


/* Implement Theme Customizer additions and adjustments */
function anarcho_customize_register( $wp_customize ) {

    /* Class Anarcho_Customize_Textarea_Control */
    class Anarcho_Customize_Textarea_Control extends WP_Customize_Control {

        public $type = 'textarea';
        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
            <?php
        }
    }

    $wp_customize->remove_section( 'colors' );

    // META SECTION
    $wp_customize->add_section( 'meta_section', array(
        'title'             => __( 'Meta', 'authors-notepad-arthur' ),
        'priority'          => 1,
    ));

        // Label for the search sticker
        $wp_customize->add_setting('search_label', array(
                'default'           => __( 'Search', 'authors-notepad-arthur' ),
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'search_label', array(
                'priority'          => 1,
                'type'              => 'text',
                'label'             => __( 'Label for the search sticker', 'authors-notepad-arthur' ),
                'section'           => 'meta_section',
        ));

        // Placeholder for the search sticker
        $wp_customize->add_setting('search_placeholder', array(
                'default'           => __( 'Write your search and hit Enter', 'authors-notepad-arthur' ),
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'search_placeholder', array(
                'priority'          => 2,
                'type'              => 'text',
                'label'             => __( 'Placeholder for the search sticker', 'authors-notepad-arthur' ),
                'section'           => 'meta_section',
        ));

        // Label for the yellow sticker
        $wp_customize->add_setting('yellow_sticker_label', array(
                'default'           => __( 'PAGES', 'authors-notepad-arthur' ),
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'yellow_sticker_label', array(
                'priority'          => 3,
                'type'              => 'text',
                'label'             => __( 'Label for the yellow sticker', 'authors-notepad-arthur' ),
                'section'           => 'meta_section',
        ));

        // Label for the white sticker
        $wp_customize->add_setting('white_sticker_label', array(
                'default'           => __( 'Recent Posts', 'authors-notepad-arthur' ),
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'white_sticker_label', array(
                'priority'          => 4,
                'type'              => 'text',
                'label'             => __( 'Label for the white sticker', 'authors-notepad-arthur' ),
                'section'           => 'meta_section',
        ));

        // Label for the About widget
        $wp_customize->add_setting('about_label', array(
                'default'           => __( 'About this website', 'authors-notepad-arthur' ),
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'about_label', array(
                'priority'          => 5,
                'type'              => 'text',
                'label'             => __( 'Label for the About widget', 'authors-notepad-arthur' ),
                'section'           => 'meta_section',
        ));

        // Text for the About widget
        $wp_customize->add_setting( 'about_box', array(
                'default'           => __( 'Paste here small text about you and/or about your site.', 'authors-notepad-arthur' ),
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( new Anarcho_Customize_Textarea_Control( $wp_customize, 'about_box', array(
                'priority'          => 6,
                'label'             => __( 'Text for the About widget', 'authors-notepad-arthur' ),
                'section'           => 'meta_section',
                'settings'          => 'about_box',
        )));

        // Label for the Links widget
        $wp_customize->add_setting('links_label', array(
                'default'           => __( 'Friends and Links', 'authors-notepad-arthur' ),
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'links_label', array(
                'priority'          => 7,
                'type'              => 'text',
                'label'             => __( 'Label for the Links widget', 'authors-notepad-arthur' ),
                'section'           => 'meta_section',
        ));

        // Copyright after post
        $wp_customize->add_setting( 'copyright_post', array(
                'default'           => __( 'Copyright 2018. All rights reserved.', 'authors-notepad-arthur' ),
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( new Anarcho_Customize_Textarea_Control( $wp_customize, 'copyright_post', array(
                'priority'          => 8,
                'label'             => __( 'Copyright after post', 'authors-notepad-arthur' ),
                'section'           => 'meta_section',
                'settings'          => 'copyright_post',
        )));

        // Copyright in footer
        $wp_customize->add_setting( 'site-info', array(
                'default'           => __( 'Copyright 2018. All rights reserved.', 'authors-notepad-arthur' ),
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( new Anarcho_Customize_Textarea_Control( $wp_customize, 'site-info', array(
                'priority'          => 9,
                'label'             => __( 'Copyright in footer', 'authors-notepad-arthur' ),
                'section'           => 'meta_section',
                'settings'          => 'site-info',
        )));


    // STUFF SECTION
    $wp_customize->add_section( 'stuff_section', array(
        'title'             => __( 'Stuff', 'authors-notepad-arthur' ),
        'priority'          => 2,
    ));

        // Disable "Paper Search"
        $wp_customize->add_setting('disable_paper_search', array(
                'default'           => '0',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'disable_paper_search', array(
                'priority'          => 1,
                'type'              => 'checkbox',
                'label'             => __( 'Disable "Paper Search"', 'authors-notepad-arthur' ),
                'section'           => 'stuff_section',
        ));

        // Disable Yellow Date Stickers
        $wp_customize->add_setting('disable_stickers', array(
                'default'           => '0',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'disable_stickers', array(
                'priority'          => 2,
                'type'              => 'checkbox',
                'label'             => __( 'Disable "Yellow Date Stickers"', 'authors-notepad-arthur' ),
                'section'           => 'stuff_section',
        ));

        // Disable RSS feed ribbon tag
        $wp_customize->add_setting('disable_rss_icon', array(
                'default'           => '0',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'disable_rss_icon', array(
                'priority'          => 3,
                'type'              => 'checkbox',
                'label'             => __( 'Disable RSS feed ribbon tag', 'authors-notepad-arthur' ),
                'section'           => 'stuff_section',
        ));

        // Disable Yellow Sticker
        $wp_customize->add_setting('disable_yellow_sticker', array(
                'default'           => '0',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'disable_yellow_sticker', array(
                'priority'          => 4,
                'type'              => 'checkbox',
                'label'             => __( 'Disable Yellow Sticker', 'authors-notepad-arthur' ),
                'section'           => 'stuff_section',
        ));

        // Disable widget "About this website"
        $wp_customize->add_setting('disable_about_box', array(
                'default'           => '0',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'disable_about_box', array(
                'priority'          => 5,
                'type'              => 'checkbox',
                'label'             => __( 'Disable widget "About this website"', 'authors-notepad-arthur' ),
                'section'           => 'stuff_section',
        ));

        // Disable widget "Friends & Links"
        $wp_customize->add_setting('disable_links_box', array(
                'default'           => '0',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'disable_links_box', array(
                'priority'          => 6,
                'type'              => 'checkbox',
                'label'             => __( 'Disable widget "Friends & Links"', 'authors-notepad-arthur' ),
                'section'           => 'stuff_section',
        ));

        // Disable Recent Posts Sticker
        $wp_customize->add_setting('disable_recent_sticker', array(
                'default'           => '0',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'disable_recent_sticker', array(
                'priority'          => 7,
                'type'              => 'checkbox',
                'label'             => __( 'Disable "Recent Posts Sticker"', 'authors-notepad-arthur' ),
                'section'           => 'stuff_section',
        ));

        // Disable "About the Author"
        $wp_customize->add_setting('disable_about_bio', array(
                'default'           => '0',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'disable_about_bio', array(
                'priority'          => 8,
                'type'              => 'checkbox',
                'label'             => __( 'Disable block "About the Author"', 'authors-notepad-arthur' ),
                'section'           => 'stuff_section',
        ));

        // Enable "Breadcrumbs"
        $wp_customize->add_setting('enable_breadcrumbs', array(
                'default'           => '0',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'enable_breadcrumbs', array(
                'priority'          => 9,
                'type'              => 'checkbox',
                'label'             => __( 'Enable "Breadcrumbs"', 'authors-notepad-arthur' ),
                'section'           => 'stuff_section',
        ));

        // Enable "Page Navigation"
        $wp_customize->add_setting('enable_page-nav', array(
                'default'           => '1',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'enable_page-nav', array(
                'priority'          => 10,
                'type'              => 'checkbox',
                'label'             => __( 'Enable "Page Navigation"', 'authors-notepad-arthur' ),
                'section'           => 'stuff_section',
        ));

        // Enable Title Animation
        $wp_customize->add_setting('enable_title_animation', array(
                'default'           => '0',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'enable_title_animation', array(
                'priority'          => 11,
                'type'              => 'checkbox',
                'label'             => __( 'Enable "Title animation"', 'authors-notepad-arthur' ),
                'section'           => 'stuff_section',
        ));

        // Disable button "Scroll To Top"
        $wp_customize->add_setting('disable_scroll_to_top', array(
                'default'           => '0',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'disable_scroll_to_top', array(
                'priority'          => 12,
                'type'              => 'checkbox',
                'label'             => __( 'Disable button "Scroll To Top"', 'authors-notepad-arthur' ),
                'section'           => 'stuff_section',
        ));

        // Disable the loading of "Google Fonts"
        $wp_customize->add_setting('disable_google_fonts', array(
                'default'           => '0',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'disable_google_fonts', array(
                'priority'          => 13,
                'type'              => 'checkbox',
                'label'             => __( 'Disable the loading of "Google Fonts" from external servers in order to make the theme a GDPR compliant', 'authors-notepad-arthur' ),
                'section'           => 'stuff_section',
        ));

        // Hide the copyright info of the theme developer in footer
        $wp_customize->add_setting('disable_author_copy', array(
                'default'           => '0',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'disable_author_copy', array(
                'priority'          => 14,
                'type'              => 'checkbox',
                'label'             => __( 'Hide the copyright info of the theme developer in footer', 'authors-notepad-arthur' ),
                'section'           => 'stuff_section',
        ));

        // Show info line in footer
        $wp_customize->add_setting('show_info_line', array(
                'default'           => '0',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'show_info_line', array(
                'priority'          => 15,
                'type'              => 'checkbox',
                'label'             => __( 'Show info line in footer', 'authors-notepad-arthur' ),
                'section'           => 'stuff_section',
        ));

        // Enable number of recent post
        $num_recent_post_array = anarcho_customizer_arrays();
        $wp_customize->add_setting( 'num_recent_post', array(
                'default'           => '6',
                'control'           => 'select',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'num_recent_post', array(
                'label'             => __( 'Numbers of recent posts in sidebar', 'authors-notepad-arthur' ),
                'priority'          => 16,
                'section'           => 'stuff_section',
                'settings'          => 'num_recent_post',
                'type'              => 'select',
                'choices'           => $num_recent_post_array['num_recent_post'],
        ));

    // SCRIPTS SECTION
    $wp_customize->add_section( 'scripts_section', array(
        'title'             => __( 'Scripts', 'authors-notepad-arthur' ),
        'description'       => __( 'Put here your scripts', 'authors-notepad-arthur' ),
        'priority'          => 3,
    ));

        // Scripts before posts
        $wp_customize->add_setting( 'scripts_before_posts', array(
                'default'           => '',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( new Anarcho_Customize_Textarea_Control( $wp_customize, 'scripts_before_posts', array(
                'priority'          => 2,
                'label'             => __( 'Scripts before posts', 'authors-notepad-arthur' ),
                'section'           => 'scripts_section',
                'settings'          => 'scripts_before_posts',
        )));

        // Scripts at the beginning of the posts
        $wp_customize->add_setting( 'scripts_beginning_posts', array(
                'default'           => '',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( new Anarcho_Customize_Textarea_Control( $wp_customize, 'scripts_beginning_posts', array(
                'priority'          => 3,
                'label'             => __( 'Scripts at the beginning of the posts', 'authors-notepad-arthur' ),
                'section'           => 'scripts_section',
                'settings'          => 'scripts_beginning_posts',
        )));

        // Scripts at the end of the posts
        $wp_customize->add_setting( 'scripts_end_posts', array(
                'default'           => '',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( new Anarcho_Customize_Textarea_Control( $wp_customize, 'scripts_end_posts', array(
                'priority'          => 4,
                'label'             => __( 'Scripts at the end of the posts', 'authors-notepad-arthur' ),
                'section'           => 'scripts_section',
                'settings'          => 'scripts_end_posts',
        )));

        // Scripts after posts
        $wp_customize->add_setting( 'scripts_after_posts', array(
                'default'           => '',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( new Anarcho_Customize_Textarea_Control( $wp_customize, 'scripts_after_posts', array(
                'priority'          => 5,
                'label'             => __( 'Scripts after posts', 'authors-notepad-arthur' ),
                'section'           => 'scripts_section',
                'settings'          => 'scripts_after_posts',
        )));

    // POST SECTION
    $wp_customize->add_section( 'post_section', array(
        'title'             => __( 'Post', 'authors-notepad-arthur' ),
        'priority'          => 10,
    ));

        // Post titles font (Google Fonts)
        $post_titles_font_array = anarcho_customizer_arrays();
        $wp_customize->add_setting( 'post_titles_font', array(
                'default'           => '',
                'control'           => 'select',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'post_titles_font', array(
                'label'             => __( 'Post titles font (Google Fonts)', 'authors-notepad-arthur' ),
                'priority'          => 1,
                'section'           => 'post_section',
                'settings'          => 'post_titles_font',
                'type'              => 'select',
                'choices'           => $post_titles_font_array['google_fonts'],
        ));

        // Post titles font size
        $post_titles_font_size_array = anarcho_customizer_arrays();
        $wp_customize->add_setting( 'post_titles_font_size', array(
                'default'           => '180%',
                'control'           => 'select',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'post_titles_font_size', array(
                'label'             => __( 'Post titles font size', 'authors-notepad-arthur' ),
                'priority'          => 2,
                'section'           => 'post_section',
                'settings'          => 'post_titles_font_size',
                'type'              => 'select',
                'choices'           => $post_titles_font_size_array['post_titles_font_size'],
        ));

        // Post titles color
        $wp_customize->add_setting( 'post_titles_color', array(
                'default'           => '#000000',
                'transport'         => 'postMessage',
                'type'              => 'option',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_titles_color', array(
                'label'             => __( 'Post titles color', 'authors-notepad-arthur' ),
                'section'           => 'post_section',
                'settings'          => 'post_titles_color',
                'priority'          => 3,
        )));

        // Post titles position
        $wp_customize->add_setting( 'post_titles_position', array(
                'default'           => 'center',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'post_titles_position', array(
                'label'             => __( 'Post titles position', 'authors-notepad-arthur' ),
                'section'           => 'post_section',
                'settings'          => 'post_titles_position',
                'priority'          => 4,
                'type'              => 'radio',
                'choices'           => array(
                                              'left'      => __( 'Left', 'authors-notepad-arthur' ),
                                              'center'    => __( 'Center', 'authors-notepad-arthur' )
                                             ),
        ));

        // Posts font (Google Fonts)
        $post_font_array = anarcho_customizer_arrays();
        $wp_customize->add_setting( 'post_font', array(
                'default'           => '',
                'control'           => 'select',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'post_font', array(
                'label'             => __( 'Font of posts (Google Fonts)', 'authors-notepad-arthur' ),
                'priority'          => 5,
                'section'           => 'post_section',
                'settings'          => 'post_font',
                'type'              => 'select',
                'choices'           => $post_font_array['google_fonts'],
        ));

        // Posts font size
        $post_font_size_array = anarcho_customizer_arrays();
        $wp_customize->add_setting( 'post_font_size', array(
                'default'           => '100%',
                'control'           => 'select',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'post_font_size', array(
                'label'             => __( 'Font size of posts', 'authors-notepad-arthur' ),
                'priority'          => 6,
                'section'           => 'post_section',
                'settings'          => 'post_font_size',
                'type'              => 'select',
                'choices'           => $post_font_size_array['post_font_size'],
        ));

    // HEADER SECTION


    // TITLE SECTION

        // Title font (Google Fonts)
        $title_font_array = anarcho_customizer_arrays();
        $wp_customize->add_setting( 'titlefontstyle_setting', array(
                'default'           => 'IM+Fell+English+SC',
                'control'           => 'select',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'titlefontstyle_control', array(
                'label'             => __( 'Site Title font (Google Fonts)', 'authors-notepad-arthur' ),
                'priority'          => 10,
                'section'           => 'title_tagline',
                'settings'          => 'titlefontstyle_setting',
                'type'              => 'select',
                'choices'           => $title_font_array['google_fonts'],
        ));

        // Tagline font (Google Fonts)
        $tagline_font_array = anarcho_customizer_arrays();
        $wp_customize->add_setting( 'taglinefontstyle_setting', array(
                'default'           => 'IM+Fell+English+SC',
                'control'           => 'select',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'taglinefontstyle_control', array(
                'label'             => __( 'Site Tagline font (Google Fonts)', 'authors-notepad-arthur' ),
                'priority'          => 11,
                'section'           => 'title_tagline',
                'settings'          => 'taglinefontstyle_setting',
                'type'              => 'select',
                'choices'           => $tagline_font_array['google_fonts'],
        ));

        // Title color
        $wp_customize->add_setting( 'title_color', array(
                'default'           => '#e5e5e5',
                'transport'         => 'postMessage',
                'type'              => 'option',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_color', array(
                'label'             => __( 'Site Title color', 'authors-notepad-arthur' ),
                'section'           => 'title_tagline',
                'settings'          => 'title_color',
                'priority'          => 12,
        )));

        // Tagline color
        $wp_customize->add_setting( 'tagline_color', array(
                'default'           => '#cacaca',
                'transport'         => 'postMessage',
                'type'              => 'option',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tagline_color', array(
                'label'             => __( 'Site Tagline color', 'authors-notepad-arthur' ),
                'section'           => 'title_tagline',
                'settings'          => 'tagline_color',
                'priority'          => 13,
        )));

        // Title position
        $wp_customize->add_setting( 'title_position', array(
                'default'           => 'left',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'title_position', array(
                'label'             => __( 'Site Title position', 'authors-notepad-arthur' ),
                'section'           => 'title_tagline',
                'settings'          => 'title_position',
                'priority'          => 14,
                'type'              => 'radio',
                'choices'           => array(
                                              'left'      => __( 'Left', 'authors-notepad-arthur' ),
                                              'center'    => __( 'Center', 'authors-notepad-arthur' )
                                            ),
        ));

        // Title font size
        $title_font_size_array = anarcho_customizer_arrays();
        $wp_customize->add_setting( 'title_font_size', array(
                'default'           => '300%',
                'control'           => 'select',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'title_font_size', array(
                'label'             => __( 'Font size of Title', 'authors-notepad-arthur' ),
                'priority'          => 15,
                'section'           => 'title_tagline',
                'settings'          => 'title_font_size',
                'type'              => 'select',
                'choices'           => $title_font_size_array['title_font_size'],
        ));

        // Tagline font size
        $tagline_font_size_array = anarcho_customizer_arrays();
        $wp_customize->add_setting( 'tagline_font_size', array(
                'default'           => '140%',
                'control'           => 'select',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'tagline_font_size', array(
                'label'             => __( 'Font size of Tagline', 'authors-notepad-arthur' ),
                'priority'          => 16,
                'section'           => 'title_tagline',
                'settings'          => 'tagline_font_size',
                'type'              => 'select',
                'choices'           => $tagline_font_size_array['tagline_font_size'],
        ));

    // BACKGROUND SECTION
    $wp_customize->get_section( 'background_image' );

        // Background color
        $wp_customize->add_setting( 'background_color' , array(
                'default'           => '000000',
                'transport'         => 'postMessage',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
                'label'             => __( 'Background Color', 'authors-notepad-arthur' ),
                'section'           => 'background_image',
        )));

        // Add the option to use the CSS3 property Background-size
        $wp_customize->add_setting( 'backgroundsize_setting', array(
                'default'           => 'auto',
                'control'           => 'select',
                'sanitize_callback' => 'esc_attr',
        ));
        $wp_customize->add_control( 'backgroundsize_control', array(
                'label'             => __( 'Background Size', 'authors-notepad-arthur' ),
                'section'           => 'background_image',
                'settings'          => 'backgroundsize_setting',
                'priority'          => 10,
                'type'              => 'radio',
                'choices'           => array(
                                              'auto'      => __( 'Auto (Default)', 'authors-notepad-arthur' ),
                                              'contain'   => __( 'Contain', 'authors-notepad-arthur' ),
                                              'cover'     => __( 'Cover', 'authors-notepad-arthur' ),
                                            ),
        ));

}
add_action( 'customize_register', 'anarcho_customize_register' );

/* Inject the Customizer Choices into the Theme */
function anarcho_inline_css() {

    if ( get_theme_mod('enable_title_animation') == '1' ) {
        echo '
            <script>
                var tit=document.title,c=0;
                function writetitle() {
                        document.title=tit.substring(0,c);c==tit.length?(c=0,setTimeout("writetitle()",3E3)):(c++,setTimeout("writetitle()",200))
                }
                writetitle();
            </script>
            ' . "\n";
    }

    /* Load the user selected fonts from the Google Fonts online library */
    if ( get_theme_mod('disable_google_fonts') != '1' ) {
        $fonts_array = array();
        $fonts_array[] = 'Indie+Flower';
        $fonts_array[] = get_theme_mod( 'titlefontstyle_setting', 'IM+Fell+English+SC' );
        $fonts_array[] = get_theme_mod( 'taglinefontstyle_setting', 'IM+Fell+English+SC' );
        $fonts_array[] = get_theme_mod( 'post_titles_font', '' );
        $fonts_array[] = get_theme_mod( 'post_font', '' );
        $fonts_array = array_unique( $fonts_array );
        foreach ( $fonts_array as $key => $value ) {
            if ( !empty( $value ) ) {
                echo "<link href='//fonts.googleapis.com/css?family=" . $value . "' rel='stylesheet' type='text/css'>"  . "\n";
            }
        }
    }

    ?>
        <style type="text/css" media="screen">
    <?php

    /* Background-size */
    $background_size = get_theme_mod( 'backgroundsize_setting' );
    ?>
        body.custom-background {
            -webkit-background-size: <?php echo $background_size; ?>;
            -moz-background-size: <?php echo $background_size; ?>;
            -o-background-size: <?php echo $background_size; ?>;
            background-size: <?php echo $background_size; ?>;
        }
    <?php

    /* Has the text been hidden? */
    if ( ! display_header_text() ) {
    ?>
        .site-title,
        .site-description {
            position: absolute;
            clip: rect(1px 1px 1px 1px); /* IE7 */
            clip: rect(1px, 1px, 1px, 1px);
        }
    <?php
    }

    /* Title & Description */
    $title_font = get_theme_mod( 'titlefontstyle_setting', 'IM+Fell+English+SC' );
    $title_font = preg_replace('/[^a-zA-Z0-9]+/', ' ', $title_font);
    $title_font_size = get_theme_mod('title_font_size');
    $title_color = get_option('title_color');
    ?>
        .site-title {
            font-family: <?php echo $title_font; ?>;
            font-size: <?php echo $title_font_size; ?>;
            color: <?php echo $title_color; ?>;
        }
    <?php
    $tagline_font = get_theme_mod( 'taglinefontstyle_setting', 'IM+Fell+English+SC' );
    $tagline_font = preg_replace('/[^a-zA-Z0-9]+/', ' ', $tagline_font);
    $tagline_font_size = get_theme_mod('tagline_font_size');
    $tagline_color = get_option( 'tagline_color', '#cacaca' );
    ?>
        .site-description {
            font-family: <?php echo $tagline_font; ?>;
            font-size: <?php echo $tagline_font_size; ?>;
            color: <?php echo $tagline_color; ?>;
        }
    <?php

    /* Title Position. */
    if ( get_theme_mod('title_position') == 'center' ) {
    ?>
        #title { margin-left: 20%; }
    <?php
    }

    /* Post */
    $post_titles_font = get_theme_mod( 'post_titles_font', 'Forum' );
    $post_titles_font = preg_replace('/[^a-zA-Z0-9]+/', ' ', $post_titles_font);
    $post_titles_font_size = get_theme_mod( 'post_titles_font_size', '180%' );
    $post_titles_color = get_option( 'post_titles_color', '#000' );
    $post_titles_position = get_theme_mod( 'post_titles_position', 'center' );
    ?>
        #content .col01 .post-title {
            font-family: <?php echo $post_titles_font; ?>;
            font-size: <?php echo $post_titles_font_size; ?>;
            color: <?php echo $post_titles_color; ?>;
            text-align: <?php echo $post_titles_position; ?>;
        }
    <?php
    $post_font = get_theme_mod( 'post_font', 'Forum' );
    $post_font = preg_replace('/[^a-zA-Z0-9]+/', ' ', $post_font);
    $post_font_size = get_theme_mod( 'post_font_size', '' );
    ?>
        #content .col01 .post-inner {
            font-family: <?php echo $post_font; ?>;
            font-size: <?php echo $post_font_size; ?>;
        }
    <?php

    /* Disable Paper Search */
    if ( get_theme_mod('disable_paper_search') == '1' ) {
    ?>
        .logo { margin-top: 4%; }
        .site-title { margin-top: 4%; }
        .site-header {
            margin-top: -2.8%; }
        .top-search-form {
            position: absolute;
            clip: rect(1px 1px 1px 1px); /* IE7 */
            clip: rect(1px, 1px, 1px, 1px); }
    <?php
    }
    ?>
        </style>
    <?php

}
add_action( 'wp_head', 'anarcho_inline_css' );

function anarcho_customizer_live_preview() {
    wp_enqueue_script(
        'anarcho-themecustomizer',
        get_template_directory_uri().'/js/theme-customizer.js',
        array( 'jquery','customize-preview' ),
        '',
        true
    );
}
add_action( 'customize_preview_init', 'anarcho_customizer_live_preview' );
