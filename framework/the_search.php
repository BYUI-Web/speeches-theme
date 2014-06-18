<?php 

//Created to handle development of the more robust search.
$is_JSON = htmlspecialchars($_GET["json"]);
$search_all = htmlspecialchars($_GET["all"]);
$keyword = htmlspecialchars($_GET["qry"]);
$search_what = array();

if ($search_all) {
    $search_what = array("devotional", "forum", "other", "speaker");
} else {
  $search_what = $_GET['type'];

  for ($i = 0; $i < count($search_what); $i++) { 
    $search_what[$i] = htmlspecialchars($search_what[$i]);
  }
}


$args = array(
    "post_type" => $search_what, 
    's' => $keyword,
    "orderby" => "views", 
    'meta_key' => 'pageviews',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'posts_per_page' => 12
); 

// the query
$the_query = new WP_Query( $args );


if ($is_JSON) {
$results = array();

// The Loop
if ( $the_query->have_posts() ) {
  while ( $the_query->have_posts() ) {
    $the_query->the_post();
    $new_obj = (object)array(
      'postTitle' => the_title('','',false),
      'postType' => get_post_type(),
      'link' => get_permalink(),
      );
    array_push($results, $new_obj);
  }
}
/* Restore original Post Data */
wp_reset_postdata();

$json = json_encode($results);
echo $json;
}
?>
