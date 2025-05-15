<div class="archive-cat">
    <span>Wyświetlaj po kategoriach</span>
    <ul>
        <?php
        $categories = get_categories();
        foreach ($categories as $category) {
            $active = '';

            if (is_category() && get_queried_object_id() === $category->term_id) {
                $active = 'active';
            }

            echo '<li class="' . esc_attr($active) . '">
            <a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>
        </li>';
        }
        ?>
    </ul>
</div>