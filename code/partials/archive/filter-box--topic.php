<?php 
//get the selected topics
$selectedTopics = get_query_var("topic");
if ($selectedTopics == "") {
    $selectedTopics = array();
}

//get all of the topics
$topics = wp_get_all_tags();
?>
   

<div class="filter-box">
    <h3>TOPIC</h3>
    <div class="filters">
        <div class="flat-form-elements">
           <?php foreach($topics as $topic) : ?>
                <input type="checkbox" <?php echo (in_array($topic, $selectedTopics)) ? 'checked' : ''; ?> name="topic[]" value="<?php echo $topic; ?>" id="<?php echo $topic; ?>">
                <label for="<?php echo $topic; ?>"><?php echo $topic; ?></label>
            <?php endforeach; ?>
        </div>
    </div>
</div>