<?php

	function auth($email, $passwd)
	{
		session_start();
		$conn = mysqli_connect("127.0.0.1", "root", "15891589");
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error());
		if (!mysqli_select_db($conn, "rush00"))
			die ("Database failed: " . mysqli_error($conn));

		$hashed = hash("whirlpool", "kyriakos".$passwd);
		if (!($quer = mysqli_query($conn, "SELECT id FROM tbl_users WHERE email='$email'
				&& passwd='$hashed';")))
			echo "Query error " . mysql_error($conn);

		if (mysqli_num_rows($quer) > 0)
			return true;
		return false;
	}

?>
