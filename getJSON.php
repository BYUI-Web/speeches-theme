<?php

if ( !isset($_REQUEST['term']))
	exit;
$term = $_REQUEST['term'];
$searchSuggestions = file_get_contents("http://search.byui.edu/suggest?site=default_collection&client=byui_frontend&access=p&max_matches=8&use_similar=0&token=".rawurlencode($term));
echo $searchSuggestions;
?>