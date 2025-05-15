<?php $images = get_field('zdjecia');

if ($images):
    $total = count($images);
    $block_id = 'gallery-' . uniqid();

    // Przygotuj dane dla JS
    $js_images = [];
    foreach ($images as $img) {
        $js_images[] = [
            'url' => $img['url'],
            'sizes' => [
                'gallery' => $img['sizes']['gallery']
            ],
            'alt' => $img['alt'],
            'title' => $img['title']
        ];
    }
?>
    <section class="gallery-area" id="<?php echo esc_attr($block_id); ?>" data-total="<?php echo esc_attr($total); ?>"
        data-display-title="<?php echo $displayTitle ? '1' : '0'; ?>">
        <div class="gallery-inner go-gallery-items">
            <?php for ($i = 0; $i < 6 && $i < $total; $i++):
                $image = $images[$i];
                $img_url = esc_url($image['sizes']['gallery']);
                $full_url = esc_url($image['url']);
                $alt = esc_attr($image['alt']);
                $title = esc_html($image['title']);
            ?>
                <div class="gallery-img go-gallery-item">
                    <?php if ($displayTitle && $title): ?>
                        <h3 class="gallery-title"><?php echo $title; ?></h3>
                    <?php endif; ?>
                    <a data-fancybox="gal" href="<?php echo $full_url; ?>" title="<?php echo $title; ?>">
                        <img src="<?php echo $img_url; ?>" alt="<?php echo $alt ?: $title; ?>" />
                    </a>
                </div>
            <?php endfor; ?>

            <?php if ($total > 6): ?>
                <div class="read-more">
                    <a href="#" class="btn-rev go-load-more" data-offset="6"
                        data-images='<?php echo json_encode($js_images); ?>'>
                        Wczytaj więcej
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.go-load-more').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const wrapper = this.closest('.gallery-area');
                const gallery = wrapper.querySelector('.go-gallery-items');
                const offset = parseInt(this.dataset.offset, 10);
                const images = JSON.parse(this.dataset.images);
                const total = parseInt(wrapper.dataset.total, 10);
                const displayTitle = wrapper.dataset.displayTitle === '1';

                const nextItems = images.slice(offset, offset + 6);
                nextItems.forEach(img => {
                    const div = document.createElement('div');
                    div.className = 'gallery-img go-gallery-item';
                    const altText = img.alt || img.title || '';
                    const titleText = img.title || '';

                    div.innerHTML = `
            ${displayTitle && titleText ? `<h2 class="gallery-title">${titleText}</h2>` : ''}
            <a data-fancybox="gal" href="${img.url}" title="${titleText}">
              <img src="${img.sizes.gallery}" alt="${altText}" />
            </a>
          `;
                    gallery.insertBefore(div, this.closest('.read-more'));
                });

                const newOffset = offset + 6;
                this.dataset.offset = newOffset;

                if (newOffset >= total) {
                    this.closest('.read-more').remove();
                }
            });
        });
    });
</script>