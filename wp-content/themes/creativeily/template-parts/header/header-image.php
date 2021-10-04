<?php
/**
 * Displays header media
 *
 * @package Creativeily
 */

// Title
  $title_creativeily = get_bloginfo( 'name' );
  $description = get_bloginfo( 'description', 'display' );
  $icon_post='';
  $author='';
  $time='';

  if(is_single() || is_page()) {
    $title_creativeily = get_the_title();
    //$author = get_the_author();
    global $post;
    $author = get_the_author_meta('display_name', $post->post_author);
    $time = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time = sprintf( $time,
      get_the_date( DATE_W3C ),
      get_the_date(),
      get_the_modified_date( DATE_W3C ),
      get_the_modified_date()
    );

    
    if(is_page()) $description = '';
    else {
      if($author!="") $description = $author.', '.$time;
      else $description = $time;
    }

    $format = get_post_format(get_the_ID());
    if ( false === $format ) {
      $format = '';
    }
    $icon_post = "";
    if($format != "") {
      if($format == "link") $format = "links";
      $icon_post = '<span class="dashicons dashicons-format-'.$format.'"></span>';
    }

  }
  
  if(is_archive()) { 
    $title_creativeily = get_the_archive_title();
    $description = get_the_archive_description();
  }

  if(is_search()) {
    if ( have_posts() ) $title_creativeily = __( 'Search Results for:', 'creativeily' ).' ' . get_search_query() ;
    else $title_creativeily = __( 'Nothing Found', 'creativeily' );
  }

  if(is_404()) {
    $title_creativeily = __( 'Oops! That page can&rsquo;t be found', 'creativeily' );
  }

?>

<div class="header">
  <div class="image-creativeily-header"></div>
  <div class="header-top">
      <!-- logo -->

    <?php if(has_custom_logo()) the_custom_logo();

    else { ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo"><?php bloginfo( 'name' ); ?></a>
    <?php 
    }

    if ( has_nav_menu( 'top' ) ) : ?>

              <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>

    <?php endif; ?>

</div>

  <div class="info">
    <h1><?php echo wp_kses_data($title_creativeily); ?></h1>

    <?php
  

  if ( $description || is_customize_preview() ) :
  ?>
  <div class="meta">
  <p class="site-description"><?php echo wp_kses($description, array()); ?></p>
  </div>
  <?php endif; ?>
    
  <?php if ($icon_post!="") { ?>

    <div class="meta">

      <?php 

      echo wp_kses($icon_post, array(
          'a' => array(
              'href' => array(),
              'class' =>array(),
              'title' => array()
          ),
          'h2' => array(
              'class' =>array()
            ),
          'span' => array(
            'class' =>array(),
            'aria-current' => array()
            ),
          'div' => array(
            'class' =>array()
            )
      ));

       ?>

    </div>

  <?php } ?>

  </div>
  <a href="#start" id="section06"><span></span></a>
</div><!-- .custom-header -->
