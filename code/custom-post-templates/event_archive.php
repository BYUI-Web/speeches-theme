<?php 

// Include Model
require_once 'event_model.php';
$speechesarchive = array();
$speakersarchive = array();
$now = strtotime('now');
$speeches_args = array(
	'post_type' => 'devotional',
	'meta_key' => 'event_date',
	'orderby' => 'meta_value_num',
	'order' => 'ASC'
	); 
$speakers_args = array(
	'post_type' => 'speaker',
	'meta_key' => 'last_name',
	'orderby' => 'meta_value',
	'order' => 'ASC'
	); 
$loop = new WP_Query( $speeches_args );
if ($loop->have_posts()) {
	while ($loop->have_posts()) { 
		$loop->the_post();
		array_push($speechesarchive, get_the_ID());
	}
}

$loop = new WP_Query( $speakers_args );
if ($loop->have_posts()) {
	while ($loop->have_posts()) { 
		$loop->the_post();
		array_push($speakersarchive, get_the_ID());
	}
}
get_header();
?>
<section class="container">
    <div class="archive-header group">
        <div class="archive-header-banner">
            <h1>Speeches Archive</h1>
        </div>
        <br>
        <!--
        <div class="filters">
            <label for="">Browse by: </label>
            <a href="javascript:void(0)" onclick="dispDate()" id="dispDate">Date</a>
            <a href="javascript:void(0)" onclick="dispSpeaker()" id="dispSpeaker">Speaker</a>
            <a href="javascript:void(0)" onclick="dispTopic()" id="dispTopic">Topic</a>
        </div>-->
    </div>
    <script type="text/javascript">
        posts = [];
        <?php
        foreach ($speechesarchive as $id)
            echo 'posts.push({ "id":'.$id.', "postType":"'. get_post_type( $id ) .'", "month":"'. date( 'F', get_post_meta($id, 'event_date', true)) .'", "year":"'.date( 'Y', get_post_meta($id, 'event_date', true)).'"});';
        ?>
        function updateDateList() {
            var toShow = jQuery.grep(posts, function( a ) {
                var postType = (document.getElementById('post_type').value == 'all') ? true : false;
                return ( (document.getElementById('post_type').value == a.postType || postType) );
            });
            for (i in posts) {
                document.getElementById('post-' + posts[i].id).style.display="none";
            }
            for (i in toShow) {
                document.getElementById('post-' + toShow[i].id).style.display="block";
            }
        }
        function speechesFilter() {
            var toShow = jQuery.grep(posts, function( a ) {
                var postType = (document.getElementById('post_type').value == 'all') ? true : false;
                return ( (document.getElementById('post_type').value == a.postType || postType) );
            });
            for (i in posts) {
                document.getElementById('post-' + posts[i].id).style.display="none";
            }
            for (i in toShow) {
                document.getElementById('post-' + toShow[i].id).style.display="block";
            }
        }
    </script>

    <div class="row">
        <div class="col-xs-12 col-sm-4">
            <div class="filter-box">
                <h3>EVENT TYPE</h3>
                <div class="filters">
                    <div class="flat-form-elements"> 
                        <input checked type="checkbox" name="event" value="devotional" id="devotional">
                        <label for="devotional">Devotionals</label><br>
                        <input type="checkbox" name="event" value="forum" id="forum">
                        <label for="forum">University Forums</label><br>
                        <input type="checkbox" name="event" value="graduation" id="graduation">
                        <label for="graduation">Graduation</label>
                    </div> 
                </div>
            </div>
            <div class="filter-box">
                <h3>TOPIC</h3>
                <div class="filters">
                    <div class="flat-form-elements"> 
                        <input type="checkbox" name="event" value="tag-here" id="tag-here1">
                        <label for="tag-here1">Agency</label><br>
                        <input checked type="checkbox" name="event" value="tag-here" id="tag-here2">
                        <label for="tag-here2">Book of Mormon</label><br>
                        <input type="checkbox" name="event" value="tag-here" id="tag-here3">
                        <label for="tag-here3">Honesty</label>
                    </div>
                    <a href="#" class="more-btn">See More</a>
                    <div class="flat-form-elements" style="display:none;"> 
                        <input type="checkbox" name="event" value="tag-here" id="tag-here4">
                        <label for="tag-here4">Faith</label><br>
                        <input type="checkbox" name="event" value="tag-here" id="tag-here5">
                        <label for="tag-here5">Education</label><br>
                        <input type="checkbox" name="event" value="tag-here" id="tag-here6">
                        <label for="tag-here6">Family</label>
                    </div>
                </div>
            </div>
            <div class="filter-box">
                <h3>SPEAKER</h3>
                <div class="filters">
                    <div class="flat-form-elements"> 
                        <input checked type="checkbox" name="event" value="id-here" id="id-here1">
                        <label for="id-here1">Clark, Kim B.</label><br>
                        <input type="checkbox" name="event" value="id-here" id="id-here2">
                        <label for="id-here2">Hanks, Stephen G.</label><br>
                        <input checked type="checkbox" name="event" value="id-here" id="id-here3">
                        <label for="id-here3">Eager, Drew</label><br>
                        <input type="checkbox" name="event" value="id-here" id="id-here4">
                        <label for="id-here4">Holdaway, Boyd F.</label>
                    </div>
                    <a href="#" class="more-btn">See More</a>
                    <div class="flat-form-elements" style="display:none;"> 
                        <input type="checkbox" name="event" value="id-here" id="id-here5">
                        <label for="id-here5">Beck, David L.</label><br>
                        <input type="checkbox" name="event" value="id-here" id="id-here6">
                        <label for="id-here6">Oaks, Dallin H.</label><br>
                        <input type="checkbox" name="event" value="id-here" id="id-here7">
                        <label for="id-here7">Monson, Thomas S.</label><br>
                        <input type="checkbox" name="event" value="id-here" id="id-here8">
                        <label for="id-here8">Uchtdorf, Dieter F.</label>
                    </div>
                </div>
            </div>
            <div class="filter-box">
                <h3>DATE</h3>

                <div class="filters">
                    Between<br>
                    <div class="flat-form-elements"> 
                        <select id="start_month" class="" onchange="updateDateList()">
                            <option value="jan" selected="selected">Jan</option>
                            <option value="feb">Feb</option>
                            <option value="mar">Mar</option>
                            <option value="apr">Apr</option>
                        </select>
                        <select id="start_year" class="" onchange="updateDateList()">
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012" selected="selected">2012</option>
                        </select>
                    </div>
                    and
                    <div class="flat-form-elements"> 
                        <select id="end_month" class="" onchange="updateDateList()">
                            <option value="jan">Jan</option>
                            <option value="feb">Feb</option>
                            <option value="mar">Mar</option>
                            <option value="apr" selected="selected">Apr</option>
                        </select>
                        <select id="end_year" class="" onchange="updateDateList()">
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8">
            <div class="running-filter"><a href="#" class="remove-filter-x"></a> <span class="temp-caption">Devotionals</span></div>
            <div class="running-filter"><a href="#" class="remove-filter-x"></a> <span class="temp-caption">Book of Mormon</span></div>
            <div class="running-filter"><a href="#" class="remove-filter-x"></a> <span class="temp-caption">Clark, Kim B.</span></div>
            <div class="running-filter"><a href="#" class="remove-filter-x"></a> <span class="temp-caption">Eager, Drew</span></div>
            <div class="running-filter"><a href="#" class="remove-filter-x"></a> <span class="temp-caption">January 2012 to April 2014</span></div>

            <div class="archive-results">
                <div class="result-count">2 RESULTS FOUND</div>
                <div class="devotional result">
                    <a href="#" class="result-header"><span class="result-type">Devotional</span>: March 14th, 2014</a>
                    <div class="result-title">The Book of Mormon</div>
                    <div class="result-presenter">Drew Eager</div>
                    <div class="result-presenter-title">Business Management Faculty</div>
                </div>
                <div class="forum result">
                    <a href="#" class="result-header"><span class="result-type">University Forum</span>: January 5th, 2013</a>
                    <div class="result-title">Scripture Study</div>
                    <div class="result-presenter">Kim B. Clark</div>
                    <div class="result-presenter-title">President of BYU-Idaho</div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.onload = dispDate();
        window.onload = updateDateList();
    </script>
</section>
<?php get_footer(); ?>