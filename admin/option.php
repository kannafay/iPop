<?php

    error_reporting(0);
    
    if($_POST["poppins"]){
        update_option("recommend",$_POST["recommend"]);
        update_option("random_pic",$_POST["random_pic"]);
    }

?>

<div class="wrap">
    <h1>Poppins Setting</h1>
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="recommend">Recommend</label></th>
                    <td>
                        <input name="recommend" type="text" value="<?php echo get_option("recommend"); ?>" class="regular-text">
                        <p class="description">Display at the top of the home. Fill in the post ID for one.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="random_pic">Cover random picture</label></th>
                    <td>
                        <input name="random_pic" type="text" value="<?php echo get_option("random_pic"); ?>" class="regular-text">
                        <p class="description">Replace when have no cover image. Fill in the picture URL</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="poppins"  class="button button-primary" value="Save Changes">
        </p>
    </form>
</div>