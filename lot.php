<?php
require_once('functions.php');
require_once('data.php');

$lot = null;

if(isset($_GET['lot_id'])) {
    $lot_id = $_GET['lot_id'];

    // foreach($lots as $item) {
    //     if($item['id'] == $lot_id) {
    //         $lot = $item;
    //         break;
    //     }
    // }
    $lot = get_lot_by_id($lot_id,$lots);
}

if(!$lot) {
    http_response_code(404);
}

$history = null;
if(isset($_COOKIE['history'])) {
    $history = json_decode($_COOKIE['history']);
}
if($history == null || !in_array($lot_id,$history)) {
    $history[] = $lot_id;
    setcookie('history',json_encode($history));
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
