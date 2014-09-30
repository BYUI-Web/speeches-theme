<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <?php if (is_search()) { ?>
  <meta name="robots" content="noindex, nofollow" /> 
  <?php } ?>

  <title>Brigham Young University - Idaho : Speeches</title>

  <!-- Radio Station Meta -->
  <meta name="description" content="BYU-Idaho Radio provides news, campus updates, devotionals, and inspirational music to listeners worldwide.">
  <meta name="author" content="Brigham Young University-Idaho">

  <!-- FAVICONS -->
  <link rel="icon" href="http://www.byui.edu/prebuilt/stylenew/images/ico/favicon.ico" />

  <!-- Responsive Design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- jQuery -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

  <!-- BootStrap -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  
  <!-- BYU-I Stylesheets -->
  <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/assets/css/global.min.css" type="text/css" media="screen, projection">

  <!-- EMERGENCY FEED Parsing -->
  <!--<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/emergency.min.js"></script>-->

  <!-- Facebook/Twitter OpenGraph Tags -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@byuidahoradio">
  <?php if ( !is_single() ) : ?>
    <meta property="og:image" content="http://www.byuidahoradio.org/logo.png"/>
  <?php endif; ?>
  <!-- Wordpress Style.css -->
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

  <!-- WP_Head -->
  <?php wp_head(); ?>

</head>

<body id="base_template top" <?php if ( is_home() ) :?> class="home"<?php endif; ?>><!-- Body tag must have page template name in it to inherit template-specific css rules -->
  <!-- AddThis Smart Layers BEGIN -->
  <!-- Go to http://www.addthis.com/get/smart-layers to customize -->
  <!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4e8f53ed7638d457"></script>
  <script type="text/javascript">
    addthis.layers({
      'theme' : 'transparent',
      'share' : {
        'position' : 'left',
        'numPreferredServices' : 5
      }   
    });
  </script> -->
  <!-- AddThis Smart Layers END -->
  
  <!-- header include -->
  <!-- header.html -->

  <main role="main">
    <div class="container content-wrap">
    <div class="row breadcrumb-row">
        <?php breadcrumbs(); ?>
      </div>
    </div>
