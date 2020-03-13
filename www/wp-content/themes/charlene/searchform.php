			<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	
				<label class="hidden" for="s"><?php _e(''); ?></label>
				<input type="text" value="Search" onfocus="this.value=(this.value=='Search') ? '' this.value;" onblur="this.value=(this.value=='') ? 'Search' : this.value;" name="s" id="s" />
				<input type="submit" id="searchsubmit" value="Go"   />

			</form><!-- end #searchform -->
