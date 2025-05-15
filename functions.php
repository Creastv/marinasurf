<?php
add_theme_support('post-thumbnails');
add_theme_support('custom-logo');
add_image_size('post-futured', 300, 300, array('center', 'center'), true);
add_image_size('gallery', 420, 260, array('center', 'center'), true);
add_image_size('service', 500, 600, array('center', 'center'), true);

require_once get_template_directory() . '/func/enqueue-styles.php';
require_once get_template_directory() . '/func/enqueue-scripts.php';
require get_template_directory() . '/func/clean-up.php';
require get_template_directory() . '/blocks/blocks.php';
require get_template_directory() . '/func/wp-cuztomize.php';
require get_template_directory() . '/func/archive-load-more.php';


// gutenberg editor
function add_block_editor_assets()
{
    wp_enqueue_style('block_editor_css', get_template_directory_uri() . '/src/css/go-admin.min.css');
}
add_action('enqueue_block_editor_assets', 'add_block_editor_assets', 10, 0);


if (!function_exists('go_register_nav_menu')) {
    function go_register_nav_menu()
    {
        register_nav_menus(array(
            'primary_menu' => __('Primary Menu', 'go'),
            'secundary_menu' => __('Info Menu', 'go'),
        ));
    }
    add_action('after_setup_theme', 'go_register_nav_menu', 0);
}
// Setup logo
function go_custom_logo_setup()
{
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'go_custom_logo_setup');

// Paginacja
function pagination_bars()
{
    global $wp_query;

    $total_pages = $wp_query->max_num_pages;
    $big = 999999999; // need an unlikely integer
    if ($total_pages > 1) {
        $current_page = max(1, get_query_var('paged'));
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}
// Excerpt changing 3 dots
function new_excerpt_more($more)
{
    return;
}
add_filter('excerpt_more', 'new_excerpt_more');

// Excerpt
function wp_example_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'wp_example_excerpt_length');

function custom_excerpt($length = 55, $more = '...')
{
    global $post;

    // Sprawdzenie, czy post ma ustawiony excerpt
    if (has_excerpt($post->ID)) {
        $excerpt = get_the_excerpt();
    } else {
        // Pobranie treści posta bez HTML i shortcodów Divi
        $content = wp_strip_all_tags(get_the_content());
        $content = preg_replace('/\[(\/?et_pb_[a-zA-Z0-9_]+)[^\]]*\]/', '', $content);

        // Tworzenie skrótu
        $words = explode(' ', $content, $length + 1);
        if (count($words) > $length) {
            array_pop($words);
            $excerpt = implode(' ', $words) . $more;
        } else {
            $excerpt = implode(' ', $words);
        }
    }

    return $excerpt;
}


// Add Custome page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Ustawienia szablonu',
        'menu_title' => 'Ustawienia szablonu',
        'parent_slug' => 'themes.php',
    ));
}


add_filter('body_class', function ($classes) {
    if (is_front_page()) {
        $classes[] = '';
    } elseif (is_home() || is_category() || is_tag() || is_singular('post') || is_search()) {
        $classes[] = 'no-title';
    } else {
        $title = get_field('display_title', get_the_ID());
        if ($title === false || $title === '0' || $title === 0) {
            $classes[] = 'no-title';
        }
    }
    return $classes;
});


function generate_slug($string)
{
    return sanitize_title($string);
}
