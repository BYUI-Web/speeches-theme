<?php

function admin_dependencies() {
    echo '<link rel="stylesheet" href="' . get_bloginfo('template_url') . '/framework/css/token-input.css">';
}

add_action('admin_head', 'admin_dependencies');

function my_admin_footer_function() {
    echo '<script src="' . get_bloginfo('template_url') . '/framework/js/speechesjs.min.js"></script>';
}

add_action('admin_footer', 'my_admin_footer_function');

function my_head_function() {
    echo '<script src="' . get_bloginfo('template_url') . '/framework/js/mediaDisplay.js"></script>';
}

add_action('wp_head', 'my_head_function');


function add_menu_icons_styles(){
echo '<style>
#adminmenu .menu-icon-devotional div.wp-menu-image:before {
  content: "\f330";
}

#adminmenu .menu-icon-forum div.wp-menu-image:before {
  content: "\f473";
}

#adminmenu .menu-icon-speaker div.wp-menu-image:before {
  content: "\f338";
}

</style>';
}
add_action( 'admin_head', 'add_menu_icons_styles' );
/* * ******************************************* */
/* * *** Register Events Post Types **** */
/* * ******************************************* */

function register_devotionals_posttype() {
    register_post_type('devotional', array(
        'labels' => array(
            'name' => __('Devotionals'),
            'singular_name' => __('Devotional'),
            'add_new' => __('Add New Devotional'),
            'add_new_item' => __('Add New Devotional'),
            'edit_item' => __('Edit Devotional'),
            'new_item' => __('Add New Devotional'),
            'view_item' => __('View Devotional'),
            'search_items' => __('Search Devotionals'),
            'not_found' => __('No Devotionals found')
            ),
        'has_archive' => true,
        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'menu_icon' => '',
        'supports' => array('title', 'thumbnail', 'revisions'),
        'rewrite' => array("slug" => "devotionals", 'with_front' => true, "comments"), // Permalinks format
        'menu_position' => 5,
        'register_meta_box_cb' => 'add_devotional_metaboxes'
        )
    );
    flush_rewrite_rules(false);
}

add_action('init', 'register_devotionals_posttype');

function register_forums_posttype() {
    register_post_type('forum', array(
        'labels' => array(
            'name' => __('Forums'),
            'singular_name' => __('Forum'),
            'add_new' => __('Add New Forum'),
            'add_new_item' => __('Add New Forum'),
            'edit_item' => __('Edit Forum'),
            'new_item' => __('Add New Forum'),
            'view_item' => __('View Forum'),
            'search_items' => __('Search Forums'),
            'not_found' => __('No Forums found')
            ),
        'has_archive' => true,
        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'menu_icon' => '',
        'supports' => array('title', 'thumbnail', 'revisions'),
        'rewrite' => array("slug" => "forums", 'with_front' => true), // Permalinks format
        'menu_position' => 5,
        'register_meta_box_cb' => 'add_forum_metaboxes'
        )
    );
    flush_rewrite_rules(false);
}

add_action('init', 'register_forums_posttype');

/* * ******************************************* */
/* * ****** Register Speakers Post Types ******* */
/* * ******************************************* */

function register_speakers_posttype() {
    register_post_type('speaker', array(
        'labels' => array(
            'name' => __('Speakers'),
            'singular_name' => __('Speaker'),
            'add_new' => __('Add New Speaker'),
            'add_new_item' => __('Add New Speaker'),
            'edit_item' => __('Edit Speaker'),
            'new_item' => __('Add New Speaker'),
            'view_item' => __('View Speaker'),
            'search_items' => __('Search Speakers'),
            'not_found' => __('No Speakers found')
            ),
        'has_archive' => true,
        'taxonomies' => array('category'),
        'public' => true,
        'menu_icon' => '',
        'supports' => array('title', 'thumbnail', 'revisions'),
        'rewrite' => array("slug" => "speaker", 'with_front' => true), // Permalinks format
        'menu_position' => 5,
        'register_meta_box_cb' => 'add_speakers_metaboxes'
        )
    );
    flush_rewrite_rules(false);
}

