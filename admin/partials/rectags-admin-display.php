<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://artee.io
 * @since      1.0.0
 *
 * @package    Rectags
 * @subpackage Rectags/admin/partials
 */

var_dump(get_option( $this->option_name . '_position' ));
var_dump(get_option( $this->option_name . '_day' ));
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
	    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	    <form action="options.php" method="post">
	        <?php
	            settings_fields( $this->rectags );
	            do_settings_sections( $this->rectags );
	            submit_button();
	        ?>
	    </form>
</div>