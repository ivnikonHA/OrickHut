<?php
$link = mysqli_connect('localhost', 'root', '', 'oh');
if($link == false) {
    print("Error: ".mysqli_connect|_error());
}

mysqli_query($link, 'SET CHARSET utf8');

$category = mysqli_fetch_all(mysqli_query($link,
    'SELECT category_name FROM categories'), MYSQLI_ASSOC);
$sql = "SELECT lots.id, lot_name as `name`, lot_price as `price`,
            lot_image as `picture`, category_name as `category`
        FROM lots
        JOIN categories ON category_id = categories.id
        WHERE lot_finished IS NULL
        ORDER BY lot_created DESC";
$res = mysqli_query($link, $sql);
$lots = mysqli_fetch_all($res, MYSQLI_ASSOC);
?>
