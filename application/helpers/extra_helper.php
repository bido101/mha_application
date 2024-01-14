<?php

function dd($data) {
	echo '<pre>'.print_r($data, true).'</pre>';
}

function get_date_format($date, $format = 'm/d/Y')
{
	$date = date_create($date);
	return date_format($date, $format);
}