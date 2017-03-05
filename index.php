<?php
/* Require Timezone Class */
require 'Timezone.php';

/* Create object of Timezone class */
$timezoneObj = new Timezone();

/* Default timezone is UTC */
date_default_timezone_set('UTC');
$datetime = date('Y-m-d H:i:s');

echo "UTC Time - " . date("d F Y, h:i A", strtotime($datetime)) . " <br/>";

/* Covert Datetime */
$convert_time = $timezoneObj->convert_timezone('America/New_York', $datetime);

/* America/New_York identfire is (UTC-05:00) */
echo "Converted Time - " . $convert_time;
?>