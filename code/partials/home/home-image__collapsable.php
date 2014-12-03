<figure class="home-image--collapsable row">
   <a href="<?php echo $homeImage['links-to']; ?>">
        <picture>
            <source media="(min-width: 992px)" srcset="<?php bloginfo('template_url') ?><?php echo $homeImage['image-desktop']; ?>" />
            <!-- default image is mobile (mobile first) plus this will prevent the double download from the polyfill on mobile -->
            <img class="col-all-4" src="<?php bloginfo('template_url') ?><?php echo $homeImage['image-mobile']; ?>" alt="<?php echo $homeImage['image-alt']; ?>" />
        </picture>
        <figcaption class="col-all-8">
            <p class="home-image__caption">
                <?php echo $homeImage["caption"]; ?>
            </p>
            <p class="home-image__subcaption visible-sm visible-xs">
                <?php echo $homeImage["subcaption"]; ?>
            </p>
        </figcaption>
    </a>
</figure>
