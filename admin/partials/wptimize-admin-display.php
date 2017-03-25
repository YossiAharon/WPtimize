<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.yossi.co.il/
 * @since      1.0.0
 *
 * @package    Wptimize
 * @subpackage Wptimize/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">

    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	
	<p>You can check or uncheck the boxes to select which tags you want to clean from your WordPress header.</p>

    <form method="post" name="cleanup_options" action="options.php">
    
	<?php
		//Grab all options
		$options = get_option($this->options_slug);

		// Cleanup
		$rsd_clean = $options['rsd_clean'];
		$wlwmanifest_clean = $options['wlwmanifest_clean'];
		$wp_generator_clean = $options['wp_generator_clean'];
		$shortlink_clean = $options['shortlink_clean'];
		$feed_links_clean = $options['feed_links_clean'];
		$feed_links_extra_clean = $options['feed_links_extra_clean'];
		$rel_links_clean = $options['rel_links_clean'];
		$canonical_clean = $options['canonical_clean'];
		$emoji_clean = $options['emoji_clean'];
		$js2footer = $options['js2footer'];
		$query_string_clean = $options['query_string_clean'];
		$wp_api_clean = $options['wp_api_clean'];
	?>
		
	<!-- Remove RSD (Really Simple Discovery) tag -->
    <fieldset>
        <legend class="screen-reader-text">
            <span><?php _e('Remove RSD (Really Simple Discovery) tag', $this->options_slug); ?></span>
        </legend>
        <label for="<?php echo $this->options_slug; ?>-rsd_clean">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-rsd_clean" name="<?php echo $this->options_slug; ?>[rsd_clean]" value="1" <?php checked($rsd_clean, 1); ?> />
            <span><?php esc_attr_e('Remove RSD (Really Simple Discovery) tag', $this->options_slug); ?></span>
        </label>
    </fieldset>

   <!-- Remove Windows Live Writer tag -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Remove Windows Live Writer tag', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-wlwmanifest_clean">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-wlwmanifest_clean" name="<?php echo $this->options_slug; ?>[wlwmanifest_clean]" value="1" <?php checked($wlwmanifest_clean, 1); ?> />
            <span><?php esc_attr_e('Remove Windows Live Writer tag', $this->options_slug); ?></span>
        </label>
    </fieldset>

    <!-- Remove WordPress Generator tag -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Remove WordPress Generator tag', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-wp_generator_clean">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-wp_generator_clean" name="<?php echo $this->options_slug; ?>[wp_generator_clean]" value="1" <?php checked( $wp_generator_clean, 1 ); ?>  />
            <span><?php esc_attr_e('Remove WordPress Generator tag', $this->options_slug); ?></span>
        </label>
    </fieldset>

    <!-- Remove Shortlink tag -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Remove Shortlink tag', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-shortlink_clean">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-shortlink_clean" name="<?php echo $this->options_slug; ?>[shortlink_clean]" value="1" <?php checked($shortlink_clean, 1); ?>  />
            <span><?php esc_attr_e('Remove Shortlink tag', $this->options_slug); ?></span>
        </label>
    </fieldset>
	
    <!-- Remove feed links tags -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Remove feed links tags', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-feed_links_clean">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-feed_links_clean" name="<?php echo $this->options_slug; ?>[feed_links_clean]" value="1" <?php checked($feed_links_clean, 1); ?>  />
            <span><?php esc_attr_e('Remove feed links tags', $this->options_slug); ?></span>
        </label>
    </fieldset>
    
    <!-- Remove feed links extra tags -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Remove feed links extra tag', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-feed_links_extra_clean">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-feed_links_extra_clean" name="<?php echo $this->options_slug; ?>[feed_links_extra_clean]" value="1" <?php checked($feed_links_extra_clean, 1); ?>  />
            <span><?php esc_attr_e('Remove feed links extra tags', $this->options_slug); ?></span>
        </label>
    </fieldset>
	
    <!-- Remove relational links tag -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Remove relational links tag', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-rel_links_clean">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-rel_links_clean" name="<?php echo $this->options_slug; ?>[rel_links_clean]" value="1" <?php checked($rel_links_clean, 1); ?>  />
            <span><?php esc_attr_e('Remove relational links tag', $this->options_slug); ?></span>
        </label>
    </fieldset>
	
    <!-- Remove canonical tag -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Remove canonical tag', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-canonical_clean">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-canonical_clean" name="<?php echo $this->options_slug; ?>[canonical_clean]" value="1" <?php checked($canonical_clean, 1); ?>  />
            <span><?php esc_attr_e('Remove canonical tag', $this->options_slug); ?></span>
        </label>
    </fieldset>
	
    <!-- Remove Emoji tags -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Remove Emoji tags', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-emoji_clean">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-emoji_clean" name="<?php echo $this->options_slug; ?>[emoji_clean]" value="1" <?php checked($emoji_clean, 1); ?>  />
            <span><?php esc_attr_e('Remove Emoji tags', $this->options_slug); ?></span>
        </label>
    </fieldset>
	
    <!-- Move JavaScript from head to footer -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Move JavaScript from head to footer', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-js2footer">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-js2footer" name="<?php echo $this->options_slug; ?>[js2footer]" value="1" <?php checked($js2footer, 1); ?>  />
            <span><?php esc_attr_e('Move JavaScript from head to footer', $this->options_slug); ?></span>
        </label>
    </fieldset>
	
    <!--  Remove Query String from Static Resources -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Remove query string from static resources', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-query_string_clean">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-query_string_clean" name="<?php echo $this->options_slug; ?>[query_string_clean]" value="1" <?php checked($query_string_clean, 1); ?>  />
            <span><?php esc_attr_e('Remove query string from static resources', $this->options_slug); ?></span>
        </label>
    </fieldset>
	
    <!--  Remove WordPress API from header -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Remove WordPress API from header', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-wp_api_clean">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-wp_api_clean" name="<?php echo $this->options_slug; ?>[wp_api_clean]" value="1" <?php checked($wp_api_clean, 1); ?>  />
            <span><?php esc_attr_e('Remove WordPress API from header', $this->options_slug); ?></span>
        </label>
    </fieldset>
	
		<?php
		settings_fields($this->options_slug);
	?>

    <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>

    </form>
	
	<hr>
	
	<p>Developed by <a href="http://www.yossi.co.il/en/" target="_blank">Yossi Aharon</a>. Follow: <a href="http://twitter.com/YossiAharon" target="_blank">Twitter</a>, <a href="http://www.facebook.com/YossiAharon" target="_blank">Facebook</a></p>

</div>