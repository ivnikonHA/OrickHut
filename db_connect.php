<?php
$link = mysqli_connect('localhost', 'root', '', 'oh');
if($link == false) {
    print("Error: ".mysqli_connect|_error());
}

mysqli_query($link, 'SET CHARSET utf8');

$category = mysqli_fetch_all(mysqli_query($link,
    'SELECT category_name FROM categories'), MYSQLI_ASSOC);
?>
