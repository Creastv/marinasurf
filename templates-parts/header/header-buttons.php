<?php
$link_one_text = get_theme_mod('header_btn_one_text', '');
$link_two_text = get_theme_mod('header_btn_two_text', '');
$link_one_url = get_theme_mod('header_btn_one_link', '');
$link_two_url = get_theme_mod('header_btn_two_link', '');

?>

<div class="h-buttons">
    <?php if (!empty($link_one_text) && !empty($link_one_url)) : ?>
        <a href="<?php echo $link_one_url; ?>" class="btn-rev"><?php echo $link_one_text; ?></a>
    <?php endif; ?>
    <?php if (!empty($link_two_text) && !empty($link_two_url)) : ?>
        <a href="<?php echo $link_two_url; ?>" class="btn-main"><?php echo $link_two_text; ?></a>
    <?php endif; ?>
</div>