add_action('init', 'register_speakers_posttype');

/* * ******************************************* */
/* * ********* Post Thumbnail Support ********** */
/* * ******************************************* */

function create_post_pub() {
    add_theme_support('post-thumbnails', array('speaker', 'publicidade', 'devotional', 'forum'));
    add_theme_support('thumbnail', array('speaker', 'publicidade', 'devotional', 'forum'));
}

add_action('init', 'create_post_pub');
/* * ********************************************** */
/* * ********     devotional Meta     ******** */
/* * ********************************************** */

// Add the devotional Meta Boxes
function add_forum_metaboxes() {
    add_meta_box('forum_metaboxes', 'Forum Information', 'forum_metaboxes', 'forum', 'normal', 'default');
}

function add_devotional_metaboxes() {
    add_meta_box('devotional_metaboxes', 'Devotional Information', 'devotional_metaboxes', 'devotional', 'normal', 'default');
}

function add_speakers_metaboxes() {
    add_meta_box('speakers_metaboxes', 'Speaker Information', 'speakers_metaboxes', 'speaker', 'normal', 'default');
}

// The Event Location Metabox
function speakers_metaboxes() {
    global $post;

    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="speaker_nonce" id="speaker_nonce" value="' .
    wp_create_nonce(plugin_basename(__FILE__)) . '" />';

    // Get the location data if its already been entered
    $title = get_post_meta($post->ID, 'title', true);
    $speaker_bio = get_post_meta($post->ID, 'speaker_bio', true);
    $facebook = get_post_meta($post->ID, 'facebook', true);
    $twitter = get_post_meta($post->ID, 'twitter', true);
    $google_plus = get_post_meta($post->ID, 'google_plus', true);
    $website = get_post_meta($post->ID, 'website', true);

    // Echo out the field
    echo '<p>Speaker Title and Department (if relevant): </p>';
    echo '<input type="text" name="title" class="widefat" value="' . $title . '">';
    echo '<p>Speaker Bio: </p>';
    echo '<textarea name="speaker_bio" rows="10" class="widefat">' . $speaker_bio . '</textarea>';
    echo '<h2>Social Media</h2>';
    echo '<p>Facebook</p>';
    echo '<input type="text" name="facebook" class="widefat" value="' . $facebook . '"/>';
    echo '<p>Twitter</p>';
    echo '<input type="text" name="twitter" class="widefat" value="' . $twitter . '"/>';
    echo '<p>Google+</p>';
    echo '<input type="text" name="google_plus" class="widefat" value="' . $google_plus . '"/>';
    echo '<p>Website</p>';
    echo '<input type="text" name="website" class="widefat" value="' . $website . '"/>';
    
}

