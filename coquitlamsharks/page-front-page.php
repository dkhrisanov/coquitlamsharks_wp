<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<style type="text/css">
    .header-image {
        background: url('<?php echo get_template_directory_uri() . '/img/hero_header-1.jpg'?>') center 0 no-repeat;
        background-size: cover;
    }

    .sports {
        margin: 0 auto;
        height: 240px;
        text-align: center;
    }

    .sports a {
        display: inline-block;
        margin: 0;
        padding: 0;
        height: 100%;
    }

    .sports a:hover {
        background: rgba(0, 0, 0, 0.2)
    }

    @media (max-width: 800px){
        .sports {
            height: 170px;
        }
    }

    @media (max-width: 550px){
        .sports {
            height: 110px;
        }
    }

</style>
<div class="header-image">
    <div class="sports">
        <a href="<?php echo get_site_url() ?>/swimming-2">
            <img src="<?php echo get_template_directory_uri() . '/img/hero_icon_swim.png' ?>"/>
        </a><a href="<?php echo get_site_url() ?>/water-polo-2">
            <img src="<?php echo get_template_directory_uri() . '/img/hero_icon_wp.png' ?>"/>
        </a><a href="<?php echo get_site_url() ?>/diving-2">
            <img src="<?php echo get_template_directory_uri() . '/img/hero_icon_dive.png' ?>"/>
        </a><a href="<?php echo get_site_url() ?>/synchro-2">
            <img src="<?php echo get_template_directory_uri() . '/img/hero_icon_synchro.png' ?>"/>
        </a>
    </div>
</div>

<div class="container">
    <!-- start content container -->
    <br/>


    <div class="row">
        <div class="col-md-6">
            <h3> Summer Schedule </h3>
            <iframe
                src="https://www.google.com/calendar/embed?showNav=0&showPrint=0&showTabs=0&showTz=0&mode=AGENDA&height=300&wkst=2&src=en.canadian%23holiday%40group.v.calendar.google.com"
                style=" border-width:0 " width="100%" height="300" frameborder="0" scrolling="no">
            </iframe>
        </div>
        <div class="col-md-6">
            <h3> Team and Special Events</h3>
            <iframe
                src="https://www.google.com/calendar/embed?showNav=0&showPrint=0&showTabs=0&showTz=0&mode=AGENDA&height=300&wkst=2&src=en.canadian%23holiday%40group.v.calendar.google.com"
                style=" border-width:0 " width="100%" height="300" frameborder="0" scrolling="no">
            </iframe>
        </div>
    </div>

    <div class="row sharks-content">
        <div class="col-md-12 sharks-main">
            <h3> Shark Posts </h3>
            <?php $loop = new WP_Query(array('cat' => 'events', 'showposts' => 5, 'ignore_sticky_posts' => true)); ?>
            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <div>
                    <div class="entry-summary">
                        <h4><?php the_title(); ?></h4>
                        <?php get_template_part('template-part', 'postmeta'); ?>
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; ?>

            <h3> Social Media Stories <b>#coquitlamsharks</b></h3>
            <!-- Stream section. -->
            <div id="stream-div"></div>
            <script type="text/javascript" src="//tradablebits.com/embedded.js"></script>
            <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    loadStream("stream-div", "coquitlamsharks", null);
                });
            </script>

        </div>
    </div>
    <!-- end content container -->
</div>

<?php get_footer(); ?>

