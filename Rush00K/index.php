<?php
$page_title = "Cardinal | Home";
include_once($_SERVER['DOCUMENT_ROOT']."/includes/functions/ft_db_connect.php");
include_once($_SERVER['DOCUMENT_ROOT']."/includes/header.php");
include_once($_SERVER['DOCUMENT_ROOT']."/includes/nav.php");
?>
<div class="container">
    <section id="home-mural" class="full-screen">
        <div class="center-vertical">
            <h2>FOR DUDES, BY DUDES</h2>
            <h5>DO YOU EVEN SHOP, BRO?</h5>
            <a href="/pages/store.php"><div class="btn-white-outl">Visit our Store</div></a>
        </div>
    </section>
    <section id="featured-items">
        <div class="row">
            <div class="col-12">
                <h3 class="centered-text"> FEATURED ITEMS</h3>
                <div class="row">
                        <?php
                            include($_SERVER['DOCUMENT_ROOT']."/includes/functions/ft_get_featured.php");
                        ?>

                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/includes/footer.php"); ?>
