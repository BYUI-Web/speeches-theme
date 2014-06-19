<div class="hero-feature">
	<div class="container">
		<img class="feature-image col-xs-12 col-sm-7" src="<?php bloginfo('template_url'); ?>/images/hero_placeholder.jpg">
		<div class="feature-caption col-xs-12 col-sm-5">
			<h2 class="cap-title">This Week's Devotional</h2>
			<div class="cap-desc">Bacon ipsum dolor sit amet voluptate cillum fatback culpa deserunt bresaola pork tempor pancetta ea capicola. Jerky cow short ribs ball tip adipisicing. Ut doner hamburger rump aute reprehent&nbsp;laborum.</div>
			<div class="cap-more"><a href="#">See More &gt;&gt;</a></div>
			<div class="cap-cta"><a href="#" class="cta">Join</a> <a href="#" class="cta">Join</a> <a href="#" class="cta">Join</a></div>
		</div>
	</div>
	<a class="rotate-left">&lt;</a>
	<a class="rotate-right">&gt;</a>
</div>

<div class="container content-wrap">

<form id="master-search-form" class="master-search" action="/search">
		<div class="search-icon"></div>
		<input type="text" placeholder="Search the Archive" name="qry" autocomplete="off" class="master-query" id="search-query" />
	<div class="search-dropdown">
		<div class="dd-header">Did you mean?</div>
		<div id="ajax-suggestions" class="search-suggestions">
			<a class="ajax-result not-result"><span class="suggestion-message">Start typing a search...</span></a>
		</div>
		<div class="dd-header">Additional Options:</div>
		<div class="additional-options">
			<input checked="" type="checkbox" name="type[]" value="devotional" id="devotional">
			<label class="checkbox-label" for="devotional">Search Devotionals</label>
			<input checked="" type="checkbox" name="type[]" value="forum" id="forum">
			<label class="checkbox-label" for="forum">Search University Devotionals</label>
			<input checked="" type="checkbox" name="type[]" value="other" id="other">
			<label class="checkbox-label" for="other">Search Other Speeches</label>
			<input type="hidden" name="type[]" value="speaker" id="speakers">
			<input id="submit" type="submit" value="Search" />
		</div>
	</div>
</form>
</div>

<script type="text/javascript">

var timeout;
var freshStart = true;
$(document).ready(function () {
	//On Page Load START

	$("#search-query").bind('input', function() {
		//When the user types a query
		var userQuery = $(this).val();

		//Only search for things longer than 3 chars
		if (userQuery.length > 2) {

			//Clear the default message and show 'loading' on first search.
			if (freshStart) {
				$("#ajax-suggestions").html('<a class="ajax-result not-result"><span class="suggestion-message">Loading...</span></a>');
			};

			//wait for the user to pause 1 sec before sending the query
			clearTimeout(timeout);

			timeout = setTimeout(function() {
				freshStart = false;
				ajaxTrigger(userQuery);
			}, 500);
			
		} else {
			clearTimeout(timeout);
		}
	});

	//On Page Load END
});

function ajaxTrigger(userQuery) {
	var theURL = '/raw-search/?json=1&all=true&qry=' + userQuery;
	console.log( 'Requesting: "' + theURL + '"');

	/* Run the query */
	$.getJSON(theURL, function(data) { //Success Case


		if (data.length > 0) {
			//Clear the div current contents
			$("#ajax-suggestions").html("<!-- Rendered JSON -->");

			//Insert each result
			$.each(data, function() {
				$("#ajax-suggestions").append('<a href="'+this.link+'" class="ajax-result"><span class="suggestion-tag">'+this.postType+' &mdash;</span> '+this.postTitle+' <span class="suggestion-count"><!-- Potential Future Result Parameter--></span></a>');
			});
		} else {
			$("#ajax-suggestions").html('<a href="javascript:searchAll()" class="ajax-result"><span class="suggestion-message">Search for: "'+ userQuery +'"</span></a>');
		}

	}).fail(function() { //Error Case
		console.log('AJAX query to: "' + theURL + '" failed.');
		$("#ajax-suggestions").html('<a href="javascript:searchAll()" class="ajax-result"><span class="suggestion-message">Suggestions could not load... search for: "'+ userQuery +'"</span></a>');
	});
}

function searchAll() {
	//Easy function to force the master search to submit.
	// (used in ajax fallback)
	console.log("hey!");
	$("#master-search-form #submit").trigger("click");
}
</script>


