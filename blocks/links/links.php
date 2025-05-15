<?php
$links = get_field('linki');
?>
<ul class="b-links" data-aos="fade-up">
    <?php foreach ($links as $link):
        $icon = $link['icon'];
        $link = $link['link'];
        if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        endif;
    ?>
        <?php if ($link): ?>
            <li>
                <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <?php echo wp_get_attachment_image($icon, 'full'); ?>
                    <span> <?php echo esc_html($link_title); ?></span>
                </a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>