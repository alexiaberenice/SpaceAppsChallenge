<?php

/* Add settings to css */
function creativeily_custom_css_output() {
  

  /* custom header */

  $header_image="";

 if(is_single() || is_page()) {
		if ( has_post_thumbnail() ) {
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
			if ( ! empty( $large_image_url[0] ) ) $header_image=$large_image_url[0];
		}
    else if(is_single()) {
      if(!$header_image=wp_get_attachment_url(get_theme_mod( 'single_image'))) $header_image=get_template_directory_uri().'/assets/img/header.jpeg';
    }
	}
    ?>
  <style type="text/css" id="custom-theme-css">

  body {
    font-style: normal;
    font-weight: 400;
    padding: 0;
    margin: 0;
    position: relative;
    -webkit-tap-highlight-color: transparent;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    -webkit-text-size-adjust: 100%;
  }

  #start {
    background-color: <?php echo esc_html(get_theme_mod( 'body_bg_color', '#f3f3f3')); ?>;
  }
  .header{
    position:relative;
    overflow:visible;
    display:-webkit-flex;
    -webkit-flex-wrap: wrap;
    justify-content: center;
    align-items: -webkit-flex-start;
    align-content: -webkit-flex-start;
    height: 700px;
    height: 100vh;
    max-height: 100%;
    min-height:200px;
    min-width:300px;
    color:<?php echo esc_html(get_theme_mod( 'head_txt_color', '#eee')); ?>;
  }

  #top-menu li:after {
    content: ""; /* This is necessary for the pseudo element to work. */ 
    display: block; /* This will put the pseudo element on its own line. */
    margin: 0 auto; /* This will center the border. */
    width: 30px; /* Change this to whatever width you want. */
    margin-bottom: 0.7em;
    margin-top: 0.7em;
   
  }

  .image-creativeily-header{
    width:100%;
    height:100%;
    position:fixed;
    top:0;
    left:0;

      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
      -webkit-transform: translateZ(0) scale(1.0, 1.0);
      transform: translateZ(0);
      -ms-transform: translateZ(0);

    <?php if($header_image!="") { ?>
    background:<?php echo esc_html(get_theme_mod( 'head_bg_color', '#222')); ?> url(<?php echo esc_url($header_image); ?>) center center no-repeat !important;
    <?php }

    else { ?>
      background:<?php echo esc_html(get_theme_mod( 'head_bg_color')); ?>;
      <?php } ?>

    background-size:cover;
    background-attachment:scroll;
    -webkit-animation: grow 60s  linear 10ms infinite;
    animation: grow 60s  linear 10ms infinite;

    -webkit-transition:all 0.2s ease-in-out;
    transition:all 0.2s ease-in-out;
    z-index:-2;
  }

  </style>
    <?php
}
add_action( 'wp_head', 'creativeily_custom_css_output');