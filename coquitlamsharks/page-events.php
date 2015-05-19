<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<style type="text/css">
    .header-image {
        background: url('<?php echo get_template_directory_uri() . '/img/hero_header-3.jpg'?>') center 0 no-repeat;
        background-size: cover;
    }

    .sports {
        height: 150px;
        background-color: rgba(0, 0, 0, 0.4);
        overflow: hidden;
    }

</style>
<script type="text/javascript">
    function toggleSport(evt) {
        var sport = $(evt.target).parent().attr('data-sport');
        $(evt.target).parent().toggleClass('inactive');
        $(".schedule-" + sport).toggleClass('schedule-inactive');
        return false;
    }

    $(document).ready(function () {
        $(".sports").find('a').click(toggleSport);
    });
</script>
<div class="header-image">
    <div class="sports">
    </div>
</div>

<div class="container">
    <!-- start content container -->
    <br/>

    <div class="row" style="margin-bottom:30px;">
        <div class="col-md-12 schedule-body">
            <?php // theloop
            if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                <?php wp_link_pages(); ?>
                <?php comments_template(); ?>
            <?php endwhile; ?>
            <?php else: ?>
                <?php get_404_template(); ?>
            <?php endif; ?>
        </div>
    </div>


    <!-- end content container -->
</div>



<?php get_footer(); ?>
