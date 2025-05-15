<div class="f-info container">
    <div class="f-info__wrap">
        <p><?php _e('Copyright © 2025 Marinasurf', 'go'); ?> | Usługi marketingowe: <a href="https://managerka.com/"
                target="_blank"> Managerka.com </a> | Realizacja: <a href="https://creastv.pl/"
                target="_blank">Creastv.pl</a></p>
        <div class="f-info_nav">
            <?php
            wp_nav_menu([
                'theme_location' => 'secundary_menu',
                'container' => 'nav',
                'container_class' => "footer-menu"
            ]);
            ?>
        </div>
    </div>
</div>