<!DOCTYPE html>
<html>
	<head>
		<title><?php wp_title();?> | <?php bloginfo('name'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap.min.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<?php wp_head(); ?>
	</head>
	<body>
		
		<div class = "navbar navbar-inverse navbar-static-top">
			<div class = "container">
				
				<a href = "http://www.silverbird1987.com" class = "navbar-brand">Silverbird1987</a>
				
				<button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
				
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
				</button>
				
				<div class = "collapse navbar-collapse navHeaderCollapse">
				
					<?php
						wp_nav_menu( array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 2,
						'menu_class'        => 'nav navbar-nav navbar-right',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new wp_bootstrap_navwalker())
						);
					?>
				
				</div>
				
			</div>
		</div>
		
		<div class = "container2">
		<div id="main-content" class="main-content">
<div class="row">
	<div class="col-md-12">
	<?php
			$my_id = 5;
			$post_id_5 = get_post($my_id);
			$content = $post_id_5->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]>', $content);
			echo $content;
		?>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		
			<h2><?php echo get_the_title( 139 ); ?></h2>
			<?php 
			$my_id = 139;
			$post_id_139 = get_post($my_id);
			$content = $post_id_139->post_excerpt;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]>', $content);
			echo $content;
		?>
	</div>
	<div class="col-md-4">
		<h2><?php echo get_the_title( 226 ); ?></h2>
			<?php
			$my_id = 226;
			$post_id_226 = get_post($my_id);
			$content = $post_id_226->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]>', $content);
			echo $content;
		?>
	</div>
	<div class="col-md-4">
		<h2><?php echo get_the_title( 146 ); ?></h2>
			<?php
			$my_id = 146;
			$post_id_146 = get_post($my_id);
			$content = $post_id_146->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]>', $content);
			echo $content;
		?>
	</div>
</div>
</div><!--end of container2 div-->
</div><!--end of container div-->
<div class = "navbar-fixed-bottom">
		
			<div class = "container">
				<p class = "navbar-text pull-left">Site Built By <a target="_blank" href="http://ashleypfeil.com/">Ashley Pfeil</a></p>
				<a href = "https://instagram.com/silverbird1987/" target="_blank" class = "btn pull-right"><img src="http://www.ashleypfeil.com/wordPressDemo/wp-content/uploads/2015/09/instagramIcon1.png" alt="Follow me on Instagram!"></a>
			</div>
		
		</div>
		<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src = "<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>