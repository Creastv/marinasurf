<?php
$display = get_field('footer_baner');

$title = get_theme_mod('banner-title');
$desc = get_theme_mod('banner-desc');
$link_text = get_theme_mod('banner-link-text');
$link_url = get_theme_mod('banner-link-url');
?>
<?php if ($display) : ?>
    <div class="f-banner"
        style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/footer-banner-bg.png);">
        <div class="container">
            <div class="f-banner__wrap">
                <div class="desc">
                    <?php if (!empty($title)) : ?>
                        <h4 class="h1"><?php echo $title; ?></h4>
                    <?php endif; ?>
                    <?php if (!empty($desc)) : ?>
                        <p><i><?php echo $desc; ?></i></p>
                    <?php endif; ?>
                </div>
                <?php if (!empty($link_text) && !empty($link_url)) : ?>
                    <a href="<?php echo $link_url; ?>" class="btn-main"><?php echo $link_text; ?></a>
                <?php endif; ?>
            </div>
        </div>
        <svg width="1920" height="78" viewBox="0 0 1920 78" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_144_2680)">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M1920 0H1896.39C1874.6 0 1829.21 0 1783.81 9.86C1738.42 19.72 1693.02 39.43 1647.62 41.07C1602.23 42.71 1556.83 26.28 1511.44 24.64C1466.04 23 1420.65 36.14 1375.25 32.85C1329.85 29.56 1284.46 9.85 1239.06 4.92C1193.67 -0.00999975 1148.27 9.85 1102.88 14.78C1057.48 19.71 1012.08 19.71 966.69 19.71C921.3 19.71 875.9 19.71 830.5 14.78C785.1 9.85 739.71 -0.00999999 694.31 1.64C648.91 3.28 603.52 16.43 558.12 24.64C512.72 32.85 467.33 36.14 421.93 41.07C376.53 46 331.14 52.57 285.74 54.21C240.34 55.85 194.95 52.57 149.55 52.57C104.15 52.57 58.7605 55.86 13.3605 55.86C8.90047 55.86 4.44047 55.83 -0.0195312 55.77V69C4.51047 69 8.83047 69 13.3605 69H1919.98V0H1920Z"
                    fill="#0265A9" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M1920 9H1896.39C1874.6 9 1829.21 9 1783.81 18.86C1738.42 28.72 1693.02 48.43 1647.62 50.07C1602.23 51.71 1556.83 35.28 1511.44 33.64C1466.04 32 1420.65 45.14 1375.25 41.85C1329.85 38.56 1284.46 18.85 1239.06 13.92C1193.67 8.99 1148.27 18.85 1102.88 23.78C1057.48 28.71 1012.08 28.71 966.69 28.71C921.3 28.71 875.9 28.71 830.5 23.78C785.1 18.85 739.71 8.99 694.31 10.64C648.91 12.28 603.52 25.43 558.12 33.64C512.72 41.85 467.33 45.14 421.93 50.07C376.53 55 331.14 61.57 285.74 63.21C240.34 64.85 194.95 61.57 149.55 61.57C104.15 61.57 58.7602 64.86 13.3602 64.86C8.90023 64.86 4.44023 64.83 -0.00976562 64.77V78H1919.99V9H1920Z"
                    fill="#141328" />
            </g>
            <defs>
                <clipPath id="clip0_144_2680">
                    <rect width="1920" height="78" fill="white" />
                </clipPath>
            </defs>
        </svg>

    </div>
<?php endif; ?>