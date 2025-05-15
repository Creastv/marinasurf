<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php get_template_part('templates-parts/header/header', 'title');  ?>

    <div id="posts-container" class="posts-wraper">
        <?php while (have_posts()) : the_post();
            get_template_part('templates-parts/content/content-cart-post');
        endwhile; ?>
    </div>
    <?php if ($wp_query->max_num_pages > 1) : ?>
        <div class="read-more-archive text-center">
            <a href="#" class="btn-rev" id="load-more" data-page="1" data-max="<?php echo $wp_query->max_num_pages; ?>">
                Wczytaj więcej
            </a>
        </div>
    <?php endif; ?>
<?php else : ?>
    <?php get_template_part('templates-parts/header/header', 'title');  ?>
    <div class="container no-resoult">
        <h2 class='text-center'><?php _e('Nic nie znaleziono', 'go'); ?></h2>
    </div>


<?php endif; ?>

<?php get_footer();
