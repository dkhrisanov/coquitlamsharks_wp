<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<!-- start content container -->
<div class="container">

    This is sitemap!!!!!


    <div class="row sharks-content">
        <div class="col-md-12 sharks-main">
            <?php // theloop
            if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h3 class="page-header"><?php the_title(); ?></h3>
                <?php the_content(); ?>
                <?php wp_link_pages(); ?>
                <?php comments_template(); ?>
            <?php endwhile; ?>
            <?php else: ?>
                <?php get_404_template(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- end content container -->

<?php get_footer(); ?>
