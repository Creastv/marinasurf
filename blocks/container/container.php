<?php
$container_width = get_field('szerokosc');
$fadeIn = get_field('efekt_fadein');
$class_container = '';
if ($container_width == 1):
    $class_container = '';
elseif ($container_width == 2):
    $class_container = 'container-narrow';
elseif ($container_width == 3):
    $class_container = 'container-large';
endif;
?>
<?php if ($fadeIn) : ?>
    <div data-aos="fade-up">
    <?php endif; ?>
    <div class="b-container <?php echo $class_container; ?>" data-aos="fade-up">
        <InnerBlocks />
    </div>
    <?php if ($fadeIn) : ?>
    </div>
<?php endif; ?>