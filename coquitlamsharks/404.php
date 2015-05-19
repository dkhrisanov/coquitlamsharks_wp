<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

    <!-- start content container -->
    <div class="container">
        <div class="row sharks-content">

            <div class="col-md-12 sharks-main">
                <div style="text-align:center;">
                    <h3><?php _e('Sorry This Page Does Not Exist!', 'coquitlamsharks'); ?></h3>

                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo get_template_directory_uri() . '/img/shark_logo-header.png' ?>" style=width:400px;padding:50px;/>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end content container -->
<?php get_footer(); ?>