<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/static/strawberry/style.css">

<header class="header">
    <div class="navbar">
        <div class="left">
            <?php if(get_site_icon_url()) { ?>
                <div class="logo">
                    <a href="<?php bloginfo('url'); ?>"><img src="<?php site_icon_url(); ?>" alt=""></a>
                </div>
            <?php } ?>
            <div class="nav">
                <?php get_menu(); ?>
                <script>
                    const has_menu_item_ul = document.querySelectorAll('#menu #item .menu-item-has-children');
                    const menu_item_ul = document.querySelectorAll('#menu #item .sub-menu');
                    const item_children_box = [];
                    for(let i=0; i<has_menu_item_ul.length; i++) {
                        item_children_box[i] = document.createElement('div');
                        has_menu_item_ul[i].insertBefore(item_children_box[i],menu_item_ul[i]);
                        item_children_box[i].appendChild(menu_item_ul[i]);
                        item_children_box[i].setAttribute('class','item-children-box');
                    }
                </script>
            </div>
        </div>
        <div class="right">
            <?php if(is_user_logged_in()){ ?>
                <div class="user">
                    <p><?php get_user_name(); ?></p>
                    <?php echo get_user_avatar(); ?>
                </div>
                <div class="menu">
                    <div class="box">
                        <li><a class="search-btn"><span class="iconfont icon-sousuo1"></span><?php _e('Search','poppins'); ?><span class="iconfont icon-right"></span></a></li>
                        <li><a class="setting" href="<?php echo home_url().'/wp-admin'; ?>" target="_blank"><span class="iconfont icon-setting"></span><?php _e('Setting','poppins'); ?><span class="iconfont icon-right"></span></a></li>
                        <li><a class="logout" href="<?php echo wp_logout_url(); ?>"><span class="iconfont icon-poweroff"></span><?php _e('Logout','poppins'); ?><span class="iconfont icon-right"></span></a></li>
                    </div>
                </div>
            <?php } else { ?>
                <?php if(get_option("hide_login") == 'true') { ?>
                    <div class="hide-login">
                        <a class="search-btn"><span class="iconfont icon-sousuo1"></span><?php _e('Search','poppins'); ?></a>
                    </div>
                    
                <? } else { ?>
                    <div class="user visitor">
                        <img src="<?php echo get_template_directory_uri(); ?>/static/images/visitor.png" alt="">
                    </div>
                    <div class="menu">
                        <div class="box">
                            <li><a class="search-btn"><span class="iconfont icon-sousuo1"></span><?php _e('Search','poppins'); ?><span class="iconfont icon-right"></span></a></li>
                            <li><a class="login" href="<?php echo home_url().'/wp-admin'; ?>"><span class="iconfont icon-login1"></span><?php _e('Login','poppins'); ?><span class="iconfont icon-right"></span></a></li>
                        </div>
                    </div>
                <?php } ?>
            <? } ?>
        </div>
    </div>
</header>

<!-- 移动端 -->
<section class="header-m container">
    <div class="navbar-m">
        <div class="left"><div class="menu-btn"><span class="iconfont icon-menu"></span></div></div>
        <div class="right"><div class="search-btn-m"><span class="iconfont icon-sousuo1"></span></div></div>
    </div>
</section>

<!-- 遮罩 -->
<div class="menu-mask"></div>

<!-- 菜单 -->
<section class="menu-m">
    <div class="top">
        <div class="top-box">
            <?php require_once('inc/time-prompt.php'); ?>
            <div class="menu-btn-c"><span class="iconfont icon-doubleleft"></span></div>
        </div>
    </div>
    <div class="center">
        <?php if(is_user_logged_in()){ ?>
            <div class="user-box">
                <?php echo get_user_avatar(); ?>
                <p><?php get_user_name(); ?></p>
            </div>
        <? } ?>
        <div class="menu-box">
            <div class="nav">
                <?php get_menu_m(); ?>
                <script>
                    const menu_item_m = document.querySelectorAll('.menu-m .center .menu-box .nav-m .item-m > .menu-item-has-children > a');
                    const menu_item_box_m = [];
                    for(let i=0; i<menu_item_m.length; i++) {
                        menu_item_box_m[i] = document.createElement('i');
                        menu_item_m[i].appendChild(menu_item_box_m[i]).setAttribute('class','iconfont icon-arrow-down');
                    }
                </script>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="left">
            <?php if(get_site_icon_url()) { ?>
                <a href="<?php bloginfo('url'); ?>"><img src="<?php site_icon_url(); ?>" alt=""></a>
            <?php } ?>
        </div>
        <div class="right">
            <?php if(is_user_logged_in()) { ?>
                <a class="setting" href="<?php echo home_url().'/wp-admin'; ?>"><span class="iconfont icon-setting"></span><p><?php _e('Setting','poppins'); ?></p></a>
                <a class="logout" href="<?php echo wp_logout_url(); ?>"><span class="iconfont icon-poweroff"></span><p><?php _e('Logout','poppins'); ?></p></a>
            <?php } else { ?>
                <?php if(get_option("hide_login") == 'true') {} else { ?>
                    <a class="visitor" href="<?php echo home_url().'/wp-admin'; ?>"><span class="iconfont icon-login1"></span><p><?php _e('Login','poppins'); ?></p></a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>



<!-- 搜索 -->
<?php require_once('searchform.php'); ?>