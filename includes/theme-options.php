<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "nevada_option";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your nevadaobal variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Sample Options', 'nevada' ),
        'page_title'           => esc_html__( 'Sample Options', 'nevada' ),
        // You will need to generate a Goonevadae API key to use this feature.
        // Please visit: https://developers.goonevadae.com/fonts/docs/developer_api#Auth
        'goonevadae_api_key'       => '',
        // Set it you want goonevadae fonts to update weekly. A goonevadae_api_key value is required.
        'goonevadae_update_weekly' => false,
        // Must be defined to add goonevadae fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_goonevadae_fonts_link' => true,                    // Disable this in case you want to create your own goonevadae fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'nevadaobal_variable'      => '',
        // Set a different name for your nevadaobal variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // nevadaobal shut-off for dynamic CSS output by the framework. Will also disable goonevadae fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and goonevadae fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
    // Footer Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer Fields', 'nevada' ),
        'id'               => 'footer section',
        'desc'             => __( 'Footer options', 'nevada' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-asterisk',
        'fields'           => array(
            array(
                'id'       => 'store-description',
                'type'     => 'textarea',
                'title'    => __( 'Footer Phone', 'nevada' ),
                'subtitle' => __( 'Description field', 'nevada' ),
                'desc'     => __( 'Insert store description', 'nevada' ),
                'default'  => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus distinctio nam eum cumque porro, delectus consequuntur saepe quod maxime odio voluptates ipsum ipsam, dolores, tenetur nesciunt nobis quisquam officiis neque.')
            ),
             array(
                'id'       => 'social-title',
                'type'     => 'text',
                'title'    => __( 'Social Title', 'nevada' ),
                'subtitle' => __( 'Social title', 'nevada' ),
                'desc'     => __( 'Insert social title', 'nevada' ),
                'default'  => __('Connect with us:')
            ),
              array(
                'id'       => 'social-facebook',
                'type'     => 'text',
                'title'    => __( 'Facebook link - URL', 'nevada' ),
                'subtitle' => __( 'This must be a URL', 'nevada' ),
                'desc'     => __( 'Insert your facebook URL', 'nevada' ),
                'validate' => 'url',
                'default'  => 'http://facebook.com',
            ),
              array(
                'id'       => 'social-twitter',
                'type'     => 'text',
                'title'    => __( 'Twitter link - URL', 'nevada' ),
                'subtitle' => __( 'This must be a URL', 'nevada' ),
                'desc'     => __( 'Insert your twitter URL', 'nevada' ),
                'validate' => 'url',
                'default'  => 'http://twitter.com',
            ),
              array(
                'id'       => 'social-youtube',
                'type'     => 'text',
                'title'    => __( 'Youtube link - URL', 'nevada' ),
                'subtitle' => __( 'This must be a URL', 'nevada' ),
                'desc'     => __( 'Insert your youtube URL', 'nevada' ),
                'validate' => 'url',
                'default'  => 'http://youtube.com',
            ),
              array(
                'id'       => 'social-instagram',
                'type'     => 'text',
                'title'    => __( 'Instagram link - URL', 'nevada' ),
                'subtitle' => __( 'This must be a URL', 'nevada' ),
                'desc'     => __( 'Insert your instagram URL', 'nevada' ),
                'validate' => 'url',
                'default'  => 'http://instagram.com',
            ),
              array(
                'id'       => 'newsletter-title',
                'type'     => 'text',
                'title'    => __( 'Newsletter Title', 'nevada' ),
                'subtitle' => __( 'Newsletter title', 'nevada' ),
                'desc'     => __( 'Insert newsletter title', 'nevada' ),
                'default'  => __('Sign Up For Our Newsletter!')
            ),
              array(
                'id'       => 'newsletter-entry_description',
                'type'     => 'text',
                'title'    => __( 'Newsletter Title', 'nevada' ),
                'subtitle' => __( 'Newsletter entry description', 'nevada' ),
                'desc'     => __( 'Insert newsletter entry description', 'nevada' ),
                'default'  => __('Subscribe to our newsletter!')
            ),
              array(
                'id'       => 'newsletter-description',
                'type'     => 'textarea',
                'title'    => __( 'newsletter-description', 'nevada' ),
                'subtitle' => __( 'Description field', 'nevada' ),
                'desc'     => __( 'Insert newsletter description', 'nevada' ),
                'default'  => __('Vel lorem ipsum. Lorem molestie odio. Interdum et malesuada fames ac ante ipsum primis in faucibus.')
            ),
              array(
                'id'       => 'mail_title',
                'type'     => 'text',
                'title'    => __( 'Email title', 'nevada' ),
                'subtitle' => __( 'Email title', 'nevada' ),
                'desc'     => __( 'Insert email title', 'nevada' ),
                'default'  => __('Email:')
            ),
            array(
                'id'       => 'contacts_title',
                'type'     => 'text',
                'title'    => __( 'Contacts Title', 'nevada' ),
                'subtitle' => __( 'Contacts Title', 'nevada' ),
                'desc'     => __( 'Insert the title', 'nevada' ),
                'default'  => __('Get In Touch With Us')
            ),
            array(
                'id'       => 'street_address',
                'type'     => 'text',
                'title'    => __( 'Street address', 'nevada' ),
                'subtitle' => __( 'Street address', 'nevada' ),
                'desc'     => __( 'Insert street address', 'nevada' ),
                'default'  => __('159 Barking Road')
            ), 
            array(
                'id'       => 'city_index',
                'type'     => 'text',
                'title'    => __( 'City&Index', 'nevada' ),
                'subtitle' => __( 'City&Index', 'nevada' ),
                'desc'     => __( 'Insert city&index', 'nevada' ),
                'default'  => __('San Diego, CA 21012')
            ),
            array(
                'id'       => 'country',
                'type'     => 'text',
                'title'    => __( 'Country', 'nevada' ),
                'subtitle' => __( 'Country', 'nevada' ),
                'desc'     => __( 'Insert country', 'nevada' ),
                'default'  => __('United States')
            ),
            array(
                'id'       => 'delivery_title',
                'type'     => 'text',
                'title'    => __( 'Delivery title', 'nevada' ),
                'subtitle' => __( 'Delivery title', 'nevada' ),
                'desc'     => __( 'Insert delivery title', 'nevada' ),
                'default'  => __('Delivery Hours:')
            ),
            array(
                'id'       => 'delivery_hours_1',
                'type'     => 'text',
                'title'    => __( 'Delivery hours 1', 'nevada' ),
                'subtitle' => __( 'Delivery hours 1', 'nevada' ),
                'desc'     => __( 'Insert delivery hours 1', 'nevada' ),
                'default'  => __('Mondy – Friday: 9 am – 5 pm')
            ),
            array(
                'id'       => 'delivery_hours_2',
                'type'     => 'text',
                'title'    => __( 'Delivery hours 2', 'nevada' ),
                'subtitle' => __( 'Delivery hours 2', 'nevada' ),
                'desc'     => __( 'Insert delivery hours 2', 'nevada' ),
                'default'  => __('Saturday: 9 am – 1pm')
            ),
            array(
                'id'       => 'delivery_hours_3',
                'type'     => 'text',
                'title'    => __( 'Delivery hours 3', 'nevada' ),
                'subtitle' => __( 'Delivery hours 3', 'nevada' ),
                'desc'     => __( 'Insert delivery hours 3', 'nevada' ),
                'default'  => __('Sunday: Closed')
            ),
            array(
                'id'       => 'phone',
                'type'     => 'text',
                'title'    => __( 'Phone', 'nevada' ),
                'subtitle' => __( 'Phone', 'nevada' ),
                'desc'     => __( 'Insert your phone', 'nevada' ),
                'default'  => __('(123) 456-7890')
            ),
            array(
                'id'       => 'links_title',
                'type'     => 'text',
                'title'    => __( 'Links Title', 'nevada' ),
                'subtitle' => __( 'Links Title', 'nevada' ),
                'desc'     => __( 'Insert links title', 'nevada' ),
                'default'  => __('Our Quick Links')
            ),
        )
    ) );