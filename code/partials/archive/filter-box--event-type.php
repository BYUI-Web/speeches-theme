<?php
    //currently selected event types
    $events = get_query_var("event");
    if ($events == "") {
        $events = array();
    }
    
    $eventTypes = array("devotional", "forum");
?>

<div class="filter-box">
    <h3>EVENT TYPE</h3>
    <div class="filters">
        <div class="flat-form-elements">
           <?php foreach($eventTypes as $type) : ?>
                <input type="checkbox" <?php echo (in_array($type, $events)) ? 'checked' : '' ?> name="event[]" value="<?php echo $type; ?>" id="<?php echo $type; ?>">
                <label for="<?php echo $type; ?>"><?php echo ucwords($type); ?>s</label>
            <?php endforeach; ?>
        </div>
    </div>
</div>