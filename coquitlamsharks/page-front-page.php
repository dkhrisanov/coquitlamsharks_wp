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
        height: 500px;
        display: table;
        text-align: center;
    }

    .sports a {
        display: table-cell;
        vertical-align: bottom;
        margin: 0;
        padding: 0;
        height: 100%;
    }

    .sports a:hover {
        background: rgba(0, 0, 0, 0.3) !important;
    }

    @media (max-width: 1200px) {
        .sports {
            height: 350px;
        }
    }

    @media (max-width: 800px) {
        .sports {
            height: 170px;
        }
    }

    @media (max-width: 550px) {
        .sports {
            height: 110px;
        }
    }

</style>
<div class="header-image">
    <div class="sports">
        <a href="<?php echo get_site_url() ?>/swimming-2" style="background: rgba(0,0,0,0.1);">
            <img src="<?php echo get_template_directory_uri() . '/img/hero_icon_swim.png' ?>"/>
        </a><a href="<?php echo get_site_url() ?>/water-polo-2">
            <img src="<?php echo get_template_directory_uri() . '/img/hero_icon_wp.png' ?>"/>
        </a><a href="<?php echo get_site_url() ?>/diving-2" style="background: rgba(0,0,0,0.1);">
            <img src="<?php echo get_template_directory_uri() . '/img/hero_icon_dive.png' ?>"/>
        </a><a href="<?php echo get_site_url() ?>/synchronized-2">
            <img src="<?php echo get_template_directory_uri() . '/img/hero_icon_synchro.png' ?>"/>
        </a>
    </div>
</div>

<div class="container">
    <!-- start content container -->
    <br/>


    <div class="row">
        <div class="col-md-12">
            <h3> Summer Schedule </h3>
            <iframe
                src="https://www.google.com/calendar/embed?title=Practice%20schedule&height=300&wkst=2&src=e212juq1co3t1g9u0alnkd3vfc%40group.calendar.google.com&src=o88i65fu6bd34fjvh4nogb6bss%40group.calendar.google.com&src=9s8nn67pdm7s0ql3f92rrurq6g%40group.calendar.google.com&src=l55s6d5r5f728gf6ki2ukcp8ss%40group.calendar.google.com&src=nute59it1fkrpdcrul75a3vvt8%40group.calendar.google.com&src=hhesu3ufmfvduu3j959tau886g%40group.calendar.google.com&showNav=0&showPrint=0&showTabs=0&showTz=0&mode=AGENDA"
                style=" border:1px solid #ccc; " width="100%" height="300" frameborder="0" scrolling="no"></iframe>
        </div>
        <!--        <div class="col-md-6">-->
        <!--            <h3> Team and Special Events</h3>-->
        <!--            <iframe-->
        <!--                src="https://www.google.com/calendar/embed?showNav=0&showPrint=0&showTabs=0&showTz=0&mode=AGENDA&height=300&wkst=2&src=en.canadian%23holiday%40group.v.calendar.google.com"-->
        <!--                style=" border:1px solid #ccc; " width="100%" height="300" frameborder="0" scrolling="no">-->
        <!--            </iframe>-->
        <!--        </div>-->
    </div>

    <div class="row sharks-content">
        <div class="col-md-6 sharks-main">
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
        </div>
        <div class="col-md-6">
            <h3> Social Media Stories <b>#coquitlamsharks</b></h3>
            <iframe style="border:0;width:100%; height:900px;"
                    src="https://tradablebits.com/streams/coquitlamsharks/stream_widget?render_mode=tiled&min_cell=2&max_cell=3&text=yes&rate=5&single=true"></iframe>
        </div>
    </div>


    <div class="bc-support">
        <div style="text-align:center;">
            <img style="width:120px;"
                 src="<?php echo get_template_directory_uri() . '/img/best-place-on-earth-h-colour.png' ?>"/><br/>
            We acknowledge the financial assistance of the Province of British Columbia
        </div>
    </div>


    <!-- end content container -->
</div>



<?php get_footer(); ?>
