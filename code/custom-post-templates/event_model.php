<?php

/* * ******************************************* */
/* * ********* Test to see if Post already occured ********** */
/* * ********* Takes Post ID as a parameter ********** */
/* * ********* Returns True || False; ********** */
/* * ******************************************* */

function postTimeStatus($post_id) {
	date_default_timezone_set('America/Denver');
	$now = strtotime('now');
	$post_start_time = get_post_meta($post_id, 'event_date');
	$post_end_time = get_post_meta($post_id, 'event_end_time');
    
	if ($now > $post_end_time[0]) {
		return 'past';
	} elseif ($now > $post_start_time) {
		return 'current';
	} else {
		return 'future';
	}
}

/* * *********************************************************** */
/* * ********* Gets posts by speaker of a post********** */
/* * ********* Takes Post ID as a parameter ********** */
/* * ********* Returns Array of 2 posts || "No Posts Found"; ********** */
/* * ********************************************************* */

function getPostsBySpeaker($speaker_id, $current_speech_id = -1) {
    $posts = array();

    $args = array(
        'post_type' => array('devotional','forum'),
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        "post__not_in" => array(intval($current_speech_id)),
        'meta_query' => array(
            array(
                'key' => 'presenters',
                'value' => $speaker_id,
                'compare' => 'IN'
            )                   
        )
    );
    $loop = new WP_Query($args);
    
    while ($loop->have_posts()) {
        $loop->the_post();
        $post = get_post();        
        array_push($posts, get_post());
    }
    
    if (count($posts) > 0) {
        return $posts;
    } else {
        return false;
    }
    
}

/* * *********************************************************** */
/* * ********* Gets posts by topics of a post********** */
/* * ********* Takes Post ID as a parameter ********** */
/* * ********* Returns Array of 2 posts || "No Posts Found"; ********** */
/* * ********************************************************* */

function getPostsByTopic($post_id) {
	$current_post_tags = get_the_tags($post_id);
    $posts = false;
    
    if ($current_post_tags) { 
        $tags = array_map(function($tag) {
            return $tag->name . ",";
        }, $current_post_tags);
        
        $args = array(
            "post_type" => array("devotional", "forum"),
            "meta_key" => "event_date",
            "orderby" => "meta_value_num",
            "order" => "asc",
            "posts_per_page" => 3,
            "tags" => $tags,
            "post__not_in" => array(intval($post_id))
        );
        $posts = get_posts($args); 
    }
    
	return $posts;
}

/* * *********************************************************** */
/* * ********* Gets 3 months worth of posts ********** */
/* * ********* Takes strtotime() version of time ********** */
/* * ******** Returns 3 months from the beginning of the current month ************ */
/* * ********************************************************* */

function getCalendar($now) {
	$first_month = date('F', $now);
	$second_month = date('F', strtotime('+1 month'));
	$third_month = date('F', strtotime('+2 months'));
	$posts = array($first_month => array(),
		$second_month => array(),
		$third_month => array());
	$args = array(
		'post_type' => array('devotional','forum'),
		'meta_key' => 'event_date',
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		'meta_query' => array(
			array(
				'key' => 'event_date',
				'value' => $now,
				'compare' => '>',
				'type' => 'NUMERIC'
				)                   
			),
		);
	$loop = new WP_Query( $args );
	if ($loop->have_posts()) {
		while ($loop->have_posts()) {
			$loop->the_post();
			$post_date = get_post_meta(get_the_ID(), 'event_date');
			$post_month = date('F', $post_date[0]);
			if ($post_month == $first_month) {
				array_push($posts[$first_month], array( 'id'=>get_the_ID(), 'post_type' => get_post_type() ));
			} elseif ($post_month == $second_month) {
				array_push($posts[$second_month], array( 'id'=>get_the_ID(), 'post_type' => get_post_type() ));
			} elseif ($post_month == $third_month) {
				array_push($posts[$third_month], array( 'id'=>get_the_ID(), 'post_type' => get_post_type() ));
			}
		}
	}
	return $posts;
}

/* * *********************************************************** */
/* * ********* Gets $post_count worth of posts ********** */
/* * ******** Returns $post_count posts in order of fastest occuring ************ */
/* * ********************************************************* */
function getUpcoming($post_type, $post_count = 'all') {
	$upcoming_posts = array();
	$now = strtotime('now');
	$args = array(
		'post_type' => $post_type,
		'meta_key' => 'event_date',
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		'meta_query' => array(
			array(
				'key' => 'event_date',
				'value' => $now,
				'compare' => '>',
				'type' => 'NUMERIC'
				)                   
			),
		); 
	$loop = new WP_Query( $args );
	$counter = 0;
	if ($loop->have_posts()) {
		while ($loop->have_posts()) { 
			$loop->the_post();
			if ( array_push($upcoming_posts, get_the_ID()) )
				$counter++;
			if ($post_count != 'all')
				if ($counter == $post_count)
					break;
        }
    }
    return $upcoming_posts;
}

