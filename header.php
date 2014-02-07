<!DOCTYPE html>
<!-- Gridly WordPress Theme by Eleven Themes (http://www.eleventhemes.com) - Proudly powered by WordPress (http://wordpress.org) -->

	<!-- meta -->
<html <?php language_attributes();?>> 
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <?php  $options = get_option('plugin_options');
      $gridly_logo = $options['gridly_logo']; 
      $gridly_responsive = $options['gridly_responsive']; ?> 
  <?php if ($gridly_responsive != 'no') { ?>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <?php } ?>

 	<!-- wp head -->
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
<div id="wrap">
	<div id="header">
        
    	<div id="logo">
        	<a href="<?php echo home_url( '/' ); ?>"  title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            
                 <?php if ($gridly_logo != '') {?>
                 	 <img src="<?php echo esc_url( $gridly_logo ); ?>" alt="<?php bloginfo('sitename'); ?>">
                 <?php } else { ?>
                       <img src="<?php echo get_template_directory_uri(); ?>/images/light/logo.png" alt="<?php bloginfo('sitename'); ?>">
                 <?php } ?>
            </a>
            
       </div>
        
                
       <?php if ( has_nav_menu( 'main_nav' ) ) { ?>
  		 <div id="nav"><?php wp_nav_menu( array( 'theme_location' => 'main_nav' ) ); ?></div>
       <?php } else { ?>
 	 	 <div id="nav"><ul><?php wp_list_pages("depth=1&title_li=");  ?></ul></div>
	   <?php } ?>

   </div>
<!-- // header -->           