// The Event Location Metabox
function devotional_metaboxes() {

    date_default_timezone_set("America/Denver");
    
    global $post;

    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="event_nonce" id="event_nonce" value="' .
    wp_create_nonce(plugin_basename(__FILE__)) . '" />';

    // Get the location data if its already been entered
    $video_status = get_post_meta($post->ID, 'video_status', true);
    $video_embed = get_post_meta($post->ID, 'video_embed', true);
    $video_download = get_post_meta($post->ID, 'video_download', true);
    $audio_status = get_post_meta($post->ID, 'audio_status', true);
    $audio_embed = get_post_meta($post->ID, 'audio_embed', true);
    $audio_download = get_post_meta($post->ID, 'audio_download', true);
    $event_date = get_post_meta($post->ID, 'event_date', true);
    $prep_material = get_post_meta($post->ID, 'prep_material', true);
    $transcript_status = get_post_meta($post->ID, 'transcript_status' ,true);
    $transcript = get_post_meta($post->ID, 'transcript', true);
    $presenters = get_post_meta($post->ID, 'presenters', true);
    $event_end_time = get_post_meta($post->ID, 'event_end_time', true);
    $event_location = get_post_meta($post->ID, 'event_location', true);
    $live_stream = get_post_meta($post->ID, 'live_stream', true);
    $live_stream_embed = get_post_meta($post->ID, 'live_stream_embed', true);
    $topics = get_post_meta($post->ID, 'topics', true);

    //parse event_date to the date and the time
    $event_end_time = date('h:i A', $event_end_time);
    $event_start_time = date('h:i A', $event_date);
    $event_date = date('Y-m-d', $event_date);


    //convert event_date string into human readable format

    if ($presenters)
        $presentersArray = explode(', ', $presenters);

    echo '<script>';
    echo 'prepopulate = [];';
    if (is_array($presentersArray)) {
        foreach ($presentersArray as $person) {
            echo 'prepopulate.push({ "id" : ' . $person . ', "name" : "' . get_the_title($person) . '" });';
        }
    }
    echo 'speakers = [];';

    $loop = new WP_Query(array('post_type' => 'speaker'));
    while ($loop->have_posts()) : $loop->the_post();
    echo 'speakers.push({ "id" : ' . get_the_ID() . ', "name" : "' . get_the_title() . '" });';
    endwhile;
    echo '</script>';

    // Echo out the field
    echo '<p>Event Date:</p>';
    echo '<input type="date" name="event_date" id="event_date" value="' . $event_date . '"/>';
    echo '<p>Event Location:</p>';
    echo '<input type="text" name="event_location" id="event_location" value="' . $event_location . '"/>';
    echo '<p>Start Time:</p>';
    echo '<input type="time" name="event_start_time" id="event_start_time" value="' . $event_start_time . '"/>';
    echo '<p>End Time:</p>';
    echo '<input type="time" name="event_end_time" id="event_end_time" value="' . $event_end_time . '"/>';
    echo '<p>Live Stream:</p>';
    echo '<input type="radio" name="live_stream" id="live_stream_yes" value="yes"' . (($live_stream == "yes") ? 'checked' : '') . '/><label for="live_stream_yes">Yes </label><input type="radio" name="live_stream" id="live_stream_no" value="no" ' . (($live_stream == "no") ? 'checked' : '') . '/><label for="live_stream_no">No</label>';
    echo '<div id="live_stream"><p>Live Stream Embed Code: </p>';
    echo '<textarea rows="4" name="live_stream_embed" class="widefat">' . $live_stream_embed . '</textarea></div>';
    echo '<p>Presenters:</p>';
    echo '<input type="hidden" name="presenters" id="speaker-ids" value="' . $presenters . '"/>';
    echo '<input type="text" id="speaker-names" name="presenters_display" placeholder="Speaker Name" class="widefat"/>';
    echo '<p>Preparatory Material (seperate with commas):</p>';
    echo '<input type="text" name="prep_material" value="' . $prep_material . '" class="widefat" />';
    echo '<p>Topics (seperate with commas):</p>';
    echo '<input type="text" name="topics" value="' . $topics . '" class="widefat" />';
    echo '<p>Video</p>';
    echo '<input type="radio" name="video_status" value="yes" id="video_status_yes"' . (($video_status == "yes") ? 'checked' : '') . '/><label for="video_status_yes">Yes </label><input type="radio" name="video_status" value="not_yet" id="video_status_not_yet" value="not_yet" ' . (($video_status == "not_yet" || $video_status == "") ? 'checked' : '') . '/><label for="video_status_not_yet">Not Yet </label><input type="radio" name="video_status" id="video_status_never" value="never"' . (($video_status == "never") ? 'checked' : '') . '/><label for="video_status_never">Never </label>';
    echo '<div id="video_media"><p>Video Embed Code: </p>';
    echo '<textarea rows="4" name="video_embed" class="widefat">' . $video_embed . '</textarea>';
    echo '<p>Video Download URL: </p>';
    echo '<input type="text" name="video_download" value="' . $video_download . '" class="widefat" /></div>';
    echo '<p>Audio</p>';
    echo '<input type="radio" name="audio_status" value="yes" id="audio_status_yes"' . (($audio_status == "yes") ? 'checked' : '') . '/><label for="audio_status_yes">Yes </label><input type="radio" name="audio_status" value="not_yet" id="audio_status_not_yet" value="not_yet" ' . (($audio_status == "not_yet" || $audio_status == "") ? 'checked' : '') . '/><label for="audio_status_not_yet">Not Yet </label><input type="radio" name="audio_status" id="audio_status_never" value="never"' . (($audio_status == "never") ? 'checked' : '') . '/><label for="audio_status_never">Never </label>';
    echo '<div id="audio_media"><p>Audio Embed Code: </p>';
    echo '<textarea rows="4" name="audio_embed" class="widefat">' . $audio_embed . '</textarea>';
    echo '<p>Audio Download URL: </p>';
    echo '<input type="text" name="audio_download" value="' . $audio_download . '" class="widefat" /></div>';
    echo '<p>Transcript</p>';
    echo '<input type="radio" name="transcript_status" value="yes" id="transcript_status_yes"' . (($transcript_status == "yes") ? 'checked' : '') . '/><label for="transcript_status_yes">Yes </label><input type="radio" name="transcript_status" value="not_yet" id="transcript_status_not_yet" value="not_yet" ' . (($transcript_status == "not_yet" || $transcript_status == "not_yet") ? 'checked' : '') . '/><label for="transcript_status_not_yet">Not Yet </label><input type="radio" name="transcript_status" id="transcript_status_never" value="never"' . (($transcript_status == "never") ? 'checked' : '') . '/><label for="transcript_status_never">Never </label>';
    echo '<div id="transcript"><p>Transcript: </p>';
    echo '<textarea rows="10" name="transcript" class="widefat">' . $transcript . '</textarea></div>';
}

