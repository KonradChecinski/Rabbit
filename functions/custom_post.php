<?php
function create_posttype()
{

    register_post_type('slider',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Slajder'),
                'singular_name' => __('Slajder'),
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'slider'),
            'show_in_rest' => true,
            'supports' => array('title', 'thumbnail', 'revisions'),
            'menu_icon' => 'dashicons-format-gallery',
        )
    );

    register_post_type('rating',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Oceny sprzedawcy'),
                'singular_name' => __('Oceny sprzedawcy'),
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'rating'),
            'show_in_rest' => true,
            'supports' => array('title', 'revisions', 'excerpt'),
            'menu_icon' => 'dashicons-star-filled',
        )
    );

    register_taxonomy_for_object_type('collection', 'product');
    register_taxonomy('collection', 'product',
        array(
            'labels' => array(
                'name' => 'Kolekcje',
                'singular_name' => 'Kolekcje',
                'menu_name' => 'Kolekcje',
                'all_items' => 'Wszystkie kolekcje',
                'parent_item' => 'Kolekcja nadrzędna',
                'parent_item_colon' => 'Kolekcja nadrzędna:',
                'new_item_name' => 'Nazwa kolekcji',
                'add_new_item' => 'Dodaj kolekcje',
                'edit_item' => 'Edytuj',
                'update_item' => 'Zapisz',

            ),
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'has_archive' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'kolekcje'],
        )
    );

}
// Hooking up our function to theme setup
add_action('init', 'create_posttype');

class Rating_Meta_Box
{
    public function __construct()
    {

        add_action('add_meta_boxes', [ &$this, 'add']);
        add_action('save_post', [ &$this, 'save']);
    }

    /**
     * Set up and add the meta box.
     */
    public static function add()
    {
        $screens = ['rating'];
        foreach ($screens as $screen) {
            add_meta_box(
                'rating_field_id', // Unique ID
                'Ocena', // Box title
                [self::class, 'html'], // Content callback, must be of type callable
                $screen // Post type
            );
        }
    }

    /**
     * Save the meta box selections.
     *
     * @param int $post_id  The post ID.
     */
    public static function save(int $post_id)
    {
        if (array_key_exists('rating_field', $_POST)) {
            update_post_meta(
                $post_id,
                '_rating',
                $_POST['rating_field']
            );
        }
    }

    /**
     * Display the meta box HTML to the user.
     *
     * @param WP_Post $post   Post object.
     */
    public static function html($post)
    {
        $value = get_post_meta($post->ID, '_rating', true);
        ?>
<label for="rating_field">Ocena pokazana na stronie</label>
<select name="rating_field" id="rating_field" class="postbox">
    <option value="">Wybierz ocenę</option>
    <option value="1" <?php selected($value, '1');?>>1</option>
    <option value="2" <?php selected($value, '2');?>>2</option>
    <option value="3" <?php selected($value, '3');?>>3</option>
    <option value="4" <?php selected($value, '4');?>>4</option>
    <option value="5" <?php selected($value, '5');?>>5</option>
</select>
<?php
}
}
new Rating_Meta_Box();

class Slider_sub_menu
{

    public function __construct()
    {
        add_action('admin_menu', [ &$this, 'register_sub_menu']);
        add_action('admin_init', [ &$this, 'slider_settings']);
    }

    public function register_sub_menu()
    {
        add_submenu_page(
            'edit.php?post_type=slider', 'Ustawienia', 'Ustawienia', 'manage_options', 'slider_setting', array(&$this, 'slider_settings_display')
        );

    }

    public function slider_settings_display()
    {

        $this->slider_save_options();
        // Create a header in the default WordPress 'wrap' container
        echo '<div class="wrap">';

        settings_errors();

        echo '<form method="post" action="">';

        // var_dump(get_option('slider-settings-time'));
        // print_r($_POST);

        settings_fields('edit.php?post_type=slider&page=slider_setting');

        do_settings_sections('edit.php?post_type=slider&page=slider_setting');

        submit_button();

        echo '</form></div><!-- .wrap -->';
    }

/**
 * Register settings and add settings sections and fields to the admin page.
 */
    public function slider_settings()
    {

        add_settings_section(
            'slider_time_setting', // Section $id
            __('Ustawienia slajdera', 'slider'),
            array(&$this, 'slider_settings_section_title'), // Callback
            'edit.php?post_type=slider&page=slider_setting' // Settings Page Slug
        );

        ///////////////////////

        if (false == get_option('slider-settings-time')) {
            add_option('slider-settings-time');
        }
        if (false == get_option('slider-settings-pagination')) {
            add_option('slider-settings-pagination');
        }
        if (false == get_option('slider-settings-time')) {
            add_option('slider-settings-time');
        }

        add_settings_field(
            'slider-settings-time', // Field $id
            __('Czas [ms]', 'slider'), // Setting $title
            array(&$this, 'slider_time_callback'),
            'edit.php?post_type=slider&page=slider_setting', // Settings Page Slug
            'slider_time_setting', // Section $id
            array('Text to display in the archive header.')
        );

        add_settings_field(
            'slider-settings-pagination', // Field $id
            __('Wyświetlić paginacje', 'slider'), // Setting $title
            array(&$this, 'slider_pagination_callback'),
            'edit.php?post_type=slider&page=slider_setting', // Settings Page Slug
            'slider_time_setting', // Section $id
            array('Text to display in the archive header.')
        );

        add_settings_field(
            'slider-settings-arrow', // Field $id
            __('Wyświetlić strzałki', 'slider'), // Setting $title
            array(&$this, 'slider_arrow_callback'),
            'edit.php?post_type=slider&page=slider_setting', // Settings Page Slug
            'slider_time_setting', // Section $id
            array('Text to display in the archive header.')
        );

        ///////////////////////

        register_setting(
            'edit.php?post_type=slider&page=slider_setting', // $option_group
            'slider-settings', // $option_name
            array(&$this, 'slider_time_save_options')
        );
    }

/**
 * Callback for settings section.
 *
 * Commented out until settings are working.
 *
 * @param  array $args Gets the $id, $title and $callback.
 */
    public function slider_settings_section_title($args)
    {
        // printf( '<h2>%s</h2>', apply_filters( 'the_title', $args['title'] ) );
    }

/**
 * Settings fields callbacks.
 */
    public function slider_time_callback($args)
    {
        $options = get_option('slider-settings-time');

        printf('<input class="widefat" id="slider-settings-time" name="slider-settings[time]" type="number" value="%1$s" />',
            $options);
    }

