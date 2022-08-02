<?php require_once('inc/head.php'); ?>

<?php get_header(); ?>

<div class="poppins-box">
    <section class="home search container">
        <div class="type">Search - <?php the_search_query(); ?><span><?php if($paged >= 2 || $page >= 2){echo' &#8211; '.sprintf('Page %s',max( $paged,$page));} ?></span></div>
        <?php require_once('inc/main.php'); ?>
        <?php require_once('inc/pagination-ajax.php'); ?>
    </section>
    
    <?php get_footer(); ?>
</div>

<?php require_once('inc/foot.php'); ?>
