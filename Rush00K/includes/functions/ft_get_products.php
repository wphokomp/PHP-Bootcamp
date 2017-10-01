<?php
if (isset($_GET['sort']))
{
    $query = "SELECT * FROM categories WHERE category_name=?";
    $category_name = $_GET['sort'];
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $category_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $query = "SELECT product_id FROM categories_products_link WHERE category_id=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_array($result)) {
            $product_id = $row['product_id'];
            $query = "SELECT * FROM products WHERE id=?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "i", $product_id);
            mysqli_stmt_execute($stmt);
            $result2 = mysqli_stmt_get_result($stmt);
            while ($products = mysqli_fetch_array($result2)) {
                $item_name = $products['item_name'];
                $item_price = $products['item_price'];
                $item_img = $products['item_image'];
                ?>
                <div class="col-4">
                    <div class="product-container">
                        <div class="product-image"><img src="<?php echo $item_img ?>"></div>
                        <div class="product-name"><h5><?php echo $item_name ?></h5></div>
                        <div class="product_price"><?php echo $item_price ?></div>
                        <a href="/pages/cart-add.php?product-id=<?php echo $product_id ?>">
                            <div class="button">Add to Cart</div>
                        </a>
                    </div>
                </div>
                <?php
            }
        }
    }
}
else {
    $query = "SELECT * FROM products";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($stmt);
    $row = mysqli_stmt_get_result($stmt);
    while ($products = mysqli_fetch_array($row)) {
        $item_name = $products['item_name'];
        $item_price = $products['item_price'];
        $item_img = $products['item_image'];
        $item_id = $products['id'];
        ?>
        <div class="col-4">
            <div class="product-container">
                <div class="product-image"><img src="<?php echo $item_img ?>"></div>
                <div class="product-name"><h5><?php echo $item_name ?></h5></div>
                <div class="product_price">R<?php echo $item_price ?>.00</div>
                <a href="/pages/cart-add.php?product-id=<?php echo $item_id ?>">
                    <div class="button">Add to Cart</div>
                </a>
            </div>
        </div>
        <?php
    }
}


