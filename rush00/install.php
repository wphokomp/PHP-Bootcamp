<?PHP
	
	/* 
	 * Connect to server 
	 */
	$conn = mysqli_connect("127.0.0.1", "root", "123456");
	if (!$conn)
		die("Connection failed: " . msyqli_connect_error());

	/* 
	 * Create database rush00 
	 */
	$sql_create = "CREATE DATABASE IF NOT EXISTS rush00";
	if (!mysqli_query($conn, $sql_create))
		echo "Error creating database\n";
	mysqli_select_db($conn, "rush00");

	/* 
	 * Create table tbl_users 
	 */
	$sql_create_table = 
		"CREATE TABLE IF NOT EXISTS tbl_users
		( id int NOT NULL AUTO_INCREMENT,
		email varchar(128) NOT NULL,
		passwd varchar(512) NOT NULL,
		full_name varchar(128) NOT NULL,
		PRIMARY KEY (id)
		);";
	if (!mysqli_query($conn, $sql_create_table))
		echo "Error creating table " . mysqli_error($conn) . "\n";

	 /*
	  * Create store data 
	  */

	 $sql_create_table = 
		"CREATE TABLE IF NOT EXISTS tbl_users
		( id int NOT NULL AUTO_INCREMENT,
		catergory varchar(128) NOT NULL,
		name varchar(512) NOT NULL,
		price double NOT NULL,
		image varchar(128) NOT NULL,
		discription text, NOT NULL,
		PRIMARY KEY (id)
		);";
	if (!mysqli_query($conn, $sql_create_table))
		echo "Error creating table " . mysqli_error($conn) . "\n";


	$cart = array();
	$file = "../data/cart";
	if (!file_exists("../data"))
		mkdir("../data", 0777, true);
	if (!file_exists($file))
		file_put_contents($file, serialize(cart));
?>
