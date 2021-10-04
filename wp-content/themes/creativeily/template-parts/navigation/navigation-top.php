<?php
/**
 * Displays top navigation
 *
 * @package Creativeily
 */

?>
	<!-- Mobile Bar & Menu Icon -->
	
	<input type="checkbox" class="menu-toggle" id="menu-toggle">
	<div class="mobile-bar">
		<label tabindex="0" class="menu-icon">
				<span></span>
			</label>
	</div>
	<div class="header-menu">	  		
		<nav id="nav" class="top-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'creativeily' ); ?>">
			<span id="creativeily-menu-back"><span class="dashicons dashicons-arrow-left-alt2"></span></span>
			<span id="creativeily-menu-home"><span class="dashicons dashicons-admin-home"></span></span>
			
			<?php wp_nav_menu( array(
				'theme_location' => 'top',
				'menu_id'        => '',
				'menu_class'	 => '',
				'container_id' 	 => 'top-menu',
				'container_class' 	 => 'menu',
			) ); ?>
			<a href="#" id="accessibility-close-menu"></a>
		</nav><!-- #site-navigation -->
	</div>
 