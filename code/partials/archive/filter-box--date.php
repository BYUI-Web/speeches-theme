<?php
//dates
$dates = getDateRanges();
?>
   
<div class="filter-box">
    <h3>DATE</h3>
    <div class="filters">
        Between
        <br>
        <div class="flat-form-elements">
            <select id="start_month">
                <option value="jan" selected="selected">Jan</option>
                <option value="feb">Feb</option>
                <option value="mar">Mar</option>
                <option value="apr">Apr</option>
                <option value="may">May</option>
                <option value="jun">Jun</option>
                <option value="jul">Jul</option>
                <option value="aug">Aug</option>
                <option value="sept">Sept</option>
                <option value="nov">Nov</option>
                <option value="oct">Oct</option>
                <option value="dec">Dec</option>
            </select>
            <select id="start_year">
               <?php for($i = intval(date("Y", strtotime("now"))); $i >= $dates[0]; $i--) : ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        and
        <div class="flat-form-elements">
            <select id="end_month">
                <option value="jan" selected="selected">Jan</option>
                <option value="feb">Feb</option>
                <option value="mar">Mar</option>
                <option value="apr">Apr</option>
                <option value="may">May</option>
                <option value="jun">Jun</option>
                <option value="jul">Jul</option>
                <option value="aug">Aug</option>
                <option value="sept">Sept</option>
                <option value="nov">Nov</option>
                <option value="oct">Oct</option>
                <option value="dec">Dec</option>
            </select>
            <select id="end_year">
                <?php for($i = intval(date("Y", strtotime("now"))); $i >= $dates[0]; $i--) : ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>
    </div>
</div>