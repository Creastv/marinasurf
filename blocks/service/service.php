<?php
$service = get_field('service');
?>

<div class="b-services" data-aos="fade-up">
    <div class="swiper service-slider">
        <div class="swiper-wrapper">
            <?php foreach ($service as $item) :
                $link = $item['link'];
                $img = $item['img'];
                $title = $item['tytul'];

                if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                endif;
            ?>
                <div class="swiper-slide">
                    <div class="b-service">
                        <div class="b-service__image">
                            <?php if ($link) : ?>
                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                <?php endif; ?>
                                <?php echo wp_get_attachment_image($img, 'servic', false, array('class' => ' ')); ?>
                                <?php if ($link) : ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="b-service-conent">
                            <?php if (!empty($title)) : ?>
                                <h2> <?php echo $title; ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($desc)) : ?>
                                <div class="b-service-conent__desc">
                                    <p> <?php echo $desc; ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if ($link) : ?>
                                <div class="b-service-conent__button">
                                    <a class="btn-rev" href="<?php echo esc_url($link_url); ?>"
                                        target="<?php echo esc_attr($link_target); ?>">
                                        <?php  // echo esc_html($link_title); 
                                        ?>
                                        Czytaj więcej
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>