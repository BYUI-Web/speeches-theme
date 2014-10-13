<?php
include __DIR__."/filter-speeches.php";
?>

<div class="archive-results">
    <div class="result-count"><?php echo $numPosts; ?> RESULTS FOUND</div>
    <?php foreach($speeches as $speech) : 
            $speaker = get_post($speech->presenters);        
    ?>
        <div class="<?php echo $speech->post_type;?> result">
            <a href="<?php echo $speech->guid; ?>" class="result-header"><span class="result-type"><?php echo ucwords($speech->post_type); ?></span>: <?php echo date("F jS, Y", $speech->event_date); ?></a>
            <div class="result-title"><?php echo $speech->post_title; ?></div>
            <div class="result-presenter"><?php echo $speaker->post_title; ?></div>
            <div class="result-presenter-title"><?php echo $speaker->title; ?></div>
        </div>
    <?php endforeach; ?>
    
    <ul class="pagination">
        <li class="<?php echo ($page === 1) ? 'disabled': ''?>"><a href="./archive?page=<?php echo ($page === 1) ? 1 : $page - 1; ?>">&laquo;</a></li>
        <?php for($i = 1; $i <= $numPages; $i++) : ?>
        <li class="<?php echo ($page === $i) ? 'active': ''; ?>"><a href="./archive?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>
        <li class="<?php echo ($page == $numPages) ? 'disabled': ''?>"><a href="./archive?page=<?php echo ($page == $numPages) ? $numPages : $page + 1; ?>">&raquo;</a></li>
    </ul>
</div>