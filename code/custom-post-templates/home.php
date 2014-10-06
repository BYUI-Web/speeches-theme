<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<section class="home-page container">
    <nav class="home-page__nav">
        <ul class="row">
            <li class="col-md-4">
                <a href="/devotionals">
                    <p class="title">Devotionals</p>
                    <p class="hidden-sm hidden-xs">Held on Tuesdays at 2:10 p.m. in the BYU-Idaho Center</p>
                    <span class="nav-arrows icon-angle-right"></span>
                </a>
            </li>
            <li class="col-md-4">
                <a href="/forums">
                    <p class="title">Forums</p>
                    <p class="hidden-sm hidden-xs">Held on Tuesdays at 2:10 p.m. in the BYU-Idaho Center</p>
                    <span class="nav-arrows icon-angle-right"></span>
                </a>
            </li>
            <li class="col-md-4">
                <a href="/archive">
                    <p class="title">Archive</p>
                    <p class="hidden-sm hidden-xs">Held on Tuesdays at 2:10 p.m. in the BYU-Idaho Center</p>
                    <span class="nav-arrows icon-angle-right"></span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="row home-images row">
        <figure class="home-image">
            <img src="<?php bloginfo("template_url") ?>/assets/images/home/forum-home.jpg" alt="Forums coming up" />
            <figcaption>
                <span class="home-image__when">This Week</span>
                <p class="home-image__caption">
                    <span class="bold">Forum</span> with Ryan Anderson
                </p>
            </figcaption>
        </figure>
        <figure class="home-image">
            <img src="<?php bloginfo("template_url") ?>/assets/images/home/devo-home.jpg" alt="Devotionals coming up" />
            <figcaption>
                <span class="home-image__when">Next Week</span>
                <p class="home-image__caption">
                    <span class="bold">Devotional</span> with Pres. Clark
                </p>
            </figcaption>
        </figure>
        <figure class="home-image--collapsable row">
            <picture>
                <source media="(min-width: 992px)" srcset="<?php bloginfo('template_url') ?>/assets/images/home/prepare-desktop.jpg"/>
                <!-- default image is mobile (mobile first) plus this will prevent the double download from the polyfill on mobile -->
                <img class="col-all-4" src="<?php bloginfo('template_url') ?>/assets/images/home/prepare-mobile.jpg" alt="Prepare for devotional" />
            </picture>
            <figcaption class="col-all-8">
                <p class="home-image__caption">
                    Prepare for Devotional
                </p>
                <p class="home-image__subcaption visible-sm visible-xs">
                    Read President Clark's address on preperation
                </p>
            </figcaption>
        </figure>
        <figure class="home-image--collapsable row">
            <picture>
                <source media="(min-width: 992px)" srcset="<?php bloginfo('template_url') ?>/assets/images/home/volunteer-desktop.jpg"/>
                <!-- default image is mobile (mobile first) plus this will prevent the double download from the polyfill on mobile -->
                <img class="col-all-4" src="<?php bloginfo('template_url') ?>/assets/images/home/volunteer-mobile.jpg" alt="Volunteer at devotional" />
            </picture>            
               <figcaption class="col-all-8">
                <p class="home-image__caption">
                    Volunteer
                </p>
                <p class="home-image__subcaption visible-sm visible-xs">
                    How to become a devotional usher
                </p>
            </figcaption>
        </figure>
        <figure class="home-image--collapsable row">
            <picture>
               <source media="(min-width: 992px)" srcset="<?php bloginfo('template_url') ?>/assets/images/home/behind-desktop.jpg"/>
                <!-- default image is mobile (mobile first) plus this will prevent the double download from the polyfill on mobile -->
                <img class="col-all-4" src="<?php bloginfo('template_url') ?>/assets/images/home/behind-mobile.jpg" alt="Behind the Scenes" />
            </picture>
            <figcaption class="col-all-8">
                <p class="home-image__caption">
                    Behind the Scenes
                </p>
                <p class="home-image__subcaption visible-sm visible-xs">
                    Read something about with devotional stuff
                </p>
            </figcaption>
        </figure>
    </div>
    <div class="row boxes">
        <div class="box">
            <h4 class="header">Popular</h4>
            <p class="when">25 February 2014</p>
            <p class="title">Witnesses of God</p>
            <p class="who">Elder Dallin H. Oaks</p>
            <p class="position">Quorum of the Twelve Apostles</p>
        </div>
        <div class="box">
            <h4 class="header">Recent</h4>
            <p class="when">12 August 2014</p>
            <p class="title">Expanding the Abundant Life</p>
            <p class="who">Brother Leon Anderson</p>
            <p class="position">Some position on campus</p>
        </div>
        <div class="box">
            <h4 class="header">Upcoming</h4>
            <p class="when">19 August 2014</p>
            <p class="who">Brother Garth Nelson</p>
            <p class="position">Manager of something on Campus</p>
        </div>
    </div>
</section>