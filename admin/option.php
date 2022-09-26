<?php
    error_reporting(0);
    if($_POST["poppins"]){
        update_option("recommend",$_POST["recommend"]);
        update_option("random_pic",$_POST["random_pic"]);
        update_option("hide_login",$_POST["hide_login"]);
        update_option("icp",$_POST["icp"]);
    }
?>

<div class="wrap">
    <h1><?php _e('Poppins Settings','poppins'); ?></h1>
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="recommend"><?php _e('Recommend','poppins'); ?></label></th>
                    <td>
                        <input name="recommend" type="text" value="<?php echo get_option("recommend"); ?>" class="regular-text">
                        <p class="description"><?php _e('Display at the top of the home. Fill in the post ID for one.','poppins'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="random_pic"><?php _e('Cover random picture','poppins'); ?></label></th>
                    <td>
                        <input name="random_pic" type="text" value="<?php echo get_option("random_pic"); ?>" class="regular-text">
                        <p class="description"><?php _e('Replace when have no cover image. Fill in the picture API or URL.','poppins'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="hide_login"><?php _e('Hide login','poppins'); ?></label></th>
                    <td>
                        <input name="hide_login" type="text" value="<?php echo get_option("hide_login"); ?>" class="regular-text">
                        <p class="description"><?php _e('Hide login after opening. Enter <span style="color:#8183ff">true</span> to hide.','poppins'); ?></p>
                        <p><?php _e('You can still login by typing <span style="color:#8183ff">/admin</span> or <span style="color:#8183ff">/wp-login.php</span> after the domain name.','poppins'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="icp"><?php _e('ICP','poppins'); ?></label></th>
                    <td>
                        <input name="icp" type="text" value="<?php echo get_option("icp"); ?>" class="regular-text">
                        <p class="description"><?php _e('Please enter the ICP filing number. (Chinese users only)','poppins'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="icp"><?php _e('Menu icon','poppins'); ?></label></th>
                    <td>
                        <p class="description"><a href="https://chuangzaoshi.com/icon/">https://chuangzaoshi.com/icon/</a></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="poppins"  class="button button-primary" value="<?php _e('Save Changes','poppins'); ?>">
        </p>
    </form>
</div>