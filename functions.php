<?php 
//Upload MIMEs that are not supported by WP
add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['zip'] = 'application/zip';
    return $mimes;
});

add_action('after_setup_theme', function () {
      // Title Tag in <head> : <title>...</title>
      add_theme_support('title-tag');

      //Translation
      load_textdomain('_themename', get_template_directory() . '/languages');

      //Activate Images
      add_theme_support('post-thumbnails');

       //Support for Custom LOGO
       add_theme_support('custom-logo', array(
        'height' => 56,
        'width' => 56,
        'flex-height' => false,
        'flex-width' => true,
       ));

      // WordPress HTML5-Markup
      add_theme_support('html5', array(
        'search-form',
        'gallery',
        'caption',
        'style',
        'script',
        'comment-list',
        'comment-form'
      ));

    // Theme für Gutenberg optimiert - Lade default Block styles
    add_theme_support('wp-block-styles');

    // aktiviere wide & fullwidth Layouts
    add_theme_support('align-wide');

    // Block Vorlagen deaktivieren
    remove_theme_support('core-block-patterns');

    // Gutenberg custom stylesheet
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css'); // make sure path reflects where the file is located

    //Register Menu
    register_nav_menus( array(
        'primary' =>  __('Primary Menu', '_themename'),
    ) );

    //Disable colors - Gutenberg blocks
    add_theme_support('disable-custom-colors');

    //Disable gradients - Gutenberg blocks
    add_theme_support('disable-custom-gradients');

    //Eigenen Farben für Gutenberg definieren. Wenn man dann die Farbe ändert, wird eine eigene Klasse hingefügt z.B.has-color-font-color -> beim CSS stylen
    add_theme_support('editor-color-palette', array(
        array(
            'name' => __('Primary', '_themename'),
            'color' => '#c900fc',
            'slug' => 'color-primary',
        ),
        array(
            'name' => __('Secondary', '_themename'),
            'color' => '#e99eff',
            'slug' => 'color-secondary',
        ),
        array(
            'name' => __('Background', '_themename'),
            'color' => '#0f0823',
            'slug' => 'color-bg',
        ),
        array(
            'name' => __('Text', '_themename'),
            'color' => '#fff',
            'slug' => 'color-text',
        ),
    ));

    //Alle Schriftgrößen ausblenden
    add_theme_support('disable-custom-font-sizes');
    add_theme_support('editor-font-sizes', array(
        array(
            'name' => __('Small', '_themename'),
            'size' => 16,
            'slug' => 'small',
        ),
        array(
            'name' => __('Medium', '_themename'),
            'size' => 18,
            'slug' => 'medium',
        ),
        array(
            'name' => __('Large', '_themename'),
            'size' => 24,
            'slug' => 'large',
        ),
        array(
            'name' => __('XLarge', '_themename'),
            'size' => 32,
            'slug' => 'xlarge',
        ),
    ));

   // Disable Gutenberg blocks
    add_filter('allowed_block_types_all',function($allowed_blocks){
        return array(  
            //You should not use _ with acf cause else it won't work
            'acf/text-with-rounded-image',
            'acf/list',
            'acf/text',
            'acf/progress-bar',
            'core/paragraph', 
            'core/buttons',      
            'core/heading',      
            'core/image',
            'loos-hcb/code-block', 
        );
    });
});

