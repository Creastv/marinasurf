<div class="h-nav">
    <div class="container">
        <div class="h-nav__wrap">
            <nav class="navbar__navigation js-navbar__navigation">
                <?php
                $navLocation = 'primary_menu';
                $temp_menu = wp_nav_menu(array(
                    'theme_location'  => $navLocation,
                    'menu_id'           => 'navbar__navigation__list',
                    'menu_class'       => 'navbar__navigation__list',
                    'container'       => false,
                    'echo'               => false,
                    'items_wrap'       => '<div class="navbar__navigation__list"><ul id="%1$s" class="%2$s js-navbar__navigation__list " itemscope itemtype="https://www.schema.org/SiteNavigationElement">%3$s </ul></div>',
                ));

                echo $temp_menu;
                ?>
            </nav>
        </div>
    </div>
</div>