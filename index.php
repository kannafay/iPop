<?php require_once('inc/head.php'); ?>

<?php get_header(); ?>

<div class="ipop-box">
    <section class="home index container">
        <?php require_once('inc/recommend.php'); ?>
        <div class="type"><?php _e('Popular','ipop'); ?><span><?php echo page_number(); ?></span></div>
        <?php require_once('inc/main.php'); ?>
        <?php require_once('inc/pagination-ajax.php'); ?>
    </section>
    <?php get_footer(); ?>
</div>

<?php require_once('inc/foot.php'); ?>
