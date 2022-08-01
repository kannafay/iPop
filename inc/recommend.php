<?php
    $recommend = new WP_Query(array(
        'post__in' => explode(',',get_option("recommend")),
        'post__not_in' => get_option('sticky_posts'),
        'showposts' => 1,
    ));
?>

<?php $i=0; ?>
<?php if($recommend->have_posts()) : while($recommend->have_posts()) : $recommend->the_post(); ?>
    <div class="recommend">
        <div class="pic">
            <?php if(has_post_thumbnail()){the_post_thumbnail('large');}else{ ?>
                <img src="<?php echo catch_that_image(); ?>?recommend=<?php $i++; echo $i; ?>" alt="">
            <?php } ?>
        </div>
        <div class="box">
            <div class="content">
                <div class="top">
                    <div class="cate"><?php echo the_category(', ') ?></div>
                    <div class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                    <div class="excerpt"><?php the_excerpt(); ?></div>
                </div>
                <div class="readmore"><a href="<?php the_permalink() ?>">Read more</a></div>
            </div>
            <div class="info">
                <div class="date"><span class="iconfont icon-time-circle"></span> <?php echo get_the_date(); ?></div>
                <div class="views"><span class="iconfont icon-eye"></span> <?php echo getPostViews(get_the_ID()) ?> Views</div>
                <!-- <div class="comments"><span class="iconfont icon-message"></span> <?php //if(post_password_required()){echo 'Encrypted';}elseif(comments_open()){comments_popup_link('0 Comment', '1 Comment', '% Comments');}else{echo 'Closed';} ?></div> -->
            </div>
        </div>
    </div>

    <!-- 移动端 -->
    <div class="recommend-m">
        <div class="pic">
            <a href="<?php the_permalink() ?>">
                <?php if(has_post_thumbnail()){the_post_thumbnail('large');}else{ ?>
                    <img src="<?php echo catch_that_image(); ?>" alt="">
                <?php } ?>
            </a>
            <div class="cate"><?php echo the_category(', ') ?></div>
        </div>
        <div class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
        <div class="box">
            <div class="date"><span class="iconfont icon-time-circle"></span> <?php echo get_the_date(); ?></div>
            <div class="views"><span class="iconfont icon-eye"></span> <?php echo getPostViews(get_the_ID()) ?> Views</div>
            <!-- <div class="comments"><span class="iconfont icon-message"></span> <?php //if(post_password_required()){echo 'Encrypted';}elseif(comments_open()){comments_popup_link('0 Comment', '1 Comment', '% Comments');}else{echo 'Closed';} ?></div> -->
        </div>
    </div>
<?php endwhile; ?>
<?php endif; ?>