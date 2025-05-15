<?php $gallery = get_field('zdjecia');
$link = get_field('link');
if ($link):
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
endif;



?>
<section class="b-gallery-slider">
    <div class="container-large">
        <div class="swiper mySwiper2">
            <div class="swiper-wrapper">
                <?php foreach ($gallery as $item) :
                    $img_url = esc_url($item['sizes']['full']);
                    $full_url = esc_url($item['url']);
                    $alt = esc_attr($item['alt']);
                    $title = esc_html($item['title']);
                ?>
                    <div class="swiper-slide">
                        <a data-fancybox="gal" href="<?php echo $full_url; ?>" title="<?php echo $title; ?>">
                            <img class="" src="<?php echo $full_url; ?>" alt="<?php echo $alt ?: $title; ?>" />
                            <span class="overlayer"></span>
                        </a>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="swiper-nav">
                <div class="swiper-button-next">
                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M22 30L30 22M30 22L22 14M30 22L14 22M2 22C2 10.9543 10.9543 2 22 2C33.0457 2 42 10.9543 42 22C42 33.0457 33.0457 42 22 42C10.9543 42 2 33.0457 2 22Z"
                            stroke="#BEBEBE" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="swiper-button-prev">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M24 16L16 24M16 24L24 32M16 24H32M44 24C44 35.0457 35.0457 44 24 44C12.9543 44 4 35.0457 4 24C4 12.9543 12.9543 4 24 4C35.0457 4 44 12.9543 44 24Z"
                            stroke="#BEBEBE" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-thumbnails">
        <div thumbsSlider="" class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php foreach ($gallery as $item) :
                    $img_url = esc_url($item['sizes']['thumbnail']);
                    $full_url = esc_url($item['url']);
                    $alt = esc_attr($item['alt']);
                    $title = esc_html($item['title']);
                ?>
                    <div class="swiper-slide">
                        <img src="<?php echo $img_url; ?>" alt="<?php echo $alt ?: $title; ?>" />
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php if ($link): ?>
            <div class="swiper-thumbnails-link">
                <a class="button" href="<?php echo esc_url($link_url); ?>"
                    target="<?php echo esc_attr($link_target); ?>"><span><?php echo esc_html($link_title); ?></span></a>

            </div>
        <?php endif; ?>
    </div>
</section>

<script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 3,
        freeMode: true,
        autoplay: {
            delay: 4000
        },
        watchSlidesProgress: true,
        breakpoints: {
            640: {
                slidesPerView: 3,

            },
            768: {
                slidesPerView: 4,

            },
            1024: {
                slidesPerView: 8,

            },
        },
    });
    var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        autoplay: {
            delay: 4000
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },


    });
</script>