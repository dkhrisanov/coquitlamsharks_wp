<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
<div class="row">
    <div class="col-sm-8">
        <?php
        wp_nav_menu( array(
                'theme_location'    => 'footer_menu',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'sharks-footer-link',
                'menu_class'        => 'link',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
        );
        ?>
    </div>
    <div class="col-sm-4 hidden-xs center;">
        <img src="<?php echo get_template_directory_uri() . '/img/logo_bcgov-150x58.gif' ?>" />
    </div>
</div>
<?php endif; ?>