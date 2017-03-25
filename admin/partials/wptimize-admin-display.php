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
	
	<h2 class="nav-tab-wrapper">
	<a href="#cleanup" class="nav-tab nav-tab-active">Cleanup</a>
	<a href="#optimization" class="nav-tab">Optimization</a>
	<a href="#memory-usage" class="nav-tab">Memory Usage</a>
	<a href="#customizations" class="nav-tab">Customizations</a>
    </h2>
	
	   <div id="cleanup" class="wrap metabox-holder columns-2 wptimize-metaboxes">

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
		$wp_api_clean = $options['wp_api_clean'];
		//Optimization
		$js2footer = $options['js2footer'];
		$query_string_clean = $options['query_string_clean'];
		$clean_non_contactform7 = $options['clean_non_contactform7'];
		$clean_non_woocommerce = $options['clean_non_woocommerce'];
		$clean_non_bbpress = $options['clean_non_bbpress'];
		//Customizations
		$remove_wp_admin_bar = $options['remove_wp_admin_bar'];
		$hide_upgrade_notices = $options['hide_upgrade_notices'];
		$disable_comments_feature_wp = $options['disable_comments_feature_wp'];
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
	
    <!--  Remove WordPress API from header -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Remove WordPress API from header', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-wp_api_clean">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-wp_api_clean" name="<?php echo $this->options_slug; ?>[wp_api_clean]" value="1" <?php checked($wp_api_clean, 1); ?>  />
            <span><?php esc_attr_e('Remove WordPress API from header', $this->options_slug); ?></span>
        </label>
    </fieldset>
	
	</div>
	
	<div id="optimization" class="wrap metabox-holder columns-2 wptimize-metaboxes hide">
	
	
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
	
	<!-- Remove Contact Form 7 CSS + JS form all pages except Contact -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Remove Contact Form 7 CSS + JS form all pages except Contact', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-clean_non_contactform7">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-clean_non_contactform7" name="<?php echo $this->options_slug; ?>[clean_non_contactform7]" value="1" <?php checked($clean_non_contactform7, 1); ?>  />
            <span><?php esc_attr_e('Remove Contact Form 7 CSS + JS form all pages except Contact', $this->options_slug); ?></span>
        </label>
    </fieldset>
	
	<!-- Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-clean_non_woocommerce">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-clean_non_woocommerce" name="<?php echo $this->options_slug; ?>[clean_non_woocommerce]" value="1" <?php checked($clean_non_woocommerce, 1); ?>  />
            <span><?php esc_attr_e('Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages', $this->options_slug); ?></span>
        </label>
    </fieldset>
	
	<!-- Remove bbPress CSS styles and scripts from non bbPress pages -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Remove bbPress CSS styles and scripts from non bbPress pages', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-clean_non_bbpress">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-clean_non_bbpress" name="<?php echo $this->options_slug; ?>[clean_non_bbpress]" value="1" <?php checked($clean_non_bbpress, 1); ?>  />
            <span><?php esc_attr_e('Remove bbPress CSS styles and scripts from non bbPress pages', $this->options_slug); ?></span>
        </label>
    </fieldset>

	</div>
	
	<div id="memory-usage" class="wrap metabox-holder columns-2 wptimize-metaboxes hide">
<?php
	if (!function_exists('memory_get_usage')) {
		$phpmemuse = $notavailable;
	} else {
		$mem_usage = memory_get_usage(true);
		if ($mem_usage < 1024) {
			$phpmemuse = $mem_usage."B"; 
		} elseif ($mem_usage < 1048576) {
			$phpmemuse = round($mem_usage/1024,2)."KB"; 
		} else {
			$phpmemuse = round($mem_usage/1048576,2)."MB"; 
		}
	}
	
	if (!function_exists('ini_get')) {
		$phpmemlim = $notavailable;
	} else {
		$phpmemlim = ini_get('memory_limit');
	}
	$phpmemory = __('Memory Usage: ', 'wptimize');
	$outof = __(' out of ', 'wptimize'); 
	$memorycolor = 'color:black;';
	$mempercent = round ($phpmemuse / $phpmemlim * 100, 0);
	if ($mempercent < 50) { $memorycolor = 'font-weight:bold;color:#008000;font-size:20px'; }
	if ($mempercent > 70) { $memorycolor = 'font-weight:bold;color:#E66F00;font-size:20px'; }
	if ($mempercent > 90) { $memorycolor = 'font-weight:bold;color:red;font-size:20px'; }
	echo '<strong>' . $phpmemory . '</strong>' . '<span style=' . $memorycolor . '>' . $phpmemuse . '</span>' . $outof . '<strong>' . $phpmemlim . '</strong> (' . $mempercent . '%)<br>';
	?>
	</div>
	
	<div id="customizations" class="wrap metabox-holder columns-2 wptimize-metaboxes hide">
	
	<!-- Remove WordPress Admin bar -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Remove WordPress Admin Bar', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-remove_wp_admin_bar">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-remove_wp_admin_bar" name="<?php echo $this->options_slug; ?>[remove_wp_admin_bar]" value="1" <?php checked($remove_wp_admin_bar, 1); ?>  />
            <span><?php esc_attr_e('Remove WordPress Admin Bar', $this->options_slug); ?></span>
        </label>
    </fieldset>
	
	<!-- Hide all upgrades notices -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Hide all upgrade notices', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-hide_upgrade_notices">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-hide_upgrade_notices" name="<?php echo $this->options_slug; ?>[hide_upgrade_notices]" value="1" <?php checked($hide_upgrade_notices, 1); ?>  />
            <span><?php esc_attr_e('Hide all upgrade notices', $this->options_slug); ?></span>
        </label>
    </fieldset>
	
	<!-- Disable comments feature completely from WordPress -->
    <fieldset>
        <legend class="screen-reader-text"><span><?php _e('Disable comments feature completely', $this->options_slug); ?></span></legend>
        <label for="<?php echo $this->options_slug; ?>-disable_comments_feature_wp">
            <input type="checkbox" id="<?php echo $this->options_slug; ?>-disable_comments_feature_wp" name="<?php echo $this->options_slug; ?>[disable_comments_feature_wp]" value="1" <?php checked($disable_comments_feature_wp, 1); ?>  />
            <span><?php esc_attr_e('Disable comments feature completely', $this->options_slug); ?></span>
        </label>
    </fieldset>

	</div>
	
		<?php
		settings_fields($this->options_slug);
       ?>

    <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>

    </form>
	
	<hr>
	
	<p>Developed by <a href="http://www.yossi.co.il/en/">Yossi Aharon</a>. Follow: <a href="http://twitter.com/YossiAharon">Twitter</a>, <a href="http://www.facebook.com/YossiAharon">Facebook</a>. <a href="https://www.paypal.me/YossiAharon" target="_blank">Donate me</a> and support this plugin.</p>

</div>