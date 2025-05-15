<?php
$style = get_field('styl_galerii');

$class_name = 'b-gallery-carousel';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

?>
<section class="<?php echo esc_attr($class_name); ?>" data-aos="fade-up">
    <?php
    if ($style == 1):
        get_template_part('blocks/gallery/gallery-carousel');
    else:
        get_template_part('blocks/gallery/gallery-grid');
    endif;
    ?>
</section>