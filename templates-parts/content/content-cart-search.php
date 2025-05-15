<article class="post post-search <?php echo $post->ID; ?>" data-aos="fade-up">
    <div class="post__content">
        <h2 class="entry-title ">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <p class="entry-content"><?php echo custom_excerpt(30); ?></p>
    </div>
    <div class="button">
        <a href="<?php the_permalink(); ?>" class="btn-main">Czytaj więcej</a>
    </div>
</article>