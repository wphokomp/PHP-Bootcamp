<a href="/pages/store.php">
    <li class="sort-cat-item">All</li>
</a>
<?php
$query = "SELECT * FROM categories ORDER BY category_name";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_execute($stmt);
$row = mysqli_stmt_get_result($stmt);
while ($cat = mysqli_fetch_array($row)) {
    $cat_name = $cat['category_name'];
    ?>
    <a href="/pages/store.php?sort=<?php echo $cat['category_name']?>">
        <li class="sort-cat-item"><?php echo $cat['category_name']?></li>
    </a>
    <?php
}
?>