<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly 
?>

<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/style.css">

<div class="wrap">
	<h1>Dashboard</h1>
	<div id="welcome-panel" class="welcome-panel">
	<div class="welcome-panel-content">
		<h1 class="text-center mb"><?php _e( 'Welcome to', 'woomasonry' ); ?> Woo Masonry!</h1>
		<p class="about-description">Here are some details to get you started:</p>
		<div class="welcome-panel-column-container">
		<div class="welcome-panel-column">
			<h3>Get Started - Add the shortcode now!</h3>
			<a class="button button-primary button-hero" href="<?php echo admin_url( 'post-new.php?post_type=page' ); ?>">Add Shortcode To A Page</a>
			<h3>OR</h3>
			<a class="button button-primary button-hero" href="https://goo.gl/bCJSeo">Upgrade Now!</a>
		</div>
		<div class="welcome-panel-column">
			<h3>Quick Tutorial</h3>
			<ul>
			<li class="dflex"> <i class="fas fa-wallet mr10 pt3"></i>Woo Masonry works only with shortcode. In order to place a masonry products grid, please follow the shortcode steps below. </li>
			<li class="dflex"> <i class="fas fa-code mr10 pt3"></i><span class="shortcode">[woomasonry_grid]</span> Place this shortcode in WordPress editor or anywhere you want the Masonry Products Grid to display in your website. Please note that it will bring ALL products in your website </li>
			<li class="dflex"> <i class="fas fa-code mr10 pt3"></i><span class="shortcode">[woomasonry_grid number="3" ]</span> adding a number attribute will limit the products per category. This number limit works based on your product categories. </li>
			<li class="dflex"> <i class="fas fa-code mr10 pt3"></i>If you set the number to be 5 and if you have total 10 categories in your Woocommerce website, the masonry grid will show total 50 (5 x 10) products in the grid.</li>
			<li class="dflex"> <i class="fas fa-code mr10 pt3"></i><span class="shortcode">[woomasonry_grid number="3" cat="hoodies, t-shirts"]</span> adding the cat attribute will limit the products display with those specific categories only. Make sure you add the category slugs separate by comma.</li>
			</ul>
		</div>
		<div class="welcome-panel-column welcome-panel-last">
			<h3>Support</h3>
			<ul>
			<li>
			<?php
				_e( 'Thank you for choosing Woo Masonry plugin. We hope you will like the plugin and enjoy using it. Please leave us a review if you like our plugin.', 'woomasonry' );
			?>
			</li>
			<li><?php _e( 'If you have any support or sales related queries, please feel free to send an email to ', 'woomasonry' ); ?> <a href="mailto:sales@intensewp.com">sales@intensewp.com</a></li>
			<li><?php _e( 'You can also visit our ', 'woomasonry' ); ?><a href="http://support.intensewp.com/" target="_blank"><?php _e( 'Support Help Desk by clicking here', 'woomasonry' ); ?></a></li>
			</ul>
		</div>
		</div>
	</div>
	</div>
</div>

<div class="wrap">
	<div class="whatsnew info-box pull-left">
	<h3><?php _e( 'What\'s PRO?', 'woomasonry' ); ?></h3>

	<ul style="list-style: disc inside none;">
		<li><?php _e( '<span class="text-green fs16">[NEW]</span> Compatible with Visual Composer', 'woomasonry' ); ?></li>
		<li><?php _e( '<span class="text-green fs16">[NEW]</span> Show blog post listing in Grid view as well', 'woomasonry' ); ?></li>
		<li><?php _e( 'Control the look and feel of the masonry grid via Powerful options panel. Change colors, fonts etc', 'woomasonry' ); ?></li>
		<li><?php _e( 'Enable/disable title, pricing, add to cart from options panel', 'woomasonry' ); ?></li>
		<li><?php _e( '<a href="http://www.intensewp.com/woomasonry-woocommerce-products-post-masonry-grid/">See screen shots and get more details here</a>', 'woomasonry' ); ?></li>
	</ul>
	</div>
	<div id="shortcodes" class="shortcode-box info-box pull-right">
	<h3><?php _e( 'How to use Shortcode?', 'woomasonry' ); ?></h3>
	<ul style="list-style: disc inside none;">
		<li><strong>[woomasonry_grid]</strong> Place this shortcode in WordPress editor or anywhere you want the Masonry Products Grid to display in your website. Please note that it will bring ALL products in your website </li>
		<li>If you set the number to be 5 and if you have total 10 categories in your Woocommerce website, the masonry grid will show total 50 (5 x 10) products in the grid.</li>
		<li><strong>[woomasonry_grid number="3" ]</strong> adding a number attribute will limit the products per category. This number limit works based on your product categories. </li>
		<li><strong>[woomasonry_grid number="3" cat="hoodies, t-shirts"]</strong> adding the cat attribute will limit the products display with those specific categories only. Make sure you add the category slugs separate by comma.</li>
	</ul>
	<p class="fs16"><strong>Note:</strong> To easily get the IDs of posts, pages, custom posts, you can use our plugin - <a href="https://wordpress.org/plugins/wpsite-show-ids/">Show IDs by 99 Robots</a></p>
	</div>
</div>
<div class="clearfix">
</div>
