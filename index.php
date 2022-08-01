<?php require_once('inc/head.php'); ?>

<?php get_header(); ?>

<section class="home container">
    <?php require_once('inc/recommend.php'); ?>
    <div class="type">Popular<span><?php if($paged >= 2 || $page >= 2){echo' &#8211; '.sprintf('Page %s',max( $paged,$page));} ?></span></div>
    <?php require_once('inc/main.php'); ?>
    <?php require_once('inc/pagination-ajax.php'); ?>
</section>

<?php get_footer(); ?>

<?php require_once('inc/foot.php'); ?>
