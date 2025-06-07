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
        <div class="swiper-nav">
            <div class="swiper-button-next s-button-next">
                <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M22 30L30 22M30 22L22 14M30 22L14 22M2 22C2 10.9543 10.9543 2 22 2C33.0457 2 42 10.9543 42 22C42 33.0457 33.0457 42 22 42C10.9543 42 2 33.0457 2 22Z"
                        stroke="#BEBEBE" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            <div class="swiper-button-prev s-button-prev">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M24 16L16 24M16 24L24 32M16 24H32M44 24C44 35.0457 35.0457 44 24 44C12.9543 44 4 35.0457 4 24C4 12.9543 12.9543 4 24 4C35.0457 4 44 12.9543 44 24Z"
                        stroke="#BEBEBE" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>
    </div>
</div>