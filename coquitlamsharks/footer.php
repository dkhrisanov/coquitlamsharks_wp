<div class="bc-support">
    <div style="text-align:center;">
        <img style="width:120px;"
             src="<?php echo get_template_directory_uri() . '/img/best-place-on-earth-h-colour.png' ?>"/><br/>
        We acknowledge the financial assistance of the Province of British Columbia
    </div>
</div>

</div>
<div class="sharks-footer">
    <?php get_template_part('template-part', 'footernav'); ?>
</div>

<!-- end main container -->
<?php wp_footer(); ?>

<script type="text/javascript">
    // menu fixes
    $(document).ready(function () {
        $('.menu-item-object-custom > a').attr('target', '_blank');
    });

    if (!self == top) {
        window.top.location.href = "http://www.coquitlamsharks.org";
    }
</script>
</body>
</html>