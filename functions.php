<?php

// 网站标题
function show_wp_title(){
    global $page, $paged;
    wp_title( '&#8211;', true, 'right' );
    bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        echo ' &#8211; ' . $site_description;
    }   
    if ( $paged >= 2 || $page >= 2 ) {
        echo ' &#8211; ' . sprintf( 'Page %s', max( $paged, $page ) );
    }   
}

// 设定摘要长度
function new_excerpt_length($length) {
    return 500;
  }
add_filter('excerpt_length', 'new_excerpt_length');

// 自定义头像
require('admin/avatar/wp-user-profile-avatar.php'); 

// 获取用户头像
function get_user_avatar() {
    global $current_user;
    get_currentuserinfo();
    return get_avatar($current_user -> ID, 400);
}

// 获取用户昵称
function get_user_name() {
    global $current_user, $display_name;
    get_currentuserinfo();
    echo $current_user -> display_name;
}

// 注册菜单
register_nav_menus( array(        
    'pc' => '电脑端',
    'mobile' => '移动端',
) );

// 电脑端菜单
function get_menu() {
    wp_nav_menu( array( 
        'theme_location' => 'pc',
        'container_id' => 'menu',
        'container_class' => 'menu',
        'menu_id' => 'item',
        'menu_class' => 'item',
    ) );
}

// 移动端菜单
function get_menu_m() {
    wp_nav_menu( array( 
        'theme_location' => 'mobile',
        'container_id' => 'nav-m',
        'container_class' => 'nav-m',
        'menu_id' => 'item-m',
        'menu_class' => 'item-m',
    ) );
}

// 移除分类
require_once('functions/remove-category.php');

// 特色图
if(function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails',array('post','page'));
}

// 默认封面图
function default_pic() {
    $default_pic = get_template_directory_uri() . '/static/images/default-pic.png';
    return $default_pic;
}

//获取文章第一张图片
function catch_that_image() { 
    global $post, $posts; 
    $first_img = ''; 
    ob_start(); 
    ob_end_clean(); 
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches); 
    $first_img = $matches [1] [0]; 
    if(empty($first_img)){  
        if(get_option("random_pic")) {
            $first_img = get_option("random_pic");
        } else {
            $first_img = default_pic(); 
        }
        
    } 
    return $first_img; 
} 

// 显示文章浏览次数
function getPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta ( $postID, $count_key, true );
    if ($count == '') {
        delete_post_meta ( $postID, $count_key );
        add_post_meta ( $postID, $count_key, '0' );
        return "0";
    }
    return $count . '';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta ( $postID, $count_key, true );
    if ($count == '') {
        $count = 0;
        delete_post_meta ( $postID, $count_key );
        add_post_meta ( $postID, $count_key, '0' );
    } else {
        $count ++;
        update_post_meta ( $postID, $count_key, $count );
    }
}

// 主题后台设置
add_action('admin_menu', 'pop_set');
function pop_set(){
    add_menu_page(
        'Poppins Setting', 
        'Poppins Setting', 
        'edit_themes', 
        'pop_opt', 
        'pop_opt');}
function pop_opt(){
    require get_template_directory()."/admin/option.php";
}

// 分页第一页返回首页
$current_url = home_url(add_query_arg(array()));
$home_page_1 = home_url() . '/page/1';
if($current_url == $home_page_1) {
    wp_redirect(home_url());
}

//搜索时排除页面
function exclude_page() {
	global $post;
	if ($post->post_type == 'page') {
		return true;
	} else {
		return false;
	}
}

//禁止空搜索
add_filter( 'request', 'uctheme_redirect_blank_search' );
function uctheme_redirect_blank_search( $query_variables ) {
    if(isset($_GET['s']) && !is_admin()) {
        if(empty($_GET['s']) || ctype_space($_GET['s'])) {
            wp_redirect( home_url() );
            exit;
        }
    }
    return $query_variables;
}

// 文章页码
function wp_pagenavi() {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;  
    $pagination = array(
        'base' => @add_query_arg('paged','%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'show_all' => false,
        'type' => 'plain',
        'end_size'=>'1',
        'mid_size'=>'1',
        'prev_text' => '<', //♂
        'next_text' => '>' //♀
    ); 
    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');
    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array('s'=>get_query_var('s'));
    echo paginate_links($pagination);
}

// 登出后重定向
function auto_redirect_after_logout(){
    wp_redirect(home_url());
    exit();
}
add_action('wp_logout','auto_redirect_after_logout');
