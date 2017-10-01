<?php
$conn = mysqli_connect("127.0.0.1", "root", "15891589");
mysqli_select_db($conn, "rush00");
if (empty($_POST))
{
	/*
	 * Form not yet fille out.
	 * TODO Insert HTML form code here
	 * Alernatively you can create a seperate .html file and pass in 
	 * the variables then this block won't be called and can be removed
	 */
}
else
{
	/*
	 * Check that user isn't logged on
	 */
	if($_SERVER["REQUEST_METHOD" === "POST"])
		$email = $_POST["email"];
		$passwd = hash("whirlpool", "kyriakos" . $_POST["passwd"]);
		$full_name = $_POST["full_name"];

		/*
		 * Verify input
		 */
		if ($email != "" && $passwd != "")
		{
			/* 
			 * Check if the user already exists 
			 */
			$sql_check = mysqli_query(
				$conn, "SELECT id FROM tbl_users WHERE email='$email';");
			if (mysqli_num_rows($sql_check) > 0)
			{
				/*
				 * User already exists
				 * TODO tell them.
				 */
			} else
			{
				/*
				 * Add user
				 */
				$sql_add = "
					INSERT INTO tbl_users(email, full_name, passwd)
					VALUES('$email', '$full_name', '$passwd');";
				if (!mysqli_query($conn, $sql_add))
					echo "Error adding user2: " . mysqli_error($conn) . "\n";
				else
				{
					/*
					 * Successfully added user
					 * TODO Tell user and redirect
					 */
				}
			}
		}
		else
		{
			/*
			 * An Input field was blank. TODO notify user
			 */
		}
	}
	else
	{
		/*
		 * User is already logged in
		 * I don't know if this requires HTML, or
		 * Will the "create account" button be invisible while the user is logged in?
		 * Added the else just in case
		 */
	}
}
?>
