<?php require_once('inc/head.php'); ?>

<?php get_header(); ?>

<style>
    @media screen and (max-width: 640px) {
        .header-m {
            background-color: var(--bgc-0);
            -webkit-backdrop-filter: blur(0);
            backdrop-filter: blur(0);
            border-bottom: 1px solid var(--bgc-0);
        }
        
        .navbar-m .left .menu-btn span, 
        .navbar-m .right .search-btn-m span {
            color: var(--text-box);
        }
        .headroom--not-top {
            background-color: var(--bgc-filter);
            -webkit-backdrop-filter: blur(20px);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
        }
        .headroom--not-top .navbar-m .left .menu-btn span, 
        .headroom--not-top .navbar-m .right .search-btn-m span {
            color: var(--text);
        }
    }
</style>

<section class="single container">
    <div class="top container">
        <?php if(has_post_thumbnail()){the_post_thumbnail('large');}else{ ?>
            <img src="<?php echo catch_that_image(); ?>" alt="">
        <?php } ?>
    </div>
    <div class="box">
        <div class="content">
            <div class="cate"><?php echo the_category(', ') ?></div>
            <div class="title"><?php the_title(); ?></div>
            <div class="info">
                <div class="date"><span class="iconfont icon-time-circle"></span> <?php echo get_the_date(); ?></div>
                <div class="views"><span class="iconfont icon-eye"></span> <?php setPostViews(get_the_ID()) ?><?php echo getPostViews(get_the_ID()) ?> Views</div>
                <!-- <div class="comments"><span class="iconfont icon-message"></span> <?php //if(post_password_required()){echo 'Encrypted';}elseif(comments_open()){comments_popup_link('0 Comment', '1 Comment', '% Comments');}else{echo 'Closed';} ?></div> -->
            </div>
            <div class="author">
                <a href="<?php the_post();home_url();echo '/author/';echo get_the_author_meta('user_login');rewind_posts(); ?>"><?php the_post();echo get_avatar(get_the_author_ID());rewind_posts(); ?></a>
                <span><?php the_author_posts_link(); ?></span>
            </div>     
            <div class="text"><?php the_content(); ?></div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<?php require_once('inc/foot.php'); ?>