    public function slider_pagination_callback($args)
    {
        $options = get_option('slider-settings-pagination');

        ?>
<select name="slider-settings[pagination]" id="slider-settings-pagination">
    <option value="0" <?php selected($options, '0');?>>Nie</option>
    <option value="1" <?php selected($options, '1');?>>Tak</option>
</select>
<?php
}

    public function slider_arrow_callback($args)
    {
        $options = get_option('slider-settings-arrow');

        ?>
<select name="slider-settings[arrow]" id="slider-settings-arrow">
    <option value="0" <?php selected($options, '0');?>>Nie</option>
    <option value="1" <?php selected($options, '1');?>>Tak</option>
</select>
<?php

    }
/**
 * Save options.
 */
    public function slider_save_options()
    {
        if (isset($_POST['slider-settings']['time'])) {
            update_option('slider-settings-time', $_POST['slider-settings']['time']);
        }

        if (isset($_POST['slider-settings']['pagination'])) {
            update_option('slider-settings-pagination', $_POST['slider-settings']['pagination']);
        }

        if (isset($_POST['slider-settings']['arrow'])) {
            update_option('slider-settings-arrow', $_POST['slider-settings']['arrow']);
        }
    }
}
new Slider_sub_menu();

class Image_Collection
{

    public function __construct()
    {
        add_action('collection_add_form_fields', [ &$this, 'add_term_image'], 10, 2);
        add_action('created_collection', [ &$this, 'save_term_image'], 10, 2);
        add_action('collection_edit_form_fields', [ &$this, 'edit_image_upload'], 10, 2);
        add_action('edited_collection', [ &$this, 'update_image_upload'], 10, 2);

        add_action('admin_enqueue_scripts', [ &$this, 'image_uploader_enqueue']);
    }

    public function add_term_image($taxonomy)
    {
        ?>
<div class="form-field term-group">
    <label for="">Obrazek</label>
    <input type="text" name="txt_upload_image" id="txt_upload_image" value="" style="width: 77%">
    <input type="button" id="upload_image_btn" class="button" value="Dodaj obrazek" />
</div>
<?php
}

    public function save_term_image($term_id, $tt_id)
    {
        if (isset($_POST['txt_upload_image']) && '' !== $_POST['txt_upload_image']) {
            // $group = '#' . sanitize_title($_POST['txt_upload_image']);
            $group = $_POST['txt_upload_image'];
            add_term_meta($term_id, 'term_image', $group, true);
        }
    }

    public function edit_image_upload($term, $taxonomy)
    {
        // get current group
        $txt_upload_image = get_term_meta($term->term_id, 'term_image', true);
        ?>
<div class="form-field term-group">
    <label for="">Obrazek</label>
    <input type="text" name="txt_upload_image" id="txt_upload_image" value="<?php echo $txt_upload_image ?>"
        style="width: 77%">
    <input type="button" id="upload_image_btn" class="button" value="Dodaj obrazek" />
</div>
<?php
}

    public function update_image_upload($term_id, $tt_id)
    {
        if (isset($_POST['txt_upload_image']) && '' !== $_POST['txt_upload_image']) {
            // $group = '#' . sanitize_title($_POST['txt_upload_image']);
            $group = $_POST['txt_upload_image'];
            update_term_meta($term_id, 'term_image', $group);
        }
    }

    public function image_uploader_enqueue()
    {
        global $typenow;

        if (($typenow == 'product')) {
            wp_enqueue_media();

            wp_register_script('meta-image', get_template_directory_uri() . '/js/media-uploader.js', array('jquery'));
            wp_localize_script('meta-image', 'meta_image',
                array(
                    'title' => 'Wybierz obrazek kolekcji',
                    'button' => 'Ustaw obrazek kolekcji',
                )
            );
            wp_enqueue_script('meta-image');
        }
    }

}
new Image_Collection();
?>