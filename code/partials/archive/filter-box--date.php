<?php
//dates
$dates = getDateRanges();

$startMonth = get_query_var("start_month");
$startYear = get_query_var("start_year");

//if the year is set but the month isn't then we need to check for that
if ($startYear != "" && $startMonth == "") {
    $startMonth = "jan";
}

//if the month is set but the year isn't then we need to check for that
if ($startMonth != "" && $startYear == "") {
    $startYear = $dates[0];
}

$endMonth = get_query_var("end_month");
$endYear = get_query_var("end_year");

//if the year is set and the month is not then we need to check for that
if ($endYear != "" && $endMonth == "") {
    $endMonth = "dec";
}

//if the month is set but the year is not then we need to check for that
if ($endMonth != "" && $endYear == "") {
    $endYear = $dates[1];
}

$months = array("jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sept", "nov", "oct", "dec");

?>
   
<div class="filter-box">
    <h3>DATE</h3>
    <div class="filters">
        Between
        <br>
        <div class="flat-form-elements">
            <select name="start_month" id="start_month">
                <option value="" <?php echo ($startMonth == "") ? 'selected' : '' ?>>Month</option> 
                <?php foreach($months as $month) : ?>
                    <option value="<?php echo $month; ?>" <?php echo ($month == $startMonth) ? 'selected' : '' ?> ><?php echo ucwords($month); ?></option>
                <?php endforeach; ?>
            </select>
            <select name="start_year" id="start_year">
               <option value="" <?php echo ($startYear == "") ? 'selected' : '' ?>>Year</option> 
               <?php for($i = intval(date("Y", strtotime("now"))); $i >= $dates[0]; $i--) : ?>
                    <option value="<?php echo $i; ?>" <?php echo ($i == $startYear) ? 'selected' : '' ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        and
        <div class="flat-form-elements">
            <select name="end_month" id="end_month">
                <option value="" <?php echo ($endMonth == "") ? 'selected' : '' ?>>Month</option> 
                <?php foreach($months as $month) : ?>
                    <option value="<?php echo $month; ?>" <?php echo ($month == $endMonth) ? 'selected' : '' ?> ><?php echo ucwords($month); ?></option>
                <?php endforeach; ?>
            </select>
            <select name="end_year" id="end_year">
                <option value="" <?php echo ($endYear == "") ? 'selected' : '' ?>>Year</option> 
                <?php for($i = intval(date("Y", strtotime("now"))); $i >= $dates[0]; $i--) : ?>
                    <option value="<?php echo $i; ?>" <?php echo ($i == $endYear) ? 'selected' : '' ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <button class="date-submit btn btn-primary">Submit</button>
        <button class="date-reset btn btn-default">Reset</button>
    </div>
</div>