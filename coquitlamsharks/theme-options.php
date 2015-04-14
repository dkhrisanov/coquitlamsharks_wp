<?php

load_theme_textdomain('coquitlamsharks', get_template_directory() . '/languages');

/////////////////////////////////////////////////////////////////////
// Add sharks Theme Options to the Appearance Menu and Admin Bar
////////////////////////////////////////////////////////////////////

function dmbs_theme_options_menu()
{
    add_theme_page('sharks Theme' . __('Options', 'coquitlamsharks'), 'sharks' . __('Options', 'coquitlamsharks'), 'manage_options', 'sharks-theme-options', 'sharks_theme_options');
}

add_action('admin_menu', 'dmbs_theme_options_menu');
add_action('admin_bar_menu', 'toolbar_link_to_dmbs_options', 999);

function toolbar_link_to_dmbs_options($wp_admin_bar)
{
    $args = array(
        'id' => 'sharks_theme_options',
        'title' => __('sharks Options', 'coquitlamsharks'),
        'href' => home_url() . '/wp-admin/themes.php?page=sharks-theme-options',
        'meta' => array('class' => 'sharks-theme-options'),
        'parent' => 'site-name'
    );
    $wp_admin_bar->add_node($args);
}

////////////////////////////////////////////////////////////////////
// Add admin.css enqueue
////////////////////////////////////////////////////////////////////

function sharks_theme_style()
{
    wp_enqueue_style('sharks-theme', get_template_directory_uri() . '/css/admin.css');
}

add_action('admin_enqueue_scripts', 'sharks_theme_style');

////////////////////////////////////////////////////////////////////
// Custom background theme support
////////////////////////////////////////////////////////////////////

$defaults = array(
    'default-color' => '',
    'default-image' => '',
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => ''
);
add_theme_support('custom-background', $defaults);

////////////////////////////////////////////////////////////////////
// Custom header theme support
////////////////////////////////////////////////////////////////////

register_default_headers(array(
        'wheel' => array(
            'url' => '%s/img/header.jpg',
            'thumbnail_url' => '%s/img/header.jpg',
            'description' => __('Coquitlam Sharks', 'coquitlamsharks')
        ))

);

$defaults = array(
    'default-image' => get_template_directory_uri() . '/img/header.jpg',
    'width' => 1300,
    'height' => 200,
    'flex-height' => true,
    'flex-width' => true,
    'default-text-color' => '000',
    'header-text' => true,
    'uploads' => true,
    'wp-head-callback' => '',
    'admin-head-callback' => '',
    'admin-preview-callback' => 'sharks_admin_header_image',
);
add_theme_support('custom-header', $defaults);

function sharks_admin_header_image()
{ ?>

    <div id="headimg">
        <?php
        $color = get_header_textcolor();
        $image = get_header_image();

        if ($color && $color != 'blank') :
            $style = ' style="color:#' . $color . '"';
        else :
            $style = ' style="display:none"';
        endif;
        ?>


        <?php if ($image) : ?>
            <img src="<?php echo esc_url($image); ?>" alt=""/>
        <?php endif; ?>
        <div class="dm_header_name_desc">
            <h1><a id="name"<?php echo $style; ?> onclick="return false;"
                   href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>

            <div id="desc"<?php echo $style; ?>><?php bloginfo('description'); ?></div>

        </div>
    </div>

<?php }

function custom_header_text_color()
{
    if (get_header_textcolor() != 'blank') { ?>
        <style>
            .custom-header-text-color {
                color: # <?php echo get_header_textcolor(); ?>
            }
        </style>
    <?php }
}

add_action('wp_head', 'custom_header_text_color');

////////////////////////////////////////////////////////////////////
// Register our settings options (the options we want to use)
////////////////////////////////////////////////////////////////////

$dm_options = array(
    'author_credits' => true,
    'show_header' => true,
    'show_postmeta' => true
);

$dm_sidebar_sizes = array(
    '1' => array(
        'value' => '1',
        'label' => '1'
    ),
    '2' => array(
        'value' => '2',
        'label' => '2'
    ),
    '3' => array(
        'value' => '3',
        'label' => '3'
    ),
    '4' => array(
        'value' => '4',
        'label' => '4'
    ),
    '5' => array(
        'value' => '5',
        'label' => '5'
    )

);

function dm_register_settings()
{
    register_setting('dm_theme_options', 'dm_options', 'dm_validate_options');
}

add_action('admin_init', 'dm_register_settings');
$dm_settings = get_option('dm_options', $dm_options);


////////////////////////////////////////////////////////////////////
// Validate Options
////////////////////////////////////////////////////////////////////

function dm_validate_options($input)
{

    global $dm_options, $dm_sidebar_sizes;

    $settings = get_option('dm_options', $dm_options);

    if (!isset($input['show_postmeta'])) {
        $input['show_postmeta'] = null;
    } else {
        $input['show_postmeta'] = ($input['show_postmeta'] == 1 ? 1 : 0);
    }

    return $input;
}

////////////////////////////////////////////////////////////////////
// Display Options Page
////////////////////////////////////////////////////////////////////

function sharks_theme_options()
{

    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }

    //get our global options
    global $dm_options, $dm_sidebar_sizes, $developer_uri;

    //get our logo
    $logo = get_template_directory_uri() . '/img/header.jpg'; ?>

    <div class="wrap">

        <div class="dm-logo-wrap"><a href="<?php echo $developer_uri ?>" target="_blank"><img src="<?php echo $logo; ?>"
                                                                                              class="dm-logo"
                                                                                              title="Created by Danny Machal @ sharks.com"/></a>
        </div>

        <div class="icon32" id="icon-options-general"></div>

        <h2><a href="<?php echo $developer_uri ?>" target="_blank">coquitlamsharks</a></h2>

        <?php

        if (!isset($_REQUEST['settings-updated']))

            $_REQUEST['settings-updated'] = false;

        ?>

        <?php if (false !== $_REQUEST['settings-updated']) : ?>

            <div class='saved'><p><strong><?php _e('Options Saved!', 'coquitlamsharks'); ?></strong></p></div>

        <?php endif; ?>

        <form action="options.php" method="post">

            <?php
            $settings = get_option('dm_options', $dm_options);
            settings_fields('dm_theme_options');
            ?>

            <table cellpadding='10'>

                <tr valign="top">
                    <th scope="row"><?php _e('Show Post Meta', 'coquitlamsharks'); ?></th>
                    <td>
                        <input type="checkbox" id="show_postmeta" name="dm_options[show_postmeta]"
                               value="1" <?php checked(true, $settings['show_postmeta']); ?> />
                        <label
                            for="show_postmeta"><?php _e('Show Post Meta data (author, category, date created)', 'coquitlamsharks'); ?></label>
                    </td>
                </tr>

            </table>

            <p class="submit">
                <input name="Submit" type="submit" class="button-primary"
                       value="<?php esc_attr_e('Save Changes', 'coquitlamsharks'); ?>"/>
            </p>

        </form>

    </div>
    <?php

}

?>