function getUpcomingNaturalTiming($speech) {
    $time = $speech->event_date;
    $string = "";
    
    //first check if it is this week
    if ($time < strtotime("sunday")) {
        $string = "This Week";
    } else if ($time < strtotime("sunday next week")) {
        $string = "Next Week";
    } else if ($time < strtotime("last day of")) {
        $string = "This Month";
    } else if ($time < strtotime("last day of next month")) {
        $string = "Next Month";
    } else {
        $string = "This Semester";
    }
    
    return $string;
    
}

	/* * *********************************************************** */
	/* * ********* Gets $post_count worth of posts ********** */
	/* * ******** Returns $post_count posts in order of most recent ************ */
	/* * ********************************************************* */
	function getRecent($post_count, $post_type) {
		$upcoming_posts = array();
		$now = strtotime('now');
		$args = array(
			'post_type' => $post_type,
			'meta_key' => 'event_date',
			'orderby' => 'meta_value_num',
			'order' => 'ASC',
			'meta_query' => array(
				array(
					'key' => 'event_date',
					'value' => $now,
					'compare' => '<',
					'type' => 'NUMERIC'
					)
				),
			); 
		$loop = new WP_Query( $args );
		$counter = 0;
		if ($loop->have_posts()) {
			while ($loop->have_posts()) { 
				$loop->the_post();
				if ( array_push($upcoming_posts, get_the_ID()) )
					$counter++;
				if ($counter == $post_count)
					break;
			}
		}
		return $upcoming_posts;
	}



	/* * ******************************************* */
	/* * ********* Gets Post Speaker/Speakers ********** */
	/* * ********* If second param true returns *********** */
	/* * ********* Array of speakers otherwise  ********** */
	/* * ********* just first speaker ********** */
	/* * ******************************************* */
	function getSpeaker($post_id, $returnAll = false) {
		$speakers;
		$speaker_id = get_post_meta($post_id, 'presenters', true);
		if ($speaker_id) {
			$speakers = explode(', ', $speaker_id);
		}
		if ($returnAll && $speakers) {
			$speaker_names = array();
			foreach ($speakers as $indv_speaker) {
				array_push($speaker_names, get_the_title($indv_speaker));
			}
			return $speaker_names;
		}
		return get_the_title($speaker_id);
	}

	/* * ******************************************* */
	/* * ********* Gets Post Speaker/Speakers ********** */
	/* * ********* If second param true returns *********** */
	/* * ********* Array of speakers otherwise  ********** */
	/* * ********* just first speaker ********** */
	/* * ******************************************* */

	function getSpeakerTitle($post_id, $returnAll = false) {
		$speakers;
		$speaker_id = get_post_meta($post_id, 'presenters', true);
		if ($speaker_id) {
			$speakers = explode(', ', $speaker_id);
		}
		if ($returnAll && $speakers) {
			$speaker_names = array();
			foreach ($speakers as $indv_speaker) {
				array_push($speaker_names, get_the_title($indv_speaker));
			}
			return $speaker_names;
		}
		$speaker_title = get_post_meta($speaker_id, 'title', true);
		return $speaker_title;
	}

	/* * ******************************************* */
	/* * ********* Gets Post Speaker/Speakers ********** */
	/* * ********* If second param true returns *********** */
	/* * ********* Array of speakers otherwise  ********** */
	/* * ********* just first speaker ********** */
	/* * ******************************************* */
	function getSpeakerBio($post_id) {
		$speaker_id = get_post_meta($post_id, 'speaker_bio');
		if ($speaker_id) {
			$speakers = explode(', ', $speaker_id);
		}
		if ($returnAll && $speakers) {
			$speaker_names = array();
			foreach ($speakers as $indv_speaker) {
				array_push($speaker_names, get_the_title($indv_speaker));
			}
			return $speaker_names;
		}
		$speaker_title = get_post_meta($speaker_id[0], 'title');
		return $speaker_title[0];
	}

	/* * ******************************************* */
	/* * ********* Gets The Post Time ********** */
	/* * ********* Formatted for output ********** */
	/* * ******************************************* */
	function getPostTime($post_id) {
		$post_date = get_post_meta($post_id, 'event_date', true);
		return date('l, F jS, Y \a\t g:i A', $post_date);
	}

	/* * ******************************************* */
	/* * ********* Gets The Post Time ********** */
	/* * ********* Formatted for output ********** */
	/* * ******************************************* */
	function getShortDate($post_id) {
		$post_date = get_post_meta($post_id, 'event_date', true);
		return date('M d', $post_date);
	}


	/* * ******************************************* */
	/* * ********* Gets The Post Location ********** */
	/* * ********* return for output ********** */
	/* * ******************************************* */
	function getEventLocation($post_id) {
		$location = get_post_meta($post_id, 'event_location');
		return $location[0];
	}
	?>