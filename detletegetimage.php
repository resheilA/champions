<?php
    $search_query = "birds";
    $search_query = urlencode( $search_query );
    $html = file_get_html( "https://www.google.com/search?q=$search_query&tbm=isch" );
    	
	echo "<pre>";
	print_r($html);
	echo "</pre>";
?>	