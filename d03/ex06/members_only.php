<?PHP

	header("WWW-Authenticate: Basic Realm=''Member area''");
	header("HTTP/1.0 401 Unauthorized");
		$user = $_SERVER["PHP_AUTH_USER"];
		$pw = $_SERVER["PHP_AUTH_PW"];
		if ($user == "zaz" && $pw == "Ilovemylittleponey")
		{
			$base64 = base64_encode(file_get_contents("../img/42.png"));
			$img = "<img src=\"data:image/png;base64, " . $base64 . "\">";
			echo "<html><body>\n";
			echo $img."\n";
			echo "</body></html>\n";
		}
		else
			echo "<html><body>That area is accessible for members only</body></html>\n";

?>
