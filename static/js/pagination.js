jQuery(document).ready(function($) {
    //点击下一页的链接(即那个a标签)
    $('#pagination a').click(function() {
        $this = $(this);
        $this.addClass('loading').text("Loading..."); //给a标签加载一个loading的class属性，可以用来添加一些加载效果
        var href = $this.attr("href"); //获取下一页的链接地址
        if (href != undefined) { //如果地址存在
            $.ajax({ //发起ajax请求
                url: href, //请求的地址就是下一页的链接
                type: "get", //请求类型是get
                error: function(request) {
                    //如果发生错误怎么处理
                },
                success: function(data) { //请求成功
                    $this.removeClass('loading').text("Click to see more"); //移除loading属性
                    
                    var $res = $(data).find(".main .post ul li"); //从数据中挑出文章数据，请根据实际情况更改
                    $('.main .post ul').append($res.fadeOut(0).fadeIn(300)); //将数据加载加进posts-loop的标签中。

                    var $res_m = $(data).find(".main-m .post ul li"); // 移动端
                    $('.main-m .post ul').append($res_m.fadeOut(0).fadeIn(300)); // 移动端

                    var newhref = $(data).find("#pagination a").attr("href"); //找出新的下一页链接
                    if (newhref != undefined) {
                        $("#pagination a").attr("href", newhref);
                    } else {
                        $("#pagination a").remove(); //如果没有下一页了，隐藏
                    }
                }
            });
        }
        return false;
    });
});