<section class="main">
    <div class="post">
        <ul>
            <?php $i=0; ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <li>
                        <div class="pic">
                            <?php if(has_post_thumbnail()){the_post_thumbnail('large');}else{ ?>
                                <img src="<?php echo catch_that_image(); ?>?<?php $i++; echo $i; ?>" alt="">
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
                                <?php if(is_sticky()){?><div class="sticky"><span class="iconfont icon-up-circle"></span> Sticky</div><?php } ?>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="no-post">Have no more!</div>
            <?php endif; ?>
        </ul>
    </div>
</section>

<section class="main-m">
    <dic class="post">
        <ul>
            <?php $i=0; ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <li>
                        <div class="pic">
                            <a href="<?php the_permalink() ?>">
                                <?php if(has_post_thumbnail()){the_post_thumbnail('large');}else{ ?>
                                    <img src="<?php echo catch_that_image(); ?>?<?php $i++; echo $i; ?>" alt="">
                                <?php } ?>
                            </a>
                        </div>
                        <div class="box">
                            <div class="top">
                                <div class="cate"><?php echo the_category(', ') ?></div>
                                <div class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                            </div>
                            <div class="info">
                                <div class="date"><span class="iconfont icon-time-circle"></span> <?php echo get_the_date(); ?></div>
                                <div class="views"><span class="iconfont icon-eye"></span> <?php echo getPostViews(get_the_ID()); ?> Views</div>
                                <?php if(is_sticky()){?><div class="sticky"><span class="iconfont icon-up-circle"></span> Sticky</div><?php } ?>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="no-post">Have no more!</div>
            <?php endif; ?>
        </ul>
    </dic>
</section>