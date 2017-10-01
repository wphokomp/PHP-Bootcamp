<?php

	header("Content-Type: image/png");

	header('Content-Length: ' . filesize("../img/42.png")); 
	readfile("../img/42.png");

?>
