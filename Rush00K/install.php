<?php
$db_name = "cardifnm_site";
$link = mysqli_connect("localhost", "root", "123456");

if($link === false)
    die("ERROR: Could not connect. " . mysqli_connect_error());
$sql = "CREATE DATABASE ".$db_name;
if(mysqli_query($link, $sql)){
    echo "Database created successfully<br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link)."<br>";
}
mysqli_close($link);
$link = mysqli_connect("localhost", "root", "123456", $db_name);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` text NOT NULL,
  `item_description` text NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;
";
if (mysqli_query($link, $sql)){
    echo "Products table created successfully<br>";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link)."<br>";
}
$sql = "
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;
";
if (mysqli_query($link, $sql)){
    echo "Categories created successfully<br>";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link)."<br>";
}
$sql = "
CREATE TABLE IF NOT EXISTS `categories_products_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;
";
if (mysqli_query($link, $sql)){
    echo "Categories - Products Links table created successfully<br>";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link)."<br>";
}
$sql = "
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` text NOT NULL,
  `user_token` text NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;
";
if (mysqli_query($link, $sql)){
    echo "Users created successfully<br>";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link)."<br>";
}
$sql = "
CREATE TABLE IF NOT EXISTS `users_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
if (mysqli_query($link, $sql)){
    echo "Archive created successfully<br>";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link)."<br>";
}
$sql = "INSERT INTO `products` (`id`, `item_name`, `item_description`, `item_price`, `item_image`) VALUES
(1, 'Four Vices - Beard Oil', 'Beard oil for the gods. Have a radiant-looking beard in only one use. Turns your beard from dull and dry to lush and strong.', 399, 'https://s18.postimg.org/i5bud9uk9/beardoil.jpg'),
(2, 'Old Money - Beard Oil', 'Beard oil for your beard. Makes it Look Sniney and new', 350, 'https://s18.postimg.org/jlncvexh5/beardoil2.jpg'),
(3, 'Tom Cypher Phantom - Bracelet', 'A bracelet to rule all bracelets', 105, 'https://s18.postimg.org/isfszwxrt/tomcypersphantom.jpg'),
(4, 'Tom Cypher Twine Bracelet', 'A bracelet to rule all bracelets', 499, 'https://s18.postimg.org/jj8j5p055/tomcypherstwine.jpg'),
(5, 'Alberto Torresi Brown - Sandal', 'Giving your feet that gust of fresh air.', 1200, 'https://s18.postimg.org/57jz3obnd/Brown_Sandal.jpg'),
(6, 'Alberto Torresi Tan Leather - Boot', 'Better than those average Tims you''re wearing', 6000, 'https://s18.postimg.org/aa1aygkxl/Tan_Leather1.jpg'),
(7, 'Michael Black Leather - Jacket', 'Real Leather bro... Real Leather...', 3499, 'https://s18.postimg.org/augc15e61/Biker1.jpg'),
(8, 'Larassa Black Leather - Jacket', 'Real leather bro... Real Leather', 2699, 'https://s18.postimg.org/k0ymofjeh/biker_2.jpg'),
(9, 'Four Vices Mini Kit - beard Oil', 'The Whole 9 yards - Just for your beard!', 3199, 'https://s18.postimg.org/5ycp9ge0p/minikit.jpg');
";
if (mysqli_query($link, $sql)){
    echo "Inserted into Products successfully<br>";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link)."<br>";
}
$sql = "INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Grooming'),
(2, 'Clothing'),
(3, 'Shoes'),
(4, 'Accessories'),
(5, 'Featured');
";
if (mysqli_query($link, $sql)){
    echo "Inserted into Categories successfully<br>";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . "<br>";
}
    $sql = "INSERT INTO `categories_products_link` (`id`, `category_id`, `product_id`) VALUES
(1, 5, 4),
(2, 5, 6),
(3, 4, 3),
(4, 4, 4),
(5, 3, 5),
(6, 3, 6),
(7, 2, 7),
(8, 2, 8),
(9, 1, 1),
(10, 1, 2),
(11, 1, 9),
(13, 5, 9);
";
    if (mysqli_query($link, $sql)){
        echo "Inserted into Categories - Products Link successfully<br>";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . "<br>";
    }

mysqli_close($link);
