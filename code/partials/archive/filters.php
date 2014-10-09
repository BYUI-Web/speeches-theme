<?php

$filterTypes = array("Event Type", "Topic", "Speaker", "Date");

?>
  

<div class="col-xs-12 col-sm-4">
   <?php include __DIR__."/filter-box.php"; ?>
    <div class="filter-box">
        <h3>TOPIC</h3>
        <div class="filters">
            <div class="flat-form-elements">
                <input type="checkbox" name="event" value="tag-here" id="tag-here1">
                <label for="tag-here1">Agency</label>
                <br>
                <input checked type="checkbox" name="event" value="tag-here" id="tag-here2">
                <label for="tag-here2">Book of Mormon</label>
                <br>
                <input type="checkbox" name="event" value="tag-here" id="tag-here3">
                <label for="tag-here3">Honesty</label>
            </div>
            <a href="#" class="more-btn">See More</a>
            <div class="flat-form-elements" style="display:none;">
                <input type="checkbox" name="event" value="tag-here" id="tag-here4">
                <label for="tag-here4">Faith</label>
                <br>
                <input type="checkbox" name="event" value="tag-here" id="tag-here5">
                <label for="tag-here5">Education</label>
                <br>
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
                <label for="id-here1">Clark, Kim B.</label>
                <br>
                <input type="checkbox" name="event" value="id-here" id="id-here2">
                <label for="id-here2">Hanks, Stephen G.</label>
                <br>
                <input checked type="checkbox" name="event" value="id-here" id="id-here3">
                <label for="id-here3">Eager, Drew</label>
                <br>
                <input type="checkbox" name="event" value="id-here" id="id-here4">
                <label for="id-here4">Holdaway, Boyd F.</label>
            </div>
            <a href="#" class="more-btn">See More</a>
            <div class="flat-form-elements" style="display:none;">
                <input type="checkbox" name="event" value="id-here" id="id-here5">
                <label for="id-here5">Beck, David L.</label>
                <br>
                <input type="checkbox" name="event" value="id-here" id="id-here6">
                <label for="id-here6">Oaks, Dallin H.</label>
                <br>
                <input type="checkbox" name="event" value="id-here" id="id-here7">
                <label for="id-here7">Monson, Thomas S.</label>
                <br>
                <input type="checkbox" name="event" value="id-here" id="id-here8">
                <label for="id-here8">Uchtdorf, Dieter F.</label>
            </div>
        </div>
    </div>
    <div class="filter-box">
        <h3>DATE</h3>
        <div class="filters">
            Between
            <br>
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