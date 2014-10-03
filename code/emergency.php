<?php
$emergencyRSS = file_get_contents("http://emergency.byui.edu/syndication.axd");
header("Content-type: text/xml");
echo $emergencyRSS;
?>