<?PHP

	session_start();
	
	$user = "";
	$pass = "";

	$i = 0;
	foreach ($_GET as $key => $value)
		$i++;
	if ($i == 3)
	{
		$user = $_GET["login"];
		$pass = $_GET["passwd"];
		if ($_GET["submit"] == "OK")
		{
			$_SESSION["login"] = $user;
			$_SESSION["passwd"] = $pass;
		}
	}

?>

<HTML>
<BODY>
	<FORM action="index.php">
		<H1 align="center">Login</H1><BR />
		Username: 
		<BR />
		<input type="text" name="login" value="<?php echo $_SESSION["passwd"] ?>"/> <BR />
		Password: 
		<BR/>
		<input type="text" name="passwd" value="<?php echo $_SESSION["passwd"] ?>"/> <BR />
		<input type="submit" name = "submit" value="OK" />
	</FORM>

</BODY>
</HTML>
