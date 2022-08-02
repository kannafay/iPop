<?php require_once('inc/head.php'); ?>

<?php get_header(); ?>

<div class="poppins-box">
    <section class="home author container">
        <div class="author-box">
            <div class="avatar"><?php echo get_avatar(get_the_author_ID()); ?></div>
            <div class="user-info">
                <div class="top">
                    <div class="name"><?php echo get_the_author_meta('nickname'); ?></div>
                    <div class="description"><?php echo get_the_author_meta('description'); ?></div>
                </div>
                <div class="social"></div>
            </div>
        </div>
        <div class="type">Published<span><?php if($paged >= 2 || $page >= 2){echo' &#8211; '.sprintf('Page %s',max( $paged,$page));} ?></span></div>
        <?php require_once('inc/main.php'); ?>
        <?php require_once('inc/pagination-ajax.php'); ?>
    </section>
    
    <?php get_footer(); ?>
</div>

<?php require_once('inc/foot.php'); ?>
