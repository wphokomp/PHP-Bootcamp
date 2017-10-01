<?php
$page_title = "Cardinal | Store";
include_once($_SERVER['DOCUMENT_ROOT']."/includes/functions/ft_db_connect.php");
include_once($_SERVER['DOCUMENT_ROOT']."/includes/header.php");
include_once($_SERVER['DOCUMENT_ROOT']."/includes/nav.php");
?>
<div class="container">
    <section class="top-section">
        <div class="row">
            <div class="col-9">
                <h3>STORE</h3>
            </div>
            <div class="col-3">
                <div id="sort">SORT <i class="fa fa-filter" aria-hidden="true"></i>
                    <ul id="sort-list">
                <?php include($_SERVER['DOCUMENT_ROOT']."/includes/functions/ft_get_sortcat.php")?>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <?php
                    include($_SERVER['DOCUMENT_ROOT']."/includes/functions/ft_get_products.php");
                    ?>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/includes/footer.php"); ?>