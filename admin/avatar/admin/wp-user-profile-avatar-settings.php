<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {	
	exit;
}

/**
 * WPUPA_Settings class.
 */
class WPUPA_Settings {

	/**
	 * Constructor - get the plugin hooked in and ready
	 */
	public function __construct() 
	{
		add_action( 'wp_loaded', array( $this, 'edit_handler' ) );
	}
    /**
     * settings function.
     *
     * @access public
     * @param 
     * @return 
     * @since 1.0
     */
	public function settings() 
	{
		wp_enqueue_media();

		wp_enqueue_style( 'wp-user-profile-avatar-backend');

		wp_enqueue_script( 'wp-user-profile-avatar-admin-avatar' );

		//options
		$wpupa_tinymce = get_option('wpupa_tinymce');
		$wpupa_allow_upload = get_option('wpupa_allow_upload');
		$wpupa_disable_gravatar = get_option('wpupa_disable_gravatar');
		$wpupa_show_avatars = get_option('wpupa_show_avatars');
		$wpupa_rating = get_option('wpupa_rating');
		$wpupa_default = get_option('wpupa_default');
		$wpupa_attachment_id = get_option('wpupa_attachment_id');
		$wpupa_attachment_url = get_wpupa_default_avatar_url(['size' => 'admin']);
		?>

		<div class="wrap">
		  	<h2><?php _e('WP User Profile Avatar', 'wp-user-profile-avatar'); ?></h2>
		  	<table>
		  		<tr valign="top">
		  			<td>
			  			<form method="post" action="<?php echo admin_url('users.php'). '?page=wp-user-profile-avatar-settings'; ?>">

				  			<table class="form-table">

				  				<tr valign="top">
			  						<th scope="row"><?php _e('Avatar Visibility', 'wp-user-profile-avatar'); ?></th>
			  						<td>
			  							<fieldset>
							              <label for="wpupa_show_avatars">
							                <input name="wpupa_show_avatars" type="checkbox" id="wpupa_show_avatars" value="1" <?php echo checked($wpupa_show_avatars, 1, 0); ?> > <?php _e('Show Avatars', 'wp-user-profile-avatar'); ?>
							              </label>
							              <p class="description"><?php _e('If it is unchecked then it will not show the user avatar at profile and frontend side.', 'wp-user-profile-avatar'); ?></p>
							            </fieldset>
			  						</td>
			  					</tr>

			  					<tr valign="top">
			  						<th scope="row"><?php _e('Settings', 'wp-user-profile-avatar'); ?></th>
			  						<td>
				  						<fieldset>
							              <label for="wpupa_tinymce">
							                <input name="wpupa_tinymce" type="checkbox" id="wpupa_tinymce" value="1" <?php echo checked($wpupa_tinymce, 1, 0); ?> > <?php _e('Add shortcode avatar button to Visual Editor', 'wp-user-profile-avatar'); ?>
							              </label>
							            </fieldset>

							            <fieldset>
							              <label for="wpupa_allow_upload">
							                <input name="wpupa_allow_upload" type="checkbox" id="wpupa_allow_upload" value="1"<?php echo checked($wpupa_allow_upload, 1, 0); ?> > <?php _e('Allow Contributors &amp; Subscribers to upload avatars', 'wp-user-profile-avatar'); ?>
							              </label>
							            </fieldset>

							            <fieldset>
							              <label for="wpupa_disable_gravatar">
							                <input name="wpupa_disable_gravatar" type="checkbox" id="wpupa_disable_gravatar" value="1"<?php echo checked($wpupa_disable_gravatar, 1, 0); ?> > <?php _e('Disable all default gravatar and set own custom default avatar.', 'wp-user-profile-avatar'); ?>
							              </label>
							            </fieldset>
			  						</td>
			  					</tr>

			  					

			  					<tr valign="top">
			  						<th scope="row"><?php _e('Avatar Rating', 'wp-user-profile-avatar'); ?></th>
			  						<td>
			  							<fieldset>
							              	<legend class="screen-reader-text"><?php _e('Avatar Rating','wp-user-profile-avatar'); ?></legend>
							              	<?php foreach (get_wpupa_rating() as $name => $rating) : ?>
							              		<?php $selected = ($wpupa_rating == $name) ? 'checked="checked"' : ""; ?>
							              		<label><input type="radio" name="wpupa_rating" value="<?php echo esc_attr( $name ); ?>" <?php echo $selected; ?> /> <?php echo $rating; ?></label><br />
							              	<?php endforeach; ?>
							            </fieldset>
			  						</td>
			  					</tr>

			  					<tr valign="top">
			  						<th scope="row"><?php _e('Default Avatar', 'wp-user-profile-avatar'); ?></th>
			  						<td class="defaultavatarpicker">
			  							<fieldset>
							              	<legend class="screen-reader-text"><?php _e('Default Avatar','wp-user-profile-avatar'); ?></legend>
							              	<?php _e('For users without a custom avatar of their own, you can either display a generic logo or a generated one based on their e-mail address.','wp-user-profile-avatar'); ?><br />
							              	
							              	<?php $selected = ($wpupa_default == 'wp_user_profile_avatar') ? 'checked="checked"' : ""; ?>
							              	<label><input type="radio" name="wpupa_default" id="wp_user_profile_avatar_radio" value="wp_user_profile_avatar" <?php echo $selected; ?> /> <div id="wp_user_profile_avatar_preview"><img src="<?php echo $wpupa_attachment_url; ?>" width="32" /></div> <?php _e('WP User Profile Avatar'); ?> </label><br />

							              	<?php
							              	$class_hide = 'wp-user-profile-avatar-hide';
							              	if(!empty($wpupa_attachment_id))
							              	{
							              		$class_hide = '';
							              	}
							              	?>
							              	<p id="wp-user-profile-avatar-edit">
							              		<button type="button" class="button" id="wp_user_profile_avatar_add" name="wp_user_profile_avatar_add"><?php _e('Choose Image'); ?></button>
							              		<span id="wp_user_profile_avatar_remove_button" class="<?php echo $class_hide; ?>"><a href="javascript:void(0)" id="wp_user_profile_avatar_remove"><?php _e('Remove'); ?></a></span>
							              		<span id="wp_user_profile_avatar_undo_button"><a href="javascript:void(0)" id="wp_user_profile_avatar_undo"><?php _e('Undo'); ?></a></span>
							              		<input type="hidden" name="wpupa_attachment_id" id="wpupa_attachment_id" value="<?php echo $wpupa_attachment_id; ?>">
							              	</p>

							              	<?php if(empty($wpupa_disable_gravatar)) : ?>
							              	<?php foreach (get_wpupa_default_avatar() as $name => $label) : ?>
							              		<?php $avatar = get_avatar('unknown@gravatar.com', 32, $name); ?>

							              		<?php $selected = ($wpupa_default == $name) ? 'checked="checked"' : ""; ?>
							              		<label><input type="radio" name="wpupa_default" value="<?php echo esc_attr( $name ); ?>" <?php echo $selected; ?> /> 
							              		<?php echo preg_replace("/src='(.+?)'/", "src='\$1&amp;forcedefault=1'", $avatar); ?>
							              		<?php echo $label; ?></label><br />
							              	<?php endforeach; ?>
							              	<?php endif; ?>

							            </fieldset>
			  						</td>
			  					</tr>

			  					<tr>
			  						<td>
			  							<input type="submit" class="button button-primary" name="wp_user_profile_avatar_settings" value="<?php esc_attr_e( 'Save Changes', 'wp-user-profile-avatar' ); ?>" />
			  						</td>

			  						<td>
			  						<?php wp_nonce_field( 'user_profile_avatar_settings' ); ?>
			  						</td>
			  					</tr>

			  				</table>

			  			</form>
					</td>
		  		</tr>
		  	</table>
		</div> 	

		<?php
	}
    /**
     * edit_handler function.
     *
     * @access public
     * @param 
     * @return 
     * @since 1.0
     */
	public function edit_handler() 
	{
		if ( ! empty( $_POST['wp_user_profile_avatar_settings'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'user_profile_avatar_settings' ) ) 
		{
			$user_id = get_current_user_id();

			$wpupa_show_avatars  = ! empty( $_POST['wpupa_show_avatars'] ) ? sanitize_text_field( $_POST['wpupa_show_avatars'] ) : '';


			$wpupa_tinymce  = ! empty( $_POST['wpupa_tinymce'] ) ? sanitize_text_field( $_POST['wpupa_tinymce'] ) : '';

			$wpupa_allow_upload  = ! empty( $_POST['wpupa_allow_upload'] ) ? sanitize_text_field( $_POST['wpupa_allow_upload'] ) : '';

			$wpupa_disable_gravatar  = ! empty( $_POST['wpupa_disable_gravatar'] ) ? sanitize_text_field( $_POST['wpupa_disable_gravatar'] ) : '';
			

			$wpupa_rating  = ! empty( $_POST['wpupa_rating'] ) ? sanitize_text_field( $_POST['wpupa_rating'] ) : '';

			$wpupa_default  = ! empty( $_POST['wpupa_default'] ) ? sanitize_text_field( $_POST['wpupa_default'] ) : '';

			$wpupa_attachment_id  = ! empty( $_POST['wpupa_attachment_id'] ) ? sanitize_text_field( $_POST['wpupa_attachment_id'] ) : '';

			if($wpupa_show_avatars == '')
			{
				$wpupa_tinymce = '';
				$wpupa_allow_upload = '';
				$wpupa_disable_gravatar = '';
			}

			if($wpupa_disable_gravatar)
			{
				$wpupa_default = 'wp_user_profile_avatar';
			}

			// options
			update_option( 'wpupa_tinymce', $wpupa_tinymce );
			update_option( 'wpupa_allow_upload', $wpupa_allow_upload );
			update_option( 'wpupa_disable_gravatar', $wpupa_disable_gravatar );
			update_option( 'wpupa_show_avatars', $wpupa_show_avatars );
			update_option( 'wpupa_rating', $wpupa_rating );
			update_option( 'wpupa_default', $wpupa_default );
			update_option( 'wpupa_attachment_id', $wpupa_attachment_id );

		} /*
		else
		{
		    status_header( '401' );
		    die();
		} */
	}

}

new WPUPA_Settings();