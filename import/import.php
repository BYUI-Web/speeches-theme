<?php

require_once '../wp-load.php';
require_once 'html-parser.php';

$speeches = json_decode(str_replace(["/11602882", "/18191252"], "", file_get_contents("speeches.json")));
$numSpeeches = count($speeches);
$forward = false;

if ($argv[1] === "forward") {
    $forward = true;
    $numSpeeches = 100;
}

for ($i = 0; $i < $numSpeeches; $i++) {
    //only if it's a devotional or forum
    if ($speeches[$i]->type === "Devotionals" || $speeches[$i]->type === "University Forums") {
        //insert the speaker
        $speaker_id = insertSpeaker($speeches[$i]);

        //insert the speech
        $post_id = insertSpeech($speeches[$i], $speaker_id);
    }
}

function insertSpeaker($data) {
    $post_id = get_page_by_title(trim($data->speakerName), "OBJECT", "speaker");

    if ($post_id === NULL) {
        $speaker = array(
            "post_title" => trim($data->speakerName),
            "post_status" => "publish",
            "post_content" => "",
            "post_type" => "speaker"
        );

        $post_id = wp_insert_post($speaker);

        update_post_meta($post_id, "title", trim($data->speakerPosition));
        
        echo "Inserted: " . $post_id . " " . trim($data->speakerName) . "\n";
    }
    
    return $post_id;
}

function insertSpeech($data, $speaker_id) {
    global $forward;
    
    $speech = array(
        "post_title" => $data->name,
        "post_status" => "publish",
        "post_content" => ""
    );
    
    if ($data->type === "Devotionals") {
        $speech["post_type"] = "devotional";
    } else if ($data->type === "University Forums") {
        $speech["post_type"] = "forum";
    }

    $post_id = wp_insert_post($speech);
    
    
    //event date
    $inFuture = false;
    if ($forward) {
        $date = date_create($data->date);
        date_add($date, date_interval_create_from_date_string('3 months'));
        $dateTime = strtotime(date_format($date, "Y-m-d") . " 2:00 PM");
        $dateEndTime = strtotime(date_format($date, "Y-m-d") . " 3:00 PM");
        update_post_meta($post_id, "event_date", $dateTime);
        update_post_meta($post_id, "event_end_time", $dateEndTime);
        $inFuture = (time() < $dateTime);
    } else {
        update_post_meta($post_id, "event_date", strtotime($data->date . " 2:00 PM"));
        update_post_meta($post_id, "event_end_time", strtotime($data->date . " 3:00 PM"));
    }
    

    //audio
    if (isset($data->mp3Path) && !$inFuture) {
        update_post_meta($post_id, "audio_embed", "<audio src='" . $data->mp3Path . "' controls='true'></audio>");
        update_post_meta($post_id, "audio_status", "yes");
    } else {
        update_post_meta($post_id, "audio_status", "not_yet");
    }
    
    //video
    if (isset($data->videoPath) && !$inFuture) {
        update_post_meta($post_id, "video_embed", getVideoEmbed($data->videoPath));
        update_post_meta($post_id, "video_status", "yes");
    } else {
        update_post_meta($post_id, "video_status", "not_yet");
    }
    
    //transcript
    if ($data->transcriptPath && !$inFuture) {
        $transcript = getTranscript($data->transcriptPath);
        if ($transcript !== false) {
            update_post_meta($post_id, "transcript", $transcript);
            update_post_meta($post_id, "transcript_status", "yes");
        } else {
            update_post_meta($post_id, "transcript_status", "not_yet");
        }
    } else {
        update_post_meta($post_id, "transcript_status", "not_yet");
    }
    
    //speaker
    update_post_meta($post_id, "presenters", $speaker_id);
    
    //live stream
    update_post_meta($post_id, "live_stream", "no");
    
    echo "Inserted: " . $post_id . " " . $data->name . "\n";
    
    return $post_id;

}

function getVideoEmbed($video) {
    $split = explode("/", $video);
    
    $entryId = $split[count($split) - 1];
    
    return '<iframe id="kaltura_player" src="http://cdnapisec.kaltura.com/p/1157612/sp/115761200/embedIframeJs/uiconf_id/16585652/partner_id/1157612?iframeembed=true&playerId=kaltura_player&entry_id=' . $entryId . '&flashvars[mediaProtocol]=rtmp&flashvars[streamerType]=rtmp&flashvars[streamerUrl]=rtmp://www.kaltura.com:1935&flashvars[rtmpFlavors]=1&&wid=0_hnyb7uqr" width="400" height="285" allowfullscreen webkitallowfullscreen mozAllowFullScreen frameborder="0"></iframe>';
}

function getTranscript($url) {
    $html = @file_get_html($url);    
    
    if ($html !== false) {
        $children = $html->find(".leftAREA", 0)->children();
        $children = array_slice($children, 6);
        $html = "";
        $numChildren = count($children);
        for ($i = 0; $i < $numChildren; $i++) {
            $html .= $children[$i]->outertext;
        }
    }
    
    $html = str_replace("<p>&nbsp;</p>", "", $html);
    
    return $html;
}

?>