//CSS + Script files
add_action('wp_enqueue_scripts', function () {

    $theme_version = wp_get_theme()->get('Version');

    // CSS Theme einbinden
    wp_enqueue_style('normalize-css', get_template_directory_uri() . '/assets/css/normalize.min.css');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style('adobe-fonts', 'https://use.typekit.net/cou2eeh.css');
    
    //CSS Dateien im Theme registrieren
    wp_register_style('owl-css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
    wp_register_style('owl-theme-css', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css');
 
    //JS Dateien im Theme einbinden
    wp_enqueue_script('webdev_scripts', get_template_directory_uri() . '/assets/js/vanilla.tilt.js', array(), $theme_version, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), $theme_version, true);
    
    //JS Dateien im Theme registrieren
   wp_register_script('projects-script', get_template_directory_uri() . '/assets/js/projects.js', array() , $theme_version, true);
   wp_register_script('progress-bar', get_template_directory_uri() . '/assets/js/progress-bar.js', array() , $theme_version, true);
   wp_register_script('owl-script-min', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery') , $theme_version, true);
   wp_register_script('owl-script', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery') , $theme_version, true); 
});

// Add ACF OPTIONS  for the client
if (function_exists('acf_add_options_page')) {
    /* ACF Option Page erstellen */
    acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_pages',
        'position' => 100,
        'redirect' => false,
        'post_id' => 'options',
        'icon_url' => 'dashicons-smiley', //https://developer.wordpress.org/resource/dashicons/#smiley
        'update_button' => __('Save Changes', '_themename'),
        'updated_message' => __('Changes saved', '_themename'),
    ));

    /* Hinzufügen von Gutenberg-Block-Kategorie */
    add_filter('block_categories_all', function ($categories) {     
        /* "array_merge()" fügt zwei oder mehrere arrays zusammen: https://www.php.net/manual/de/function.array-merge.php  */
        return array_merge(
            array(
                array(
                    'slug' => 'layout-category',
                    'title' => __('Layout', '_themename')
                ),
                array(
                    'slug' => 'text-category',
                    'title' => __('Text', '_themename')
                ),
                array(
                    'slug' => 'list-category',
                    'title' => __('Lists', '_themename')
                ),
                array(
                    'slug' => 'blog-category',
                    'title' => __('Blog', '_themename')
                ),
               
            ),
            $categories
        );
    }, 10, 2); 
    
    //Register ACF-Gutenberg Blocks
    add_action('acf/init', 'my_acf_init_block_types');
    function my_acf_init_block_types() {
        // Check function exists.
        if( function_exists('acf_register_block_type') ) {

            // register a text with a rounded image.
            acf_register_block_type(array(
                'name'              => 'text-with-rounded-image',
                'title'             => __('Text with rounded image', '_themename'),
                'description'       => __('A custom block that adds text and a rounded image.', '_themename'),
                'render_template'   => 'template-parts/blocks/block-text-with-rounded-image.php',
                'category'          => 'text-category',
                'icon'              => 'layout', 
                'keywords'          => array( 'image', 'text', 'rounded' ),
            ));
            // register List with Title.
            acf_register_block_type(array(
                'name'              => 'list',
                'title'             => __('List', '_themename'),
                'description'       => __('A custom block that adds a title and list items.', '_themename'),
                'render_template'   => 'template-parts/blocks/block-list.php',
                'category'          => 'list-category',
                'icon'              => 'editor-ul', 
                'keywords'          => array( 'list', 'text', 'title' ),
            ));
            // register Text Block.
            acf_register_block_type(array(
                'name'              => 'text',
                'title'             => __('Text', '_themename'),
                'description'       => __('A custom block in which you can add paragraphs', '_themename'),
                'render_template'   => 'template-parts/blocks/block-text.php',
                'category'          => 'text-category',
                'icon'              => 'text', 
                'keywords'          => array( 'text' ),
            ));
            // register Progress Bar Block.
            acf_register_block_type(array(
                'name'              => 'progress-bar',
                'title'             => __('Progress Bar', '_themename'),
                'description'       => __('A custom block in which you can add rounded progress bars', '_themename'),
                'render_template'   => 'template-parts/blocks/block-progress-bar.php',
                'category'          => 'layout-category',
                'icon'              => 'chart-bar', 
                'keywords'          => array( 'progress', 'bar' ),
            ));
        } 
    }
    // Export acf fields
    // require_once(get_template_directory() . '/assets/acf/acf-fields.php');

}  else {
        /* Backend-Fehlermeldung, wenn ACF-Pro nicht installiert ist */
        add_action('admin_notices', function () {
            ?>
<div class="error notice">
    <p><?php _e('<b>ACHTUNG: </b> The "ACF Pro" Plugin must be installed first!', '_themename'); ?></p>
</div>
<?php
        });
}

// Register Custom Post Type
function post_type_projects() {
	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', '_themename' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', '_themename' ),
		'menu_name'             => __( 'Projects', '_themename' ),
		'name_admin_bar'        => __( 'Projects', '_themename' ),
		'archives'              => __( 'Item Archives', '_themename' ),
		'attributes'            => __( 'Item Attributes', '_themename' ),
		'parent_item_colon'     => __( 'Parent Item:', '_themename' ),
		'all_items'             => __( 'All Projects', '_themename' ),
		'add_new_item'          => __( 'Add New Item', '_themename' ),
		'add_new'               => __( 'Add New Project', '_themename' ),
		'new_item'              => __( 'New Item', '_themename' ),
		'edit_item'             => __( 'Edit Project', '_themename' ),
		'update_item'           => __( 'Update Project', '_themename' ),
		'view_item'             => __( 'View Project', '_themename' ),
		'view_items'            => __( 'View Items', '_themename' ),
		'search_items'          => __( 'Search Item', '_themename' ),
		'not_found'             => __( 'Not found', '_themename' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '_themename' ),
		'featured_image'        => __( 'Featured Image', '_themename' ),
		'set_featured_image'    => __( 'Set featured image', '_themename' ),
		'remove_featured_image' => __( 'Remove featured image', '_themename' ),
		'use_featured_image'    => __( 'Use as featured image', '_themename' ),
		'insert_into_item'      => __( 'Insert into item', '_themename' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', '_themename' ),
		'items_list'            => __( 'Items list', '_themename' ),
		'items_list_navigation' => __( 'Items list navigation', '_themename' ),
		'filter_items_list'     => __( 'Filter items list', '_themename' ),
	);
	$args = array(
		'label'                 => __( 'Project', '_themename' ),
		'description'           => __( 'Posts for the projects', '_themename' ),
		'labels'                => $labels,
		'supports'              => array( 'title'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
        'menu_icon'           => 'dashicons-media-interactive',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'projects', $args );
}
add_action( 'init', 'post_type_projects', 0 );

//Estimated reading time 
function reading_time() {
    global $post;
    $content = get_post_field( 'post_content', $post->ID );
    $word_count = str_word_count( strip_tags( $content ) );
    $readingtime = ceil($word_count / 200);
    
    if ($readingtime == 1) {
    $timer = " minute";
    } else {
    $timer = " minutes";
    }
    $totalreadingtime = $readingtime . $timer;
    
    return $totalreadingtime;
    }