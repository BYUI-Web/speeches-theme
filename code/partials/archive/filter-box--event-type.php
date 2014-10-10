<?php
    $eventTypes = array("Devotional", "Forum");
?>

<div class="filter-box">
    <h3>EVENT TYPE</h3>
    <div class="filters">
        <div class="flat-form-elements">
           <?php foreach($eventTypes as $type) : ?>
                <input type="checkbox" name="event" value="<?php echo $type; ?>" id="<?php echo $type; ?>">
                <label for="<?php echo $type; ?>"><?php echo $type; ?>s</label>
            <?php endforeach; ?>
        </div>
    </div>
</div>