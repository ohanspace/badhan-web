<?php
function empty_to_null($var){
	if(empty($var)){
		return NULL;
	}else return $var;
}

function btn_edit ($uri)
{
	return anchor($uri, '<i class="glyphicon glyphicon-edit"></i>');
}

function btn_delete ($uri)
{
	return anchor($uri, '<i class="glyphicon glyphicon-ban-circle"></i>', array(
		'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?');"
	));
}

function addhttp($url) {
	if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
		$url = "http://" . $url;
	}
	return $url;
}


