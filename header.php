<!DOCTYPE html>
<html <?php language_attributes(); ?> ng-app="radioApp">

<head>


  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <?php if (is_search()) { ?>
  <meta name="robots" content="noindex, nofollow" /> 
  <?php } ?>

  <title>BYU-Idaho Speeches</title>

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
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".site-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
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
                <li><a href="http://www.byui.edu/activities/get-involved">Get Involved</a></li>                    
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
          <div class="navbar-right">
            <a href="https://web.byui.edu/services/login?RedirectURL=https://my.byui.edu/?cid=hli:111" class="sign-in btn btn-primary navbar-btn">Sign In</a>
          </div>
          <form method="get" action="http://search.byui.edu/search?" _lpchecked="1"  role="search" class="navbar-form form-horizontal container visible-xs">
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
          </form>
        </div><!--/.navbar-collapse -->
      </div><!--/.container -->
    </nav>

    <div class="site-banner">
      <div class="container">
        <a class="site-logo navbar-brand" href="http://www.byui.edu" title="BYU-Idaho">
          <span aria-hidden="true" class="icon icon-byui-logo">
            <span class="sr-only">BYU-Idaho</span>
          </span>
        </a>
        <div class="site-title"><?php echo ( is_home() ) ? "Home" : ( is_category() ? single_cat_title() : get_the_title());?></div>
        <form method="get" action="http://search.byui.edu/search?" _lpchecked="1"  role="search" class="desktop-search form-horizontal container hidden-xs hidden-sm row">
          <div class="search input-group">
            <input type="text" class="form-control" name="q" placeholder="Search" alt="Search the BYU-I website" />
            <span class="input-group-btn">
              <button type="submit" class="btn btn-success">
                <span aria-hidden="true" class="icon icon-magnifying-glass"></span>
                <span class="sr-only">Go</span>
              </button>
            </span>
            <input type="hidden" name="site" value="default_collection" `/>
            <input type="hidden" name="client" value="byui_frontend" />
            <input type="hidden" name="output" value="xml_no_dtd" />
            <input type="hidden" name="proxystylesheet" value="byui_frontend" />
            <input type="hidden" name="proxyreload" value="0" />
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