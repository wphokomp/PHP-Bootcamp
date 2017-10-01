<?php
if ($_GET['product-id'] != "")
{
    if ($_COOKIE['cart'] != "") {
        $cookie_data = unserialize($_COOKIE['cart']);
        array_push($cookie_data, $_GET['product-id']);
        setcookie('cart', serialize($cookie_data), time() + 3600);
    }
    else
    {
        $new_arr = [];
        array_push($new_arr, $_GET['product-id']);
        setcookie('cart', serialize($new_arr), time() + 3600);
    }
}
header("Location: cart.php");