function forum_metaboxes() {
    global $post;

    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="event_nonce" id="event_nonce" value="' .
    wp_create_nonce(plugin_basename(__FILE__)) . '" />';

    // Get the location data if its already been entered
    $video_embed = get_post_meta($post->ID, 'video_embed', true);
    $video_download = get_post_meta($post->ID, 'video_download', true);
    $audio_embed = get_post_meta($post->ID, 'audio_embed', true);
    $audio_download = get_post_meta($post->ID, 'audio_download', true);
    $event_date = get_post_meta($post->ID, 'event_date', true);
    $prep_material = get_post_meta($post->ID, 'prep_material', true);
    $transcript = get_post_meta($post->ID, 'transcript', true);
    $presenters = get_post_meta($post->ID, 'presenters', true);
    $event_start_time = get_post_meta($post->ID, 'event_start_time', true);
    $event_end_time = get_post_meta($post->ID, 'event_end_time', true);
    $event_location = get_post_meta($post->ID, 'event_location', true);
    $live_stream_embed = get_post_meta($post->ID, 'live_stream_embed', true);
    $topics = get_post_meta($post->ID, 'topics', true);
    if ($presenters)
        $presentersArray = explode(', ', $presenters);

    echo '<script>';
    echo 'prepopulate = [];';
    if (is_array($presentersArray)) {
        foreach ($presentersArray as $person) {
            echo 'prepopulate.push({ "id" : ' . $person . ', "name" : "' . get_the_title($person) . '" });';
        }
    }
    echo 'speakers = [];';

    $loop = new WP_Query(array('post_type' => 'speaker'));
    while ($loop->have_posts()) : $loop->the_post();
    echo 'speakers.push({ "id" : ' . get_the_ID() . ', "name" : "' . get_the_title() . '" });';
    endwhile;
    echo '</script>';

    // Echo out the field
    echo '<p>Event Date:</p>';
    echo '<input type="date" name="event_date" id="event_date" value="' . $event_date . '"/>';
    echo '<p>Event Location:</p>';
    echo '<input type="text" name="event_location" id="event_location" value="' . $event_location . '"/>';
    echo '<p>Start Time:</p>';
    echo '<input type="time" name="event_start_time" id="event_start_time" value="' . $event_start_time . '"/>';
    echo '<p>End Time:</p>';
    echo '<input type="time" name="event_end_time" id="event_end_time" value="' . $event_end_time . '"/>';
    echo '<p>Live Stream:</p>';
    echo '<input type="radio" name="live_stream" id="live_stream_yes" value="yes"/><label for="live_stream_yes">Yes </label><input type="radio" name="live_stream" id="live_stream_no" value="no" checked/><label for="live_stream_no">No</label>';
    echo '<div id="live_stream"><p>Live Stream Embed Code: </p>';
    echo '<textarea rows="4" name="live_stream_embed" class="widefat">' . $live_stream_embed . '</textarea></div>';
    echo '<p>Presenters:</p>';
    echo '<input type="hidden" name="presenters" id="speaker-ids" value="' . $presenters . '"/>';
    echo '<input type="text" id="speaker-names" name="presenters_display" placeholder="Speaker Name" class="widefat"/>';
    echo '<p>Preparatory Material (seperate with commas):</p>';
    echo '<input type="text" name="prep_material" value="' . $prep_material . '" class="widefat" />';
    echo '<p>Topics (seperate with commas):</p>';
    echo '<input type="text" name="topics" value="' . $topics . '" class="widefat" />';
    echo '<p>Video Embed Code: </p>';
    echo '<textarea rows="4" name="video_embed" class="widefat">' . $video_embed . '</textarea>';
    echo '<p>Video Download URL: </p>';
    echo '<input type="text" name="video_download" value="' . $video_download . '" class="widefat" />';
    echo '<p>Audio Embed Code: </p>';
    echo '<textarea rows="4" name="audio_embed" class="widefat">' . $audio_embed . '</textarea>';
    echo '<p>Audio Download URL: </p>';
    echo '<input type="text" name="audio_download" value="' . $audio_download . '" class="widefat" />';
    echo '<p>Transcript: </p>';
    echo '<textarea rows="10" name="transcript" class="widefat">' . $transcript . '</textarea>';
}

