<?php
$selectedSpeakers = get_query_var("speaker");
if ($selectedSpeakers == "") {
    $selectedSpeakers = array();
}

//speakers
$speakers = get_posts(array("post_type" => "speaker", "posts_per_page" => "-1"));   
?>

<div class="filter-box">
    <h3>SPEAKER</h3>
    <div class="filters">
        <div class="flat-form-elements">
           <?php foreach($speakers as $speaker) : ?>
                <input type="checkbox" <?php echo (in_array($speaker->ID, $selectedSpeakers)) ? 'checked' : '' ?> name="speaker[]" value="<?php echo $speaker->ID; ?>" id="speaker-<?php echo $speaker->ID; ?>">
                <label for="speaker-<?php echo $speaker->ID; ?>"><?php echo $speaker->post_title; ?></label>
            <?php endforeach; ?>
        </div>
    </div>
</div>