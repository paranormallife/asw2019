<!DOCTYPE html>

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-138923200-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-138923200-1');
</script>
<meta http-equiv="Content-Type" content="text/html, charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<?php 
/* Get the Summary */	$summary = get_post_meta($post->ID, 'summary', true);
/* Get Featured Image */ $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium', false, '' );
?>

<meta property="og:title" content="<?php bloginfo('name'); ?>: <?php the_title(); ?>"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="<?php echo 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>"/>

<?php if ( $featured_image !='' ) { ?>
	<meta property="og:image" content="<?php echo $featured_image[0]; ?>"/>
<?php } else { ?>
	<meta property="og:image" content="<?php site_icon_url() ?>"/>
<?php } ?>


<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>

<?php if ( $summary !='' ) { ?>
	<meta property="og:description" content="<?php echo $summary; ?>"/>
	<meta name="description" content="<?php echo $summary; ?>">
<?php } else { ?>
	<meta property="og:description" content="<?php bloginfo('description'); ?>"/>
	<meta name="description" content="<?php bloginfo('description'); ?>"/>
<?php } ?>


<?php if ( is_front_page() ) { ?>
<title><?php /* Site Name */ bloginfo('name'); echo ': '; bloginfo('description'); ?></title>
<? } else { ?>
<title><?php /* Site Name */ bloginfo('name'); ?>. <?php /* Page Title */ wp_title( '|', true, 'right' );?> </title>
<?php } ?>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

<!--[if lt IE 10]><link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style_ie.css" type="text/css" /><![endif]-->

<!--[if lt IE 9]>
   <script>
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('article');
      document.createElement('aside');
      document.createElement('footer');
   </script>
   <noscript>
     <strong>Warning !</strong>
     Because your browser does not support HTML5, some elements are simulated using JScript.
     Unfortunately your browser has disabled scripting. Please enable it in order to display this page.
  </noscript>
<![endif]-->

<?php /* This should always be included just before the </head> tag. */ wp_head(); ?>
</head>

<body id="<?php echo $post->post_name; ?>" class="asw <?php echo get_post_type(); ?>">

<div id="backdrop"></div>

<header>
  <div class="header-wrapper">
    <h1>
      <a href="<?php echo get_bloginfo('wpurl'); ?>" title="Home Page"><?php echo get_bloginfo('name'); ?>&nbsp;&nbsp;</a>
      <?php
        if( is_front_page() ) {
          echo get_option('home_title');
        } else {
          the_title();
          echo '.';
        }
      ?>
    </h1>
  </div>
</header>

<?php get_template_part('snippets/header_nav'); ?>

<div id="content-wrap">

<!-- END OF HEADER.PHP -->


