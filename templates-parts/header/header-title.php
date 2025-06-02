<?php
global $post;
$title = get_field('display_title', get_the_ID());
$customTitle = get_field('custom_title', get_the_ID());
$backgroun_image_default = get_theme_mod('header_bg');
if (!empty($customTitle)) {
    $backgroun_image_page = $customTitle['background_image'];
}
if (is_category()) {
    $category = get_queried_object();
    $background_category = get_field('background_image', 'category_' . $category->term_id);
    if ($background_category) {
        $bg = $background_category;
    } else {
        $bg = $backgroun_image_default;
    }
} elseif (is_search()) {
    $bg = $backgroun_image_default;
} elseif (!empty($backgroun_image_page)) {
    $bg = $backgroun_image_page;
} else {
    $bg = $backgroun_image_default;
}
?>
<?php if (is_home()) : ?>
    <?php
    $customTitle = get_field('custom_title', get_option('page_for_posts'));
    ?>
    <header class="entry-header text-center" data-aos="fade-up">
        <div class="container">
            <div class="entry-header__wrap">
                <?php if (!empty($customTitle['title'])): ?>
                    <?php if (!empty($customTitle['label'])): ?>
                        <span class="entry-label entry-label--archive"><?php echo $customTitle['label']; ?></span>
                    <?php endif; ?>
                    <h1 class="entry-title  entry-title--archive big-title ">
                        <?php echo $customTitle['title']; ?>
                    </h1>
                <?php else : ?>
                    <span class="entry-label entry-label--archive"><?php echo _e('Blog', 'go'); ?></span>
                    <h1><?php echo _e('Blog', 'go'); ?></h1>
                <?php endif; ?>
                <?php if (!empty($customTitle['description'])): ?>
                    <div class="entry-desc entry-desc--archive">
                        <?php echo $customTitle['description']; ?>
                    </div>
                <?php endif; ?>
                <?php // get_template_part('templates-parts/parts/categorys');  
                ?>
            </div>
        </div>
    </header>
<?php elseif (is_category()): ?>
    <header class="entry-header text-center" data-aos="fade-up">
        <div class="container">
            <div class="entry-header__wrap">
                <span class="entry-label entry-label--archive"><?php echo single_cat_title(); ?></span>
                <h1 class="entry-title  entry-title--archive big-title "><?php echo single_cat_title(); ?></h1>
                <?php the_archive_description('<div class="entry-desc entry-desc--archive">', '</div>'); ?>
                <?php // get_template_part('templates-parts/parts/categorys');  
                ?>
            </div>
        </div>
    </header>

<?php elseif (is_tag()): ?>
    <header class="entry-header text-center" data-aos="fade-up">
        <div class="container">
            <div class="entry-header__wrap">
                <h1 class="entry-title  entry-title--archive big-title "><?php echo single_tag_title(); ?></h1>
                <?php the_archive_description('<div class="entry-desc entry-desc--archive">', '</div>'); ?>
            </div>
        </div>
    </header>
<?php elseif (is_search()): ?>
    <header class="entry-header text-center" data-aos="fade-up">
        <div class="container">
            <div class="entry-header__wrap">
                <span class="entry-label entry-label--archive"><?php echo _e('Wyniki', 'go'); ?></span>
                <h1 class="entry-title  entry-title--archive big-title "><?php echo _e('Wyniki wyszukiwania', 'go'); ?></h1>
                <p>Wyniki dla: <strong><?php echo get_search_query(); ?></strong></p>
                <?php // get_search_form(); 
                ?>
            </div>
        </div>
    </header>
<?php else: ?>

    <?php if ($title) {  ?>
        <header class="entry-header" data-aos="fade-up">
            <div class="container">
                <div class="entry-header__wrap">
                    <?php if (!empty($customTitle['label']) && $title): ?>
                        <span class="entry-label"><?php echo $customTitle['label']; ?></span>
                    <?php endif; ?>
                    <?php if (!empty($customTitle['title']) && $title): ?>
                        <h1 class="entry-title big-title">
                            <?php echo $customTitle['title']; ?>
                        </h1>
                    <?php else : ?>
                        <h1 class="entry-title big-title">
                            <?php if (is_category()) :
                                single_cat_title();
                            elseif (is_tax()) :
                                single_tag_title();
                            elseif (is_page()) :
                                the_title();
                            elseif (is_author()) :
                                the_post();
                                printf(__('%s', 'go'), get_the_author());
                                rewind_posts();
                            elseif (is_day()) :
                                printf(__('Dzień: %s', 'go'), '<span>' . get_the_date() . '</span>');
                            elseif (is_month()) :
                                printf(__('Miesiąc: %s', 'go'), '<span>' . get_the_date('F Y') . '</span>');
                            elseif (is_year()) :
                                printf(__('Rok: %s', 'go'), '<span>' . get_the_date('Y') . '</span>');
                            elseif (is_tax('post_format', 'post-format-aside')) :
                                _e('Asides', 'go');
                            elseif (is_tax('post_format', 'post-format-image')) :
                                _e('Images', 'go');
                            elseif (is_tax('post_format', 'post-format-video')) :
                                _e('Videos', 'go');
                            elseif (is_tax('post_format', 'post-format-quote')) :
                                _e('Quotes', 'go');
                            elseif (is_tax('post_format', 'post-format-link')) :
                                _e('Links', 'go');
                            endif; ?>
                        </h1>
                    <?php endif; ?>
                    <?php if ($post->post_parent): ?>
                        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
                    <?php endif; ?>
                    <?php if (!empty($customTitle['description']) && $title): ?>
                        <div class="entry-desc">
                            <?php echo $customTitle['description']; ?>
                        </div>
                    <?php endif; ?>

                </div>
                <?php if (!empty($bg) && $title) : ?>
                    <div class="img">
                        <img src="<?php echo esc_url($bg); ?>" alt="<?php esc_attr_e('Tło nagłówka', 'go'); ?>"
                            class="header-image go-parallex" />
                    </div>
                <?php endif; ?>
            </div>
        </header>
    <?php } ?>


<?php endif; ?>