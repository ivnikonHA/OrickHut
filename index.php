<?php
date_default_timezone_set("Europe/Moscow");
require_once 'functions.php';
require_once 'data.php';

$page_content = renderTemplate('templates/index.php', [
    'lots' => $lots,
    'category' => $category ]);
$layout_content = renderTemplate('templates/layout.php',[
    'title' => 'OrickHub - Main',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'content' => $page_content,
    'category' => $category ]);

print($layout_content);
?>

