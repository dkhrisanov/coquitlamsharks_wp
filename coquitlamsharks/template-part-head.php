<?php global $dm_settings; ?>

<div class="container sharks-container">

<?php if ($dm_settings['show_header'] != 0) : ?>

<div class="sharks-header">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img src="<?php echo get_template_directory_uri() . '/img/header.jpg' ?>" />
    </a>
</div>

<?php endif; ?>