// 滚动时隐藏header
var header_element = document.querySelector(".header");
if(header_element) {
  var headroom = [];
  headroom = new Headroom(header_element, {
    "tolerance": 5,
    "offset": 0,
  });
headroom.init();
}
var header_element_m = document.querySelector(".header-m");
if(header_element_m) {
  var headroom_m = [];
  headroom_m = new Headroom(header_element_m, {
    "tolerance": 5,
    "offset": 259,
  });
headroom_m.init();
}

// 页眉
const menu_item = document.querySelector('#menu #item');
if(menu_item) {
  menu_item.insertBefore(document.createElement('div'), menu_item.children[0]).setAttribute('class','menu-block');
}


$("#menu #item > li > a").on("mouseover", function() {
    var width = $(this).parent().width();
    var position = $(this).parent().position();
    $("#menu #item .menu-block").css({
        opacity: 1,
        width: width,
        left: position.left,
    });
})
$("#menu #item > li > a").on("mouseout", function() {
    $("#menu #item .menu-block").css({
        opacity: 0,
    });
});

// 移动端菜单
const menu_btn = document.querySelector('.menu-btn'); //open按钮
const menu_btn_c = document.querySelector('.menu-btn-c'); //close按钮
const menu_m = document.querySelector('.menu-m'); // 菜单
const menu_mask = document.querySelector('.menu-mask'); //遮罩

menu_btn.onclick = function() {
  menu_m.className = 'menu-m menu-m-o';
  menu_mask.className = 'menu-mask menu-mask-o';
}
menu_btn_c.onclick = function() {
  menu_m.className = 'menu-m';
  menu_mask.className = 'menu-mask';

}
menu_mask.onclick = function() {
  menu_m.className = 'menu-m';
  this.className = 'menu-mask';
}

// 移动端菜单栏
const has_children_a = document.querySelectorAll('.menu-m .center .menu-box .nav-m .item-m > .menu-item-has-children > a');
const has_children_ul = document.querySelectorAll('.menu-m .center .menu-box .nav-m .item-m > .menu-item-has-children > .sub-menu');
const has_children_a_i = document.querySelectorAll('.menu-m .center .menu-box .nav-m .item-m > .menu-item-has-children > a i');

for(let i=0; i<has_children_a.length; i++) {
  has_children_a[i].onclick = function() {
    has_children_ul[i].classList.toggle('sub-menu-o');
    has_children_a_i[i].classList.toggle('icon-arrow-right');
  }
}


// 搜索
const search_btn = document.querySelector('.header .search-btn'); // pc端按钮
const search_btn_m = document.querySelector('.header-m .search-btn-m'); //移动端按钮
const searchform = document.querySelector('.searchform'); //搜索
const searchform_box = document.querySelector('.searchform .search .form-box'); //表单box
const searchform_mask = document.querySelector('.searchform-mask'); //遮罩
const searchform_cancel = document.querySelector('.searchform .search .btn'); //取消按钮

search_btn.onclick = function() {
  searchform.className = 'searchform searchform-o';
  searchform_box.className = 'form-box form-box-o';
}
search_btn_m.onclick = function() {
  searchform.className = 'searchform searchform-o';
  searchform_box.className = 'form-box form-box-o';
}

searchform_mask.onclick = function() {
  searchform.className = 'searchform';
  searchform_box.className = 'form-box';
}

searchform_cancel.onclick = function() {
  searchform.className = 'searchform';
  searchform_box.className = 'form-box';
}

// 文章页封面隐藏
$(window).scroll(function(){
  var scrollTop = $(this).scrollTop();
  if(scrollTop > 300) {
    $('.single .top').css('opacity','0');
  } else {
    $('.single .top').css('opacity','1');
  }
})