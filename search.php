<?php require_once('inc/head.php'); ?>

<?php get_header(); ?>

<div class="ipop-box">
    <section class="home search container">
        <div class="type"><?php _e('Search','ipop'); ?> - <?php the_search_query(); ?><span><?php echo page_number(); ?></span></div>
        <?php require_once('inc/main.php'); ?>
        <?php require_once('inc/pagination-ajax.php'); ?>
    </section>
    
    <?php get_footer(); ?>
</div>

<?php require_once('inc/foot.php'); ?>
