<figure class="home-image">
    <a href="<?php echo $homeImage['speech']->guid; ?>">
        <img src="<?php bloginfo("template_url") ?><?php echo $homeImage["image"]; ?>" alt="<?php echo $homeImage["name"]; ?> coming up" />
        <figcaption>
            <span class="home-image__when"><?php echo $homeImage["time"]; ?></span>
            <p class="home-image__caption">
                <span class="bold"><?php echo $homeImage["name"]; ?></span> with <?php echo $homeImage["speaker"]->post_title; ?>
            </p>
        </figcaption>
    </a>
</figure>
