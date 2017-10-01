<?php
/*
 * Cart: include cart.php then use the below
 * Cart is stored as a serialize array
 * functions to add/remove/recieve the cart
 * TODO Format for recieving the cart needs to be discussed
 * TODO HAS NOT BEEN TESTED
 */

if( isset( $_REQUEST['modify'] ))
{
	add_to_cart();
	function add_to_cart($email, $item_id)
	{
		$file = "../data/cart";
		$cart = array();
		$cart = unserialize(file_get_contents($file));
		$len = 0;
		foreach ($cart as $item)
			$len++;

		/*
		 * Fetching all the details of the item for the database
		 */
		$conn = mysqli_connect("127.0.0.1", "root", "123456");
		mysqli_select_db($conn, "rush00");
		if (!($query = mysqli_query($conn, "SELECT * FROM tbl_products WHERE id = '$item_id';")))
		{
			$row = mysql_fetch_assoc($query);
			$cart[$len] = $row;
			file_put_contents($file, serialize($cart));
		}
		else
			echo "Add to cart query error " . mysql_error($conn) . "\n";
	}
}


?>
