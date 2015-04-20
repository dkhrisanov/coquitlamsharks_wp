<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<!-- start content container -->
<style type="text/css">
    .header-image {
        background: url('<?php echo get_template_directory_uri() . '/img/hero_header-2.jpg'?>') center 0 no-repeat;
        background-size: cover;
        height: 200px;
    }
</style>

<div class="header-image">

</div>
<div class="container">
    <div class="row sharks-content">
        <div class="col-md-12 sharks-main">
            <br/>

            <h3 id="pages">Pages</h3>
            <ul>
                <?php
                // Add pages you'd like to exclude in the exclude here
                wp_list_pages(
                    array(
                        'exclude' => '',
                        'title_li' => '',
                    )
                );
                ?>
            </ul>

            <h3 id="posts">Posts</h3>
            <ul>
                <?php
                // Add categories you'd like to exclude in the exclude here
                $cats = get_categories('include=19');
                foreach ($cats as $cat) {
                    echo "<li><h4>" . $cat->cat_name . "</h4>";
		    echo $cat->cat_id;
                    echo "<ul>";
                    query_posts('posts_per_page=-1&cat=' . $cat->cat_ID);
                    while (have_posts()) {
                        the_post();
                        $category = get_the_category();
                        // Only display a post link once, even if it's in multiple categories
                        if ($category[0]->cat_ID == $cat->cat_ID) {
                            echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                        }
                    }
                    echo "</ul>";
                    echo "</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<!-- end content container -->

<?php get_footer(); ?>
