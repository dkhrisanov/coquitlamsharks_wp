<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<div class="header-image">
    <div class="sports">
        <a href="#swimming" style="background: rgba(0,0,0,0.1);">
            <img src="<?php echo get_template_directory_uri() . '/img/hero_icon_swim.png' ?>"/>
        </a><a  href="#wp">
            <img src="<?php echo get_template_directory_uri() . '/img/hero_icon_wp.png' ?>"/>
        </a><a  href="#dive" style="background: rgba(0,0,0,0.1);">
            <img src="<?php echo get_template_directory_uri() . '/img/hero_icon_dive.png' ?>"/>
        </a><a  href="#synchro">
            <img src="<?php echo get_template_directory_uri() . '/img/hero_icon_synchro.png' ?>"/>
        </a>
    </div>
</div>

<div class="container">
    <!-- start content container -->
    <br/>
    <div class="row" style="margin-bottom:30px;">
        <div class="col-md-12">
            <?php the_content(); ?>
        </div>
    </div>


    <!-- end content container -->
</div>



<?php get_footer(); ?>
