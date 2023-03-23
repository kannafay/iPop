<?php require_once('inc/head.php'); ?>

<?php get_header(); ?>

<div class="ipop-box">
    <section class="home category container">
        <div class="type"><?php _e('Category','ipop'); ?> - <?php single_cat_title(); ?><span><?php echo page_number(); ?></span></div>
        <?php require_once('inc/main.php'); ?>
        <?php require_once('inc/pagination-ajax.php'); ?>
    </section>

    <?php get_footer(); ?>
</div>


<?php require_once('inc/foot.php'); ?>
