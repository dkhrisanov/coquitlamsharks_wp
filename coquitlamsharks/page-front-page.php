<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>

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

    <div class="row" style="margin-bottom:30px;">
        <div class="col-md-12">
            <h3> Summer Schedule </h3>
            <iframe
                src="https://www.google.com/calendar/embed?title=Practice%20schedule&height=300&wkst=2&src=0eab4iroa9aul65ngrcasu9hu4%40group.calendar.google.com&src=ie3efb7ntu8g6bci1jhca2hr48%40group.calendar.google.com&src=2nvm2r0vfhvamo0d340q02bsmo%40group.calendar.google.com&src=8i37tpbj24kvfbpif1857ur9kk%40group.calendar.google.com&src=o88i65fu6bd34fjvh4nogb6bss%40group.calendar.google.com&src=9s8nn67pdm7s0ql3f92rrurq6g%40group.calendar.google.com&src=l55s6d5r5f728gf6ki2ukcp8ss%40group.calendar.google.com&src=hnqama6a4kgmmufm1is9e6lbn4%40group.calendar.google.com&src=3s5goi3do20j2qf9ep1hn7trik%40group.calendar.google.com&src=hhesu3ufmfvduu3j959tau886g%40group.calendar.google.com&src=40jp9pjhgo2rbgd0bda1v0vjd0%40group.calendar.google.com&src=l5dnmgm9137k1eau2rm42cdqcg%40group.calendar.google.com&src=1qvrn6kgdjmd302pe6qc2r7g0g%40group.calendar.google.com&src=77goi2gd1t5mrgbfo4vt7ti0bo%40group.calendar.google.com&showNav=0&showPrint=0&showTabs=0&showTz=0&mode=AGENDA"
                style=" border:1px solid #ccc; " width="100%" height="300" frameborder="0" scrolling="no"></iframe>
        </div>
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
