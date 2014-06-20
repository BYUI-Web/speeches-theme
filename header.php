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

  <!-- Modernizr (Cross Browser Support) -->
  <script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr-2.7.1.min.js"></script>

  <!-- jQuery -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/jquery-ui-1.10.3.custom.min.css" type="text/css" media="screen, projection">

  <!-- BootStrap -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

  <!-- Include Google Autocomplete Stuff (test) -->
  <script src="<?php bloginfo('template_url') ?>/js/searchComplete.js"></script>
  
  <!-- BYU-I Stylesheets -->
  <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/screen.css" type="text/css" media="screen, projection">
  <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/global.css" type="text/css" media="screen, projection">

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
  <!-- Google Analytics -->
  <?php $analytics_url = 'framework/google_analytics.php';
        require_once ($analytics_url); ?>
</head>

<body id="base_template top" <?php if ( is_home() ) :?> class="home"<?php endif; ?>><!-- Body tag must have page template name in it to inherit template-specific css rules -->
  <!-- AddThis Smart Layers BEGIN -->
  <!-- Go to http://www.addthis.com/get/smart-layers to customize -->
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4e8f53ed7638d457"></script>
  <script type="text/javascript">
    addthis.layers({
      'theme' : 'transparent',
      'share' : {
        'position' : 'left',
        'numPreferredServices' : 5
      }   
    });
  </script>
  <!-- AddThis Smart Layers END -->
  <header role="banner" class="global-header">
     <nav role="navigation" class="site-navigation navbar navbar-inverse">
      <div class="container">
        <div class="row">
          <div class="navbar-header visible-xs">
            <a href="{{ site.baseurl }}/" title="BYU-Idaho">
              <svg class="mobile-logo" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="985.14px" height="570.167px" viewBox="19.384 226.888 985.14 570.167" enable-background="new 19.384 226.888 985.14 570.167" xml:space="preserve">
                <path d="M132.864,332.018c0-2.488,0-34.12,0-47.602c0-3.64-0.512-6.528-0.512-6.528s3.328,0.526,6.556,0.526 c3.172,0,35.854,0,35.854,0c27.278,0,43.336,4.252,43.336,29.056c0,16.1-9.984,30.536-42.24,30.536c0,0-33.692,0-36.95,0 c-3.158,0-6.456,0.356-6.456,0.356S132.864,335.446,132.864,332.018L132.864,332.018L132.864,332.018z M132.864,441.344 c0-0.81,0-39.794,0-55.04c0-3.726-0.47-6.372-0.47-6.372s3.172,0.44,6.414,0.44c3.242,0,30.392,0,30.392,0 c24.178,0,53.816,0,53.816,33.494c0,24.79-21.192,33.521-49.72,33.521c0,0-33.622,0-34.488,0c-3.172,0-6.286,0.471-6.286,0.471 S132.864,444.502,132.864,441.344L132.864,441.344L132.864,441.344z M45.838,248.904v229.121c0,7.51,0.456,10.069-4.906,13.426 c-5.092,3.158-10.354,3.74-18.902,5.134c0,0-0.114,0-0.128,0c-0.868,0.2-0.668,3.414,0.128,3.414c0.626,0,185.416,0,185.416,0 c78.194,0,111.062-31.032,111.062-79.446c0-35.768-16.712-57.614-49.72-65.834c-0.512-0.156-0.512-0.84,0-1.11 c21.048-6.542,40.376-21.816,40.376-59.08c0-50.56-34.12-67.626-108.586-67.626L22.09,226.888c-0.84,0-1.11,3.256-0.2,3.428 c0.128,0,0.2,0.014,0.2,0.014c8.504,1.45,13.796,2.006,18.872,5.206C46.308,238.862,45.838,241.464,45.838,248.904L45.838,248.904z M979.996,248.904c0-7.438-0.356-10.04,4.778-13.298c5.233-3.158,10.495-3.754,19-5.206c0,0,0.027-0.014,0.184-0.014 c0.796-0.17,0.768-3.414-0.184-3.414l-136.79-0.014c-0.811,0-1.038,3.256-0.042,3.428l0.042,0.014 c8.676,1.038,12.644,2.006,17.777,5.206c5.29,3.256,4.809,5.874,4.809,13.326v137.672c0,31.374-18.021,55.538-53.704,55.538 c-35.769,0-53.816-24.149-53.816-55.538V248.932c0-7.41-0.312-10.07,4.906-13.326c5.206-3.158,9.486-3.954,17.878-5.206 c0,0,0.042-0.014,0.114-0.014c0.868-0.17,0.696-3.414-0.114-3.414h-129.11c-0.968,0-0.768,3.242,0,3.414 c0.028,0,0.284,0.014,0.284,0.014c4.65,0.298,7.922,0.612,10.794,3.1c4.296,3.598,5.064,7.922,5.064,15.416l-0.114,135.438 c0,65.252,35.769,120.704,144.156,120.704S979.98,449.662,979.98,384.354L979.996,248.904L979.996,248.904z M565.59,500.01 c0.824,0,1.024-3.158,0.17-3.328c-0.027-0.027-0.142-0.027-0.142-0.027c-8.504-1.45-13.782-1.992-18.888-5.135 c-5.29-3.3-4.879-5.916-4.879-13.34v-86.912l94.564-140.444c5.22-7.708,8.548-11.676,12.771-15.16 c0.797-0.668,2.505-1.834,3.471-2.504c3.939-1.962,5.462-2.446,10.226-2.588l0.114-0.014c0.996-0.042,1.18-3.4,0.2-3.4 l-127.488-0.014c-1.01,0-0.868,3.328,0.114,3.428c0.027,0,0.142,0.014,0.142,0.014c6.216,0,13.796,0.042,12.601,9.032 c-0.668,8.534-37.448,61.738-50.588,81.948c-1.82,2.844-3.301,5.874-3.927,9.5c-0.498-3.612-2.788-7.21-4.237-9.4 c-18.248-27.278-49.437-71.282-50.29-82.104c-0.811-9.174,6.271-8.918,12.502-8.918c0,0,0.014-0.014,0.17-0.014 c0.84-0.028,1.138-3.414,0.17-3.414l-133.96,0.014c-0.796,0-0.696,3.1,0.014,3.4c0.143,0.014,0.185,0.014,0.185,0.014 c5.745,0.626,8.817,0.184,15.573,3.47c0.782,0.37,2.603,1.622,3.328,2.262c4.252,3.598,6.87,6.884,12.118,14.592l94.408,139.79 v87.538c0,7.51,0.47,10.07-4.792,13.426c-5.206,3.158-10.396,3.74-18.888,5.134c0,0-0.156,0-0.156,0.028 c-0.952,0.17-0.796,3.328,0.156,3.328L565.59,500.01L565.59,500.01z M299.036,769.138c-18.204,18.376-38.3,26.282-72.278,26.282 c-11.676,0-30.408-0.512-40.264-0.512s-21.988,0.512-33.664,0.512c-0.81,0-1.024-3.144,0.298-3.484 c10.326-0.981,14.82-2.602,18.062-4.424c3.442-1.947,5.448-6.386,5.448-58.582l-0.054-38.726c0-52.183-2.006-56.975-5.448-58.51 c-3.242-1.921-7.736-3.429-18.062-4.467c-1.322-0.298-1.11-3.441-0.298-3.441c11.676,0,23.808,0.512,33.664,0.512 c9.842,0,34.134-0.512,46.122-0.512c53.22,0,91.648,35.754,91.648,83.739C324.224,730.568,314.952,752.952,299.036,769.138 L299.036,769.138L299.036,769.138z M224.356,632.504c-15.928,0-22.528,2.148-24.42,4.438c-1.608,2.134-3.94,13.81-3.94,52.521 v39.452c0,33.976,2.318,47.16,5.774,50.902c4.808,4.964,10.866,6.77,24.662,6.77c51.882,0,75.734-24.604,75.734-74.368 C302.222,671.744,274.944,632.504,224.356,632.504L224.356,632.504L224.356,632.504z M473.358,795.42c-0.769,0-1.038-3.144,0-3.484 c8.22-0.781,13.256-2.317,13.256-6.371c0-4.438-3.414-16.427-18.519-54.528h-54.87c-12.487,34.147-15.388,47.146-15.388,52.764 c0,4.65,3.727,7.096,15.09,8.078c1.011,0.356,0.811,3.484,0,3.484c-17.279,0-31.246,0-54.328,0c-0.823,0-1.336-3.145,0-3.484 c7.923-0.782,12.687-2.318,16.713-4.978c2.646-2.104,7.382-5.774,26.552-57.971l14.08-38.712 c8.178-22.172,16.909-45.326,23.496-65.906c0.512-1.92,8.533-1.92,9.046,0c8.008,23.013,14.819,41.843,24.136,65.906l15.076,38.712 c20.664,52.196,24.136,56.137,27.876,58.582c4.438,2.83,8.504,3.641,15.886,4.424c1.038,0.356,0.824,3.484,0,3.484 C506.994,795.42,498.802,795.42,473.358,795.42L473.358,795.42L473.358,795.42z M440.52,656.328l-23.352,63.857h46.948 L440.52,656.328z M689.878,795.42c-1.11,0-1.11-3.144,0.298-3.484c10.34-0.981,14.834-2.602,17.948-4.424 c3.158-1.947,5.576-6.386,5.576-58.582v-16.456H613.632v16.456c0,52.196,2.318,56.648,5.532,58.582 c3.144,1.82,7.693,3.442,18.048,4.424c1.322,0.356,1.322,3.484,0.512,3.484c-25.443,0-42.409,0-67.313,0 c-0.824,0-0.982-3.144,0.214-3.484c10.368-0.981,14.92-2.602,18.048-4.424c3.47-1.947,5.59-6.386,5.59-58.582l-0.058-38.726 c0-52.183-2.12-56.975-5.59-58.51c-3.145-1.921-7.694-3.429-18.048-4.467c-1.194-0.298-1.038-3.441-0.215-3.441 c24.334,0,41.358,0,67.314,0c0.81,0,0.81,3.158-0.512,3.441c-10.368,1.038-14.92,2.603-18.049,4.467 c-3.157,1.592-5.531,6.386-5.531,58.51v12.43h100.067v-12.43c0-52.183-2.346-56.975-5.575-58.51 c-3.129-1.921-7.681-3.429-17.948-4.467c-1.336-0.298-1.336-3.441-0.298-3.441c24.277,0,41.527,0,67.029,0 c1.011,0,1.011,3.158-0.199,3.441c-10.469,1.038-14.834,2.603-18.091,4.467c-3.144,1.592-5.546,6.386-5.546,58.51v38.712 c0,52.196,2.347,56.647,5.546,58.582c3.257,1.82,7.681,3.441,18.091,4.424c1.266,0.356,1.266,3.484,0.199,3.484 C731.96,795.42,714.71,795.42,689.878,795.42L689.878,795.42L689.878,795.42z M898.872,797.056 c-50.304,0-86.386-37.432-86.386-85.403c0-45.513,36.01-89.486,90.111-89.486c50.561,0,86.414,37.32,86.414,85.362 C989,752.952,953.16,797.056,898.872,797.056L898.872,797.056z M897.536,631.922c-47.433,0-63.062,37.916-63.062,72.078 c0,43.208,27.265,83.144,69.66,83.144c47.16,0,62.748-37.888,62.748-72.077C966.94,671.958,939.918,631.922,897.536,631.922 L897.536,631.922z M21.646,559.502c-1.266,0-2.262,1.038-2.262,2.276c0,1.237,0.996,2.262,2.262,2.262h952.576 c1.194,0,2.276-1.01,2.276-2.262s-1.038-2.276-2.276-2.276H21.646z M21.376,795.42c-0.81,0-0.81-3.271,0.342-3.484 c10.312-0.995,17.224-2.646,20.38-4.565c3.158-1.806,5.546-6.286,5.546-58.468v-38.698c0-52.183-2.332-56.974-5.546-58.51 c-3.158-1.92-10.07-3.429-20.38-4.467c-1.152-0.327-1.152-3.441-0.342-3.441c24.632,0,46.35,0,71.594,0 c0.782,0,1.01,3.128-0.312,3.441c-10.34,1.038-16.924,2.603-20.082,4.467c-3.47,1.592-5.86,6.386-5.86,58.51v38.642 c0,52.11,2.318,56.662,5.86,58.469c3.158,1.92,9.742,3.569,20.082,4.565c1.322,0.214,1.038,3.484,0.312,3.484 C68.324,795.42,46.606,795.42,21.376,795.42L21.376,795.42z"/>
                </svg>
            </a>
            <div class="mobile-dropdown-icon-container">
              <a href="#" data-toggle="collapse" data-target=".site-search-collapse">
                <svg class="mobile-nav-icon search-icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="74px" height="74.5px" viewBox="0 0 74 74.5" style="enable-background:new 0 0 74 74.5;" xml:space="preserve">
                  <style type="text/css">
                  <![CDATA[
                    .st0{display:inline;fill:#0472BE;}
                    .st1{display:none;}
                  ]]>
                  </style>
                  <g id="blue" class="st1">
                    <rect x="-30.2" y="-13.5" class="st0" width="351" height="105"/>
                  </g>
                  <g id="icons">
                    <g>
                      <path d="M37.2,1C17.2,1,0.9,17.3,0.9,37.2c0,19.9,16.3,36.2,36.2,36.2s36.2-16.3,36.2-36.2C73.3,17.3,57.1,1,37.2,1z M37.2,71.5 C18.3,71.5,3,56.1,3,37.3S18.3,3,37.2,3c18.9,0,34.2,15.4,34.2,34.2C71.4,56,56,71.5,37.2,71.5z"/>
                      <path d="M45.6,34.7c0-6.5-5.3-11.7-11.7-11.7c-6.5,0-11.7,5.3-11.7,11.7c0,6.4,5.3,11.7,11.7,11.7c1.6,0,3.2-0.3,4.6-1l8.4,8.4 l6.2-6.2l-8.4-8.4C45.2,37.9,45.6,36.3,45.6,34.7z M33.8,41.4c-3.7,0-6.7-3-6.7-6.7s3-6.7,6.7-6.7c3.7,0,6.7,3,6.7,6.7 S37.5,41.4,33.8,41.4z"/>
                    </g>
                  </g>
                </svg>
              </a>
              <a href="https://secure.byui.edu/cas/login?service=https://web.byui.edu/Services/Login/?RedirectURL=https%3a%2f%2fmy.byui.edu%2f">
                <svg class="mobile-nav-icon login-icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                   width="74.5px" height="73.8px" viewBox="0 0 74.5 73.8" style="enable-background:new 0 0 74.5 73.8;" xml:space="preserve">
                  <style type="text/css">
                  <![CDATA[
                    .st0{display:inline;fill:#0472BE;}
                    .st1{display:none;}
                  ]]>
                  </style>
                  <g id="blue" class="st1">
                    <rect x="-130.5" y="-13.8" class="st0" width="351" height="105"/>
                  </g>
                  <g id="icons">
                    <g>
                      <path d="M37.4,0.7C17.4,0.7,1.1,17,1.1,37c0,20,16.3,36.2,36.2,36.2C57.2,73.2,73.6,57,73.6,37C73.6,17,57.4,0.7,37.4,0.7z
                         M37.4,2.7c18.9,0,34.2,15.4,34.2,34.2c0,8.3-2.9,15.8-7.8,21.8C60,51.1,53.2,45.6,45.2,43.4c-2.3,1.5-5,2.3-7.8,2.3
                        c-2.9,0-5.5-0.9-7.8-2.3c-8,2.2-14.9,7.8-18.6,15.3C6.1,52.8,3.1,45.2,3.1,37C3.1,18.1,18.5,2.7,37.4,2.7z"/>
                      <path d="M37.4,40.8c5.8,0,10.6-5.3,10.6-11.9S44.6,17,37.4,17s-10.6,5.3-10.6,11.9S31.6,40.8,37.4,40.8z"/>
                    </g>
                  </g>
                </svg>
              </a>
              <a href="#" data-toggle="collapse" data-target=".site-navbar-collapse">
                <svg class="mobile-nav-icon menu-icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="89.5px" height="69.2px" viewBox="0 0 89.5 69.2" style="enable-background:new 0 0 89.5 69.2;" xml:space="preserve">
                  <g id="blue" class="st1">
                    <rect x="-235" y="-16.2" class="st0" width="351" height="105"/>
                  </g>
                  <g id="icons">
                    <g>
                      <path d="M23.1,24.6h42.8c1.1,0,2-0.9,2-2s-0.9-2-2-2H23.1c-1.1,0-2,0.9-2,2S22,24.6,23.1,24.6z"/>
                      <path d="M66.3,32.5H23.5c-1.1,0-2,0.9-2,2s0.9,2,2,2h42.8c1.1,0,2-0.9,2-2S67.4,32.5,66.3,32.5z"/>
                      <path d="M66,44.4H23.3c-1.1,0-2,0.9-2,2s0.9,2,2,2H66c1.1,0,2-0.9,2-2S67.1,44.4,66,44.4z"/>
                      <path d="M81.8,0.8H7.6c-3.7,0-6.7,3-6.7,6.7v53.9c0,3.7,3,6.7,6.7,6.7h74.2c3.7,0,6.7-3,6.7-6.7V7.6C88.5,3.8,85.5,0.8,81.8,0.8z
                      M86.5,61.4c0,2.6-2.1,4.7-4.7,4.7H7.6c-2.6,0-4.7-2.1-4.7-4.7V7.6C2.9,5,5,2.9,7.6,2.9h74.2c2.6,0,4.7,2.1,4.7,4.7V61.4z"/>
                    </g>
                  </g>
                </svg>
              </a>
            </div>
          </div>
        </div>

        <div class="site-search-collapse navbar-collapse collapse">
          <form class="navbar-form navbar-left" role="search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search" name="q">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-success">Submit</button>
              </span>
              
            </div>
            
          </form>
        </div>
        
        <div class="navbar-collapse site-navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
              <a href="#administrative" class="dropdown-toggle" data-toggle="dropdown">
                University <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="http://www.byui.edu/admissions">Apply</a></li>
                <li><a href="http://www.byui.edu/about/">About BYUI</a></li>
                <li><a href="http://www.byui.edu/contact-us/">Contact</a></li>
                <li><a href="http://www.byui.edu/financial-aid/">Financial Aid</a></li>
                <li><a href="http://www.byui.edu/student-support/ask-byui">Information Desk</a></li>
                <li><a href="http://www.byui.edu/president">President's Office</a></li>
                <li><a href="http://www.byui.edu/student-records/">Registration</a></li>
                <li><a href="http://www.byui.edu/university-relations">University Relations</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#academic" class="dropdown-toggle" data-toggle="dropdown">
                Academics <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="http://www.byui.edu/student-records/academic-deadlines">Academic Schedule</a></li>
                <li><a href="http://www.byui.edu/academic-discovery-center">Advising</a></li>
                <li><a href="http://www.byui.edu/directories/colleges-and-departments">Colleges and Departments</a></li>
                <li><a href="http://www.byui.edu/catalog/">Course Catalog</a></li>
                <li><a href="http://www.byui.edu/about/defining-aspects/learning-model">Learning Model</a></li>
                <li><a href="http://www.byui.edu/testing-services">Testing Center</a></li>
                <li><a href="http://www.byui.edu/academic-support-centers/tutoring-center">Tutoring</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#student-life" class="dropdown-toggle" data-toggle="dropdown">
                Living <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="http://www.byui.edu/activities">Activities</a></li>
                <li><a href="http://www.byui.edu/food-services/">Food</a></li>
                <li><a href="http://www.byui.edu/get-involved">Get Involved</a></li>                    
                <li><a href="http://www.byui.edu/health-center">Health and Wellness</a></li>
                <li><a href="http://www.byui.edu/student-honor-office">Honor Code</a></li>      
                <li><a href="http://www.byui.edu/housing/">Housing</a></li>
                <li><a href="http://www.byui.edu/human-resources/employment-opportunities/student-employment">Student Employment</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#services" class="dropdown-toggle" data-toggle="dropdown">
                Services <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="http://www.byui.edu/ask/live-chat/?cid=hli:109">Ask BYUI</a></li>
                <li><a href="http://www.byui.edu/disabilities/">Disability Services</a></li>
                <li><a href="http://www.byui.edu/international-services">International Services</a></li>
                <li><a href="http://www.lib.byui.edu/">Library</a></li>
                <li><a href="http://www.byui.edu/university-operations/security-and-safety/parking-services">Parking</a></li>
                <li><a href="http://www.byui.edu/university-operations/security-and-safety">Security</a></li>
                <li><a href="http://www.byui.edu/information-technology">Technical Help</a></li>
                <li><a href="http://www.byuistore.com/">University Store</a></li>
              </ul>
            </li>
     <li class="dropdown">
    <a href="#audience" class="dropdown-toggle" data-toggle="dropdown">
    Audience <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
       <li><a href="http://www.byui.edu/future-students/">Future Students</a></li>
       <li><a href="https://my.byui.edu/ics">Current Students</a></li>
       <li><a href="https://my.byui.edu/ics">Employees</a></li>
       <li><a href="http://beta.byui.edu/parents">Parents and Family</a></li>
       <li><a href="http://www.byuiconnect.com/s/1085/07-idaho/idaho-start.aspx?gid=4&amp;pgid=61">Alumni</a></li>
    </ul>
    </li>
            <li class="dropdown">
              <a href="#find" class="dropdown-toggle" data-toggle="dropdown">
                Find <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="http://www.byui.edu/directories/">A-Z Directory</a></li>
                <li><a href="https://web.byui.edu/BulletinBoard">Bulletin Board</a></li>
                <li><a href="http://calendar.byui.edu/">Calendar</a></li>
                <li><a href="http://www.byui.edu/maps">Map</a></li>
              </ul>
            </li>
          </ul>
          <div class="navbar-right hidden-xs">
            <a href="https://web.byui.edu/services/login?RedirectURL=https://my.byui.edu/?cid=hli:111" class="sign-in btn btn-primary navbar-btn">Sign In</a>
          </div>
          <!-- <form method="get" action="http://search.byui.edu/search?" _lpchecked="1"  role="search" class="navbar-form form-horizontal container visible-xs">
            <div class="search input-group">
              <input type="text" class="form-control" name="q" placeholder="Search" alt="Search the BYU-I website" />
              <span class="input-group-btn">
                <button type="submit" class="btn btn-success">
                  <span aria-hidden="true" class="icon icon-magnifying-glass"></span>
                  <span class="sr-only">Go</span>
                </button>
              </span>
              <input type="hidden" name="site" value="default_collection"/>
              <input type="hidden" name="client" value="byui_frontend"/>
              <input type="hidden" name="output" value="xml_no_dtd"/>
              <input type="hidden" name="proxystylesheet" value="byui_frontend"/>
              <input type="hidden" name="proxyreload" value="0"/>
            </div>
          </form> -->
        </div><!--/.navbar-collapse -->
      </div><!--/.container -->
    </nav>

    <div class="site-banner hidden-xs">
      <div class="container">
        <a class="site-logo navbar-brand" href="{{ site.baseurl }}/" title="BYU-Idaho">
          <span aria-hidden="true" class="icon icon-byui-logo">
            <span class="sr-only">BYU-Idaho</span>
          </span>
        </a>
        <div class="site-title"><?php //echo ( is_home() ) ? "Speeches" : ( is_category() ? single_cat_title() : get_the_title());?>Speeches</div>
        <form method="get" action="http://search.byui.edu/search?" _lpchecked="1"  role="search" class="desktop-search form-horizontal container hidden-xs row">
          <div class="search input-group">
            <input type="text" class="form-control" name="q" placeholder="Search" alt="Search the BYU-I website" />
            <span class="input-group-btn">
              <button type="submit" class="btn btn-success search-button-fix">
                <span aria-hidden="true" class="icon icon-magnifying-glass"></span>
                <span class="sr-only">Go</span>
              </button>
            </span>
            <input type="hidden" name="site" value="default_collection"/>
            <input type="hidden" name="client" value="byui_frontend"/>
            <input type="hidden" name="output" value="xml_no_dtd"/>
            <input type="hidden" name="proxystylesheet" value="byui_frontend"/>
            <input type="hidden" name="proxyreload" value="0"/>
          </div>
        </form>
      </div>
    </div>
  </header>
  <main role="main">
    <div class="container content-wrap">
    <div class="row breadcrumb-row">
        <?php breadcrumbs(); ?>
      </div>
    </div>