// Save the Metabox Data
function save_speaker_meta($post_id, $post) {
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if (!wp_verify_nonce($_POST['speaker_nonce'], plugin_basename(__FILE__))) {
        return $post->ID;
    }
    // Is the user allowed to edit the post or page?
    if (!current_user_can('edit_post', $post->ID))
        return $post->ID;
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
    $speaker_meta['title'] = $_POST['title'];
    $speaker_meta['speaker_bio'] = $_POST['speaker_bio'];
    $speaker_meta['facebook'] = $_POST['facebook'];
    $speaker_meta['twitter'] = $_POST['twitter'];
    $speaker_meta['google_plus'] = $_POST['google_plus'];
    $speaker_meta['website'] = $_POST['website'];
    $speaker_meta['first_name'] = '';

    $name = explode(' ', $post->title);
    for ($i = 0; $i < (count($name) - 1); $i++) {
        $speaker_meta['first_name'] += $name[$i];
    }
    $speaker_meta['last_name'] = $name[count($name)-1];

    // Add values of $speaker_meta as custom fields
    foreach ($speaker_meta as $key => $value) {
        if ($post->post_type == 'revision')
            return;

        // If $value is an array, make it a CSV (unlikely)
        $value = implode(',', (array) $value);

        // If the custom field already has a value
        if (get_post_meta($post->ID, $key, FALSE)) {
            update_post_meta($post->ID, $key, $value);
        } else {
            // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        // Delete if blank
        if (!$value)
            delete_post_meta($post->ID, $key);
    }

}

add_action('save_post', 'save_speaker_meta', 1, 2); // save the custom fields
// Save the Metabox Data
function save_event_meta($post_id, $post) {
    date_default_timezone_set("America/Denver");
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if (!wp_verify_nonce($_POST['event_nonce'], plugin_basename(__FILE__))) {
        return $post->ID;
    }
    // Is the user allowed to edit the post or page?
    if (!current_user_can('edit_post', $post->ID))
        return $post->ID;
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
    $devotional_meta['video_embed'] = $_POST['video_embed'];
    $devotional_meta['video_download'] = $_POST['video_download'];
    $devotional_meta['audio_embed'] = $_POST['audio_embed'];
    $devotional_meta['audio_download'] = $_POST['audio_download'];
    $devotional_meta['event_date'] = $_POST['event_date'] . " " . $_POST['event_start_time'];
    $devotional_meta['prep_material'] = $_POST['prep_material'];
    $devotional_meta['transcript'] = $_POST['transcript'];
    $devotional_meta['presenters'] = $_POST['presenters'];
    $devotional_meta['event_end_time'] = $_POST['event_date'] . " " . $_POST['event_end_time'];
    $devotional_meta['live_stream'] = $_POST['live_stream'];
    $devotional_meta['live_stream_embed'] = '
<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
<object id="myExperience2470803181001" class="BrightcoveExperience">
  <param name="bgcolor" value="#FFFFFF" />
  <param name="width" value="480" />
  <param name="height" value="270" />
  <param name="playerID" value="1956072169001" />
  <param name="playerKey" value="AQ~~,AAABCveqfDE~,4WT0xjonGphZPc7bcpuNwtSB7lo4cJKZ" />
  <param name="isVid" value="true" />
  <param name="isUI" value="true" />
  <param name="dynamicStreaming" value="true" />
  <param name="@videoPlayer" value="2470803181001" />
</object>
<script type="text/javascript">brightcove.createExperiences();</script>
';
    $devotional_meta['event_location'] = $_POST['event_location'];
    $devotional_meta['topics'] = $_POST['topics'];
    $devotional_meta['video_status'] = $_POST['video_status'];
    $devotional_meta['audio_status'] = $_POST['audio_status'];
    $devotional_meta['transcript_status'] = $_POST['transcript_status'];

    //convert event_date meta tag to unix time stamp
    $devotional_meta['event_date'] = strtotime($devotional_meta['event_date']);
    $devotional_meta['event_end_time'] = strtotime($devotional_meta['event_end_time']);

    // Add values of $devotional_meta as custom fields
    foreach ($devotional_meta as $key => $value) {
        if ($post->post_type == 'revision')
            return;

        // If $value is an array, make it a CSV (unlikely)
        $value = implode(',', (array) $value);

        // If the custom field already has a value
        if (get_post_meta($post->ID, $key, FALSE)) {
            if ($key != 'video_embed' && $key != 'audio_embed' && $key != 'live_stream_embed')
                update_post_meta($post->ID, $key, $value);
            else
                update_post_meta($post->ID, $key, wpdb::prepare($value));
        } else {
            // If the custom field doesn't have a value
            if ($key != 'video_embed' && $key != 'audio_embed' && $key != 'live_stream_embed')
                add_post_meta($post->ID, $key, $value);
            else
                add_post_meta($post->ID, $key, wpdb::prepare($value));
        }
        // Delete if blank
        if (!$value)
            delete_post_meta($post->ID, $key);
    }
    // Save Tags
    wp_set_post_tags($post->ID, $devotional_meta['topics']);
    $posttags = get_the_tags();
    if ($posttags) {
      foreach($posttags as $tag) {
        echo $tag->name . ' '; 
    }
}
}

add_action('save_post', 'save_event_meta', 1, 2); // save the custom fields

function get_custom_event_template($single_template) {
    global $post;

    if ($post->post_type == 'devotional' || $post->post_type == 'forum') {
        $pageviews = get_post_meta($post->ID, 'pageviews', true);
        if ( $pageviews ) {
            $pageviews++;
            update_post_meta($post->ID, 'pageviews', $pageviews);
        } else {
            add_post_meta($post->ID, 'pageviews', 1);
        }
        $single_template = dirname(__FILE__) . '/event_template.php';
    }
    return $single_template;
}

add_filter('single_template', 'get_custom_event_template');

function get_custom_speaker_template($single_template) {
    global $post;

    if ($post->post_type == 'speaker') {
        $single_template = dirname(__FILE__) . '/speaker_template.php';
    }
    return $single_template;
}

add_filter('single_template', 'get_custom_speaker_template');

function get_custom_post_type_template($archive_template) {
    global $post;

    if (is_post_type_archive('devotional') || is_post_type_archive('forum')) {
        $archive_template = dirname(__FILE__) . '/event_home.php';
    }
    return $archive_template;
}

add_filter('archive_template', 'get_custom_post_type_template');



function add_custom_post_types_to_loop($query) {
    if (is_home() && $query->is_main_query())
        $query->set('post_type', array('post', 'page', 'devotional', 'speaker', 'forum'));
    return $query;
}

// Show posts of 'post', 'page' and 'movie' post types on home page
add_action('pre_get_posts', 'add_custom_post_types_to_loop');

function events_rss( $for_comments ) {
    $rss_template = dirname(__FILE__) . '/rss_template.php';
    if(  file_exists( $rss_template ) )
        load_template( $rss_template );
    else
        do_feed_rss2( $for_comments ); // Call default function
}
remove_all_actions( 'do_feed_rss2' );
add_action( 'do_feed_rss2', 'events_rss', 10, 1 );

function indv_pages() {
    global $wp;
    $plugindir = dirname( __FILE__ );

   //A Simple Page
    if ($wp->query_vars["pagename"] == 'calendar') {
        $templatefilename = 'event_calendar.php';
        if (file_exists(TEMPLATEPATH . '/' . $templatefilename)) {
            $return_template = TEMPLATEPATH . '/' . $templatefilename;
        } else {
            $return_template = $plugindir . '/' . $templatefilename;
        }
        do_theme_redirect($return_template);
    }
    if ($wp->query_vars["pagename"] == 'archive') {
        $templatefilename = 'event_archive.php';
        if (file_exists(TEMPLATEPATH . '/' . $templatefilename)) {
            $return_template = TEMPLATEPATH . '/' . $templatefilename;
        } else {
            $return_template = $plugindir . '/' . $templatefilename;
        }
        do_theme_redirect($return_template);
    }
    if ($wp->query_vars["pagename"] == 'search') {
        $templatefilename = 'search.php';
        if (file_exists(TEMPLATEPATH . '/' . $templatefilename)) {
            $return_template = TEMPLATEPATH . '/' . $templatefilename;
        } else {
            $return_template = $plugindir . '/' . $templatefilename;
        }
        do_theme_redirect($return_template);
    }
}

add_action("template_redirect", 'indv_pages');

function do_theme_redirect($url) {
    global $post, $wp_query;
    if (have_posts()) {
        include($url);
        die();
    } else {
        $wp_query->is_404 = true;
    }
}

// Page Views Reset. Reset Every Two Weeks
if ( ! wp_next_scheduled( 'pageviews_reset' ) ) {
  wp_schedule_event( time(), 'hourly', 'pageviews_reset' );
}

add_action( 'pageviews_reset', 'reset_pageviews' );

function reset_pageviews() {
    $loop = new WP_Query( 
        array( 'post_type' => array('devotional' , 'forum'), 
            'posts_per_page' => -1 ) );
    while ( $loop->have_posts() ) { 
       $loop->the_post(); 
       update_post_meta(get_the_ID(), 'pageviews', 0);
   }
}

//Modify the placeholder text of title field for the custom post
function change_default_title( $title ){
     $screen = get_current_screen();
     switch ($screen->post_type) {
        case 'devotional':
        return 'Enter Devotional Title Here';
        case 'speaker':
        return 'Speaker\'s Full Name';
        case 'forum':
        return 'Enter Forum Title Here';
        default:
        return 'Enter Title Here';
     }
     return $title;
}

add_filter( 'enter_title_here', 'change_default_title' );


?>
