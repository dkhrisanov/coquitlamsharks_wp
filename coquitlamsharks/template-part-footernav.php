<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <?php
            wp_nav_menu( array(
                    'theme_location'    => 'footer_menu',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'sharks-footer',
                    'menu_class'        => 'sharks-footer-link',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
            );
            ?>
        </div>
        <div class="col-sm-4 hidden-xs center;">
            <div style="margin: 40px auto;padding:20px;width:200px;height:100px;">
                we acknowledge the financial assistance of the Province of British Columbia
                <img src="<?php echo get_template_directory_uri() . '/img/best-place-on-earth-h-colour.jpg' ?>" />
            </div>
        </div>
    </div>
</div>
<?php endif; ?>