<section class="searchform">

    <!-- 遮罩 -->
    <div class="searchform-mask"></div>

    <div class="search">
        <div class="title"><span class="iconfont icon-sousuo1"></span><?php _e('Search','ipop'); ?></div>
        <form class="form-box" role="search" method="get" id="searchform" action="<?php bloginfo('url') ?>">
        	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="<?php _e('Make good use of search!','ipop'); ?>"/>
        </form>
        <div class="btn"><?php _e('Cancel','ipop'); ?></div>
    </div>

</section>


