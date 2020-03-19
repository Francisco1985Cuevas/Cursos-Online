<?php
	$mysession = curl_init($_GET['feed']);
	curl_setopt($mysession, CURLOPT_HEADER, false);
	curl_setopt($mysession, CURLOPT_RETURNTRANSFER, true);
	$out = curl_exec($mysession);
	header('Content-Type: text/xml');
	$out = utf8_encode($out);
	echo $out;
	curl_close($mysession);
?>



