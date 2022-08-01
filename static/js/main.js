// 滚动时隐藏header
var header_element = document.querySelector(".header")
if(header_element) {
  var headroom = []
  headroom = new Headroom(header_element, {
    "tolerance": 5,
    "offset": 0,
  });
headroom.init()
}
var header_element_m = document.querySelector(".header-m")
if(header_element_m) {
  var headroom_m = []
  headroom_m = new Headroom(header_element_m, {
    "tolerance": 5,
    "offset": 259,
  });
headroom_m.init()
}

// 移动端菜单
const menu_btn = document.querySelector('.menu-btn') //open按钮
const menu_btn_c = document.querySelector('.menu-btn-c') //close按钮
const menu_m = document.querySelector('.menu-m') // 菜单
const menu_mask = document.querySelector('.menu-mask') //遮罩

menu_btn.onclick = function() {
  menu_m.className = 'menu-m menu-m-o'
  menu_mask.className = 'menu-mask menu-mask-o'
}
menu_btn_c.onclick = function() {
  menu_m.className = 'menu-m'
  menu_mask.className = 'menu-mask'

}
menu_mask.onclick = function() {
  menu_m.className = 'menu-m'
  this.className = 'menu-mask'
}

// 根据时间段提示
let date = new Date()
let hour = date.getHours();
const date_icon = document.querySelector('.menu-m .time-tip span')
const date_text = document.querySelector('.menu-m .time-tip p')
if(hour >= 6 && hour <= 7) {
  date_icon.className = 'iconfont icon-a-partlycloudy_01'
  date_text.innerText = 'Good morning!'
} else if(hour >= 8 && hour <= 11) {
  date_icon.className = 'iconfont icon-sunny'
  date_text.innerText = 'Good morning!'
} else if(hour == 12) {
  date_icon.className = 'iconfont icon-sunny'
  date_text.innerText = 'Good noon!'
} else if(hour >= 13 && hour <= 18) {
  date_icon.className = 'iconfont icon-a-partlycloudy_01'
  date_text.innerText = 'Good afternoon!'
} else if(hour >= 19 && hour <= 23){
  date_icon.className = 'iconfont icon-moon'
  date_text.innerText = 'Good evening!'
} else {
  date_icon.className = 'iconfont icon-a-cloudyatnight'
  date_text.innerText = 'Late at night!'
}

// 搜索
const search_btn = document.querySelector('.header .search-btn') // pc端按钮
const search_btn_m = document.querySelector('.header-m .search-btn-m') //移动端按钮
const searchform = document.querySelector('.searchform') //搜索
const searchform_box = document.querySelector('.searchform .search .form-box') //表单box
const searchform_mask = document.querySelector('.searchform-mask') //遮罩
const searchform_cancel = document.querySelector('.searchform .search .btn') //取消按钮

search_btn.onclick = function() {
  searchform.className = 'searchform searchform-o'
  searchform_box.className = 'form-box form-box-o'
}
search_btn_m.onclick = function() {
  searchform.className = 'searchform searchform-o'
  searchform_box.className = 'form-box form-box-o'
}

searchform_mask.onclick = function() {
  searchform.className = 'searchform'
  searchform_box.className = 'form-box'
}

searchform_cancel.onclick = function() {
  searchform.className = 'searchform'
  searchform_box.className = 'form-box'
}

// 文章页封面隐藏

$(window).scroll(function(){
  var scrollTop = $(this).scrollTop()
  if(scrollTop > 300) {
    $('.single .top').css('opacity','0')
  } else {
    $('.single .top').css('opacity','1')
  }
})