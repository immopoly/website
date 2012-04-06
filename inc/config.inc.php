<?php

	$CONFIG = array(
		"phpIncPath" => "inc",
		"cssPath" => "css",
		"imagePath" => "img",
		"contentPath" => "content",
		"pagefileSuffix" => ".inc.php",
		"newsFilePattern" => "^(\d){4}.*\.html$",
		"newsMaxItems" => 10
		);

	//extra entry to use contentPath-config-var
	$CONFIG['newsPath'] = $CONFIG['contentPath'].'/news';

?>