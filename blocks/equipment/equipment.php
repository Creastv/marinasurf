<?php

$contact = get_field('konatkt');
?>

<?php if (have_rows('sporty')): ?>
    <div class="acf-tabs">
        <ul class="acf-tabs-nav">
            <?php $i = 0;
            while (have_rows('sporty')): the_row(); ?>
                <?php
                $ikona = get_sub_field('ikona');
                $tytul = get_sub_field('tytul');
                $slug = generate_slug($tytul);
                // $slug = $tytul;
                $active_class = $i === 0 ? 'active' : '';
                ?>
                <li class="<?php echo $active_class; ?>" data-tab="<?php echo $slug; ?>">
                    <span> <?php echo wp_get_attachment_image($ikona, 'full'); ?> <?php echo esc_html($tytul); ?></span>
                </li>
            <?php $i++;
            endwhile; ?>
        </ul>

        <div class="acf-tabs-content">
            <?php $i = 0;
            while (have_rows('sporty')): the_row(); ?>
                <?php
                $tytul = get_sub_field('tytul');
                $ikona = get_sub_field('ikona');
                $opis = get_sub_field('opis');
                $video = get_sub_field('video');
                $price = get_sub_field('cena');
                $gallery = get_sub_field('galeria');
                $slug = generate_slug($tytul);
                // $slug = $tytul;
                $active_class = $i === 0 ? 'active' : '';

                ?>
                <div id="<?php echo $slug; ?>" class="acf-tab-content <?php echo $active_class; ?>">
                    <div class="acf-tab-content__wrap">
                        <div class="acf-tab-content__left">
                            <h2> <?php echo esc_html($tytul); ?></h2>
                            <?php echo $opis; ?>
                            <?php if ($video) : ?>
                                <div class="acf-video">
                                    <?php echo $video; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($gallery) : ?>

                                <ul class="acf-gallery">
                                    <?php foreach ($gallery as $item) :
                                        $img_url = esc_url($item['sizes']['post-futured']);
                                        $full_url = esc_url($item['url']);
                                        $alt = esc_attr($item['alt']);
                                        $title = esc_html($item['title']);
                                    ?>
                                        <li>
                                            <a data-fancybox="gal" href="<?php echo $full_url; ?>" title="<?php echo $title; ?>">
                                                <img class="" src="<?php echo $img_url; ?>" alt="<?php echo $alt ?: $title; ?>" />
                                                <span class="overlayer"></span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <?php if ($contact) : ?>
                            <div class="acf-tab-content__right">
                                <div class="acf-tab-content__right__wrap">
                                    <?php if ($price) : ?>
                                        <div class="price">
                                            <?php if ($price['cena']) : ?>
                                                <p>cena: <?php echo $price['cena']; ?></p>
                                            <?php endif; ?>
                                            <?php if ($price['dopisek']) : ?>
                                                <span><?php echo $price['dopisek']; ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($contact['tytul']) : ?>
                                        <h5> <?php echo $contact['tytul']; ?></h5>
                                    <?php endif; ?>
                                    <?php if ($contact['opis']) : ?>
                                        <?php echo $contact['opis']; ?>
                                    <?php endif; ?>
                                    <ul>
                                        <?php if ($contact['adres']) :
                                            $adres_url = $contact['adres']['url'];
                                            $adres_title = $contact['adres']['title'];
                                            $adres_target = $contact['adres']['target'] ? $contact['adres']['target'] : '_self';
                                        ?>
                                            <li>
                                                <a href="<?php echo esc_url($adres_url); ?>"
                                                    target="<?php echo esc_attr($adres_target); ?>">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M3.33301 8.45273C3.33301 4.70489 6.31778 1.66666 9.99967 1.66666C13.6816 1.66666 16.6663 4.70489 16.6663 8.45273C16.6663 12.1712 14.5386 16.5103 11.2188 18.062C10.4449 18.4238 9.55446 18.4238 8.78056 18.062C5.46078 16.5103 3.33301 12.1712 3.33301 8.45273Z"
                                                            stroke="#FDC400" stroke-width="1.25" />
                                                        <circle cx="10" cy="8.33334" r="2.5" stroke="#FDC400" stroke-width="1.25" />
                                                    </svg>
                                                    <span><?php echo esc_html($adres_title); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($contact['nr_telefonu']) :
                                            $phone_url = $contact['nr_telefonu']['url'];
                                            $phone_title = $contact['nr_telefonu']['title'];
                                            $phone_target = $contact['nr_telefonu']['target'] ? $contact['nr_telefonu']['target'] : '_self';
                                        ?>
                                            <li>
                                                <a href="<?php echo esc_url($phone_url); ?>"
                                                    target="<?php echo esc_attr($phone_target); ?>">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.36433 4.43015L8.90518 5.39926C9.39326 6.27383 9.19733 7.42111 8.4286 8.18984C8.4286 8.18984 8.4286 8.18984 8.4286 8.18985C8.4285 8.18994 7.49624 9.12238 9.18677 10.8129C10.8767 12.5029 11.8092 11.5718 11.8098 11.5711C11.8099 11.5711 11.8098 11.5711 11.8099 11.5711C12.5786 10.8024 13.7259 10.6064 14.6004 11.0945L15.5695 11.6354C16.8901 12.3724 17.0461 14.2244 15.8853 15.3852C15.1878 16.0827 14.3333 16.6254 13.3888 16.6612C11.7987 16.7215 9.09824 16.3191 6.38943 13.6103C3.68061 10.9014 3.27819 8.20103 3.33847 6.61092C3.37428 5.66634 3.91701 4.81187 4.61451 4.11437C5.7753 2.95358 7.62732 3.10954 8.36433 4.43015Z"
                                                            stroke="#FDC400" stroke-width="1.25" stroke-linecap="round" />
                                                    </svg>
                                                    <span><?php echo esc_html($phone_title); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($contact['adres_e-mail']) :
                                            $email_url = $contact['adres_e-mail']['url'];
                                            $email_title = $contact['adres_e-mail']['title'];
                                            $email_target = $contact['adres_e-mail']['target'] ? $contact['adres_e-mail']['target'] : '_self';
                                        ?>
                                            <li>
                                                <a href="<?php echo esc_url($email_url); ?>"
                                                    target="<?php echo esc_attr($email_target); ?>">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1.66699 10C1.66699 6.85731 1.66699 5.28596 2.6433 4.30965C3.61961 3.33334 5.19096 3.33334 8.33366 3.33334H11.667C14.8097 3.33334 16.381 3.33334 17.3573 4.30965C18.3337 5.28596 18.3337 6.85731 18.3337 10C18.3337 13.1427 18.3337 14.7141 17.3573 15.6904C16.381 16.6667 14.8097 16.6667 11.667 16.6667H8.33366C5.19096 16.6667 3.61961 16.6667 2.6433 15.6904C1.66699 14.7141 1.66699 13.1427 1.66699 10Z"
                                                            stroke="#FDC400" stroke-width="1.25" />
                                                        <path
                                                            d="M5 6.66666L6.79908 8.16589C8.32961 9.44133 9.09488 10.0791 10 10.0791C10.9051 10.0791 11.6704 9.44133 13.2009 8.16589L15 6.66666"
                                                            stroke="#FDC400" stroke-width="1.25" stroke-linecap="round" />
                                                    </svg>

                                                    <span><?php echo esc_html($email_title); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                    <?php if ($contact['link']) :
                                        $link_url = $contact['link']['url'];
                                        $link_title = $contact['link']['title'];
                                        $link_target = $contact['link']['target'] ? $contact['link']['target'] : '_self';
                                    ?>
                                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"
                                            class="btn-main"><?php echo esc_html($link_title); ?></a>
                                    <?php endif; ?>
                                </div>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php $i++;
            endwhile; ?>
        </div>
    </div>
<?php endif; ?>