<?php
require_once('functions.php');
require_once('data.php');

$lot = null;

if(isset($_GET['lot_id'])) {
    $lot_id = $_GET['lot_id'];

    foreach($lots as $item) {
        if($item['id'] == $lot_id) {
            $lot = $item;
            break;
        }
    }
}

if(!$lot) {
    http_response_code(404);
}

$page_content = renderTemplate('templates/lot.php', [
    'lot' => $lot,
    'category' => $category ]);
$layout_content = renderTemplate('templates/layout.php',[
    'title' => 'OrickHub - Lot page',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'content' => $page_content,
    'category' => $category ]);

print($layout_content);
?>
