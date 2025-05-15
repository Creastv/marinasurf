<?php
$title = get_theme_mod('widget-title-sticky');
$phone = get_theme_mod('widget-tel');
$link_text = get_theme_mod('widget-link-text');
$link_url = get_theme_mod('widget-link-url');
$link_text1 = get_theme_mod('widget-link-text-2');
$link_url1 = get_theme_mod('widget-link-url-2');
$link_text2 = get_theme_mod('widget-link-text-3');
$link_url2 = get_theme_mod('widget-link-url-3');
?>
<div class="sticker">
    <div class="sticker__wrap">
        <div class="sticker__content">
            <div class="sticker__content__top">
                <div class="close">X</div>
            </div>
            <?php if ($title) : ?>
                <h5><?php echo $title; ?></h5>
            <?php endif; ?>
            <?php if ($phone) : ?>
                <a href="tel:+48 539 994 004" class="phone"><?php echo $phone; ?></a>
                <span class="label">LUB</span>
            <?php endif; ?>

        </div>
        <div class="sticky__form">
            <?php if ($link_url && $link_text) : ?>
                <a href="<?php echo $link_url; ?>" class="btn-main"><?php echo $link_text; ?></a>
            <?php endif; ?>
            <?php if ($link_url1 && $link_text1) : ?>
                <a href="<?php echo $link_url1; ?>" class="btn-rev"><?php echo $link_text1; ?></a>
            <?php endif; ?>
            <?php if ($link_url2 && $link_text2) : ?>
                <a href="<?php echo $link_url2; ?>" class="btn-rev"><?php echo $link_text2; ?></a>
            <?php endif; ?>
        </div>
    </div>

</div>
<div class="bounce">
    <svg width="30" height="30" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M19.25 14.8051V17.4301C19.251 17.6738 19.2011 17.915 19.1034 18.1383C19.0058 18.3615 18.8626 18.562 18.6831 18.7267C18.5035 18.8915 18.2915 19.0169 18.0607 19.095C17.8298 19.173 17.5852 19.202 17.3425 19.1801C14.65 18.8875 12.0636 17.9675 9.79125 16.4938C7.6771 15.1504 5.88467 13.358 4.54125 11.2438C3.06248 8.96114 2.14222 6.3622 1.855 3.65758C1.83314 3.41562 1.86189 3.17175 1.93944 2.94151C2.01699 2.71126 2.14163 2.49969 2.30542 2.32025C2.46922 2.14082 2.66858 1.99746 2.89082 1.89929C3.11306 1.80113 3.3533 1.75031 3.59625 1.75008H6.22125C6.6459 1.74591 7.05757 1.89628 7.37954 2.17318C7.70152 2.45007 7.91182 2.8346 7.97125 3.25508C8.08205 4.09514 8.28752 4.91997 8.58375 5.71383C8.70148 6.02702 8.72696 6.36738 8.65717 6.6946C8.58738 7.02182 8.42526 7.32218 8.19 7.56008L7.07875 8.67133C8.32436 10.8619 10.1382 12.6757 12.3288 13.9213L13.44 12.8101C13.6779 12.5748 13.9783 12.4127 14.3055 12.3429C14.6327 12.2731 14.9731 12.2986 15.2863 12.4163C16.0801 12.7126 16.9049 12.918 17.745 13.0288C18.17 13.0888 18.5582 13.3029 18.8357 13.6304C19.1132 13.9579 19.2607 14.376 19.25 14.8051Z"
            stroke="#FD5B39" stroke-linecap="round" stroke-linejoin="round"></path>
    </svg>
</div>