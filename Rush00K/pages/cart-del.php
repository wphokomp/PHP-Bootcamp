<?php
if ($_GET['product-id'] != "")
{
    if ($_COOKIE['cart'] != "") {
        $cookie_data = unserialize($_COOKIE['cart']);
        for($i = 0; $cookie_data[$i]; $i++) {
            if ($cookie_data[$i][0] == $_GET['product-id'])
                unset ($cookie_data[$i]);
        }
        if ($i > 1) {
            setcookie('cart', serialize($cookie_data), time() + 3600);
        }
        else {
            unset($_COOKIE['cart']);
            setcookie('cart', "", time() - 3600);
        }
    }
}
header("Location: cart.php");