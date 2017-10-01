<?php
$page_title = "Cardinal | Cart";
include_once($_SERVER['DOCUMENT_ROOT']."/includes/header.php");
include_once($_SERVER['DOCUMENT_ROOT']."/includes/nav.php");
include_once($_SERVER['DOCUMENT_ROOT']."/includes/functions/ft_db_connect.php");
$cart_subtotal = 0;
?>
<div id="container">
<section class="top-section">
    <div class="row">
        <div class="col-12">
        <h3> CART</h3>
        </div>
        <div class="col-8">
            <div class="row">
                <?php
                if (isset($_COOKIE['cart'])) {
                    include($_SERVER['DOCUMENT_ROOT'] . "/includes/functions/ft_popcart.php");
                }
                else  {
                    echo '<div class="cart-empty">';
                    echo '<h4 style="margin:0">Your Cart is empty. Add items from the store.</h4>';
                    echo '</div>';
                }?>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-4">
            <div id="cart-checkout">
                <h3>CHECKOUT</h3>
                <h4>Subtotal: R<?php echo $cart_subtotal?>.00</h4>
                <p>All items on this site are not actually for sale.</p>
                <?php
                    if (isset($_COOKIE['user']))
                    {
                        ?>
                        <p>To validate your order, and to add your items to your archive, click validate below.</p>
                        <div class="button">VALIDATE</div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <p> To validate your order, log in below.</p>
                        <a href="/pages/login.php"><div class="button">LOG IN</div></a>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</section>
    </div>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/includes/footer.php"); ?>
