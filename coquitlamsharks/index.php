<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<div class="container">
    <!-- start content container -->
    <div class="row sharks-content">

        <div class="col-md-12 sharks-main">
            <?php
            //if this was a search we display a page header with the results count. If there were no results we display the search form.
            if (is_search()) :
                $total_results = $wp_query->found_posts;
                echo "<h3 class='page-header'>" . sprintf(__('%s Search Results for "%s"', 'Coquitlam Sharks'), $total_results, get_search_query()) . "</h3>";
                if ($total_results == 0) :
                    get_search_form(true);
                endif;
            endif;
            ?>

            <?php // theloop
            if (have_posts()) :
                while (have_posts()) : the_post();
                    // single post
                    if (is_single()) : ?>
                        <div <?php post_class(); ?>>
                            <h3 class="page-header">
                                <?php the_title(); ?>
                            </h3>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(); ?>
                                <div class="clear"></div>
                            <?php endif; ?>
                            <?php the_content(); ?>
                            <?php wp_link_pages(); ?>
                            <?php get_template_part('template-part', 'postmeta'); ?>
                            <?php comments_template(); ?>

                        </div>
                    <?php else: ?>
                        <div <?php post_class(); ?>>

                            <h4 class="page-header">
                                <a href="<?php the_permalink(); ?>"
                                   title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'coquitlamsharks'), the_title_attribute('echo=0'))); ?>"
                                   rel="bookmark"><?php the_title(); ?></a>
                            </h4>

                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(); ?>
                                <div class="clear"></div>
                            <?php endif; ?>
                            <?php the_content(); ?>
                            <?php wp_link_pages(); ?>
                            <?php get_template_part('template-part', 'postmeta'); ?>
                        </div>
                    <?php endif;
                endwhile;
                ?>
                <?php posts_nav_link(); ?>
            <?php else: ?>
                <?php get_404_template(); ?>
            <?php endif; ?>

        </div>
    </div>
    <!-- end content container -->
</div>

<?php get_footer(); ?>

