<?php
if (isset($_COOKIE['cart']))
{
    if($_COOKIE["cart"] !== "")
    {
        $file = unserialize($_COOKIE['cart']);
        for ($i = 0; $file[$i]; $i++)
        {
            $id = $file[$i];
            $query = "SELECT * FROM products WHERE id=?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "s", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while ($products = mysqli_fetch_array($result))
            {
                $cart_subtotal += $products['item_price'];
                $item_name = $products['item_name'];
                $item_price = $products['item_price'];
                $item_description = $products['item_description'];
                $item_img = $products['item_image'];
                $item_id = $products['id'];
                ?>
                    <div class="cart-product-container">
                        <div class="cart-product-image"><img src="<?php echo $item_img ?>"></div>
                        <div class="cart-product-name"><h5><?php echo $item_name ?></h5></div>
                        <div class="cart-product-description"><h5><?php echo $item_description ?></h5></div>
                        <div class="cart-product-price">R<?php echo $item_price ?>.00</div>
                        <a href="/pages/cart-del.php?product-id=<?php echo $item_id?>"><div class="cart-remove">X</div></a>
                        <div class="clearfix"></div>
                    </div>
                <?php
            }
        }
        ?>
        <?php
    }
}
else {
}
