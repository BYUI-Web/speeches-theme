<div class="sidebar-inner group event-details">
    <h3>Event Details</h3>
    <ul>
        <li><b>Event Type: </b>BYU-Idaho <?php echo $current_post_type; ?></li>
        <li><b>Speaker: </b><?php echo getSpeaker($current_post); ?></li>
        <li><b>When: </b><?php echo getPostTime($current_post); ?></li>
        <?php if (getEventLocation($current_post)) { ?>
        <li><b>Where: </b> <?php echo getEventLocation($current_post); ?></li>
        <?php } ?>
        <li>
            <b>Prepare: </b>The following scriptures have been recommended by the speaker, in preparation for the event.
            <ul>
                <?php foreach ($prep_material as $prep): ?>
                    <li><?php echo $prep; ?></li>
                <?php endforeach; ?>
            </ul>
        </li>
    </ul>
</div>