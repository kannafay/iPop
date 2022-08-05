<div class="time-tip"><span class="iconfont icon-a-partlycloudy_01"></span><p></p></div>

<script>
    // 根据时间段提示
    let date = new Date()
    let hour = date.getHours();
    const date_icon = document.querySelector('.menu-m .time-tip span')
    const date_text = document.querySelector('.menu-m .time-tip p')
    if(hour >= 6 && hour <= 7) {
      date_icon.className = 'iconfont icon-a-partlycloudy_01'
      date_text.innerText = '<?php _e('Good morning!','poppins'); ?>'
    } else if(hour >= 8 && hour <= 11) {
      date_icon.className = 'iconfont icon-sunny'
      date_text.innerText = '<?php _e('Good morning!','poppins'); ?>'
    } else if(hour == 12) {
      date_icon.className = 'iconfont icon-sunny'
      date_text.innerText = '<?php _e('Good noon!','poppins'); ?>'
    } else if(hour >= 13 && hour <= 18) {
      date_icon.className = 'iconfont icon-a-partlycloudy_01'
      date_text.innerText = '<?php _e('Good afternoon!','poppins'); ?>'
    } else if(hour >= 19 && hour <= 23){
      date_icon.className = 'iconfont icon-moon'
      date_text.innerText = '<?php _e('Good evening!','poppins'); ?>'
    } else {
      date_icon.className = 'iconfont icon-a-cloudyatnight'
      date_text.innerText = '<?php _e('Late at night!','poppins'); ?>'
    }
</script>