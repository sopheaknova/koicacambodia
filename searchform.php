<form method="get" action="<?php echo home_url(); ?>">
    <div class="search-wrap">
	<input type="text" class="sf" value="<?php _e('Search here ...', 'theme'); ?>" name="s" onfocus="if(this.value == '<?php _e('Search here ...', 'theme'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search here ...', 'theme'); ?>';}" />
	<input type="submit" class="sb" value="<?php _e('Search', 'theme'); ?>" />
    </div>
</form>