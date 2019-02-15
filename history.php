<?php
require_once 'functions.php';
require_once 'data.php';

$page_content='';
$history_id = null;
if(isset($_COOKIE['history'])) {
    $history_id = json_decode($_COOKIE['history']);
}

if($history_id) {
    foreach($history_id as $id) {
        $history[] = get_lot_by_id($id,$lots);
    }
    $page_content = renderTemplate('templates/history-template.php', [
        'lots' => $history,
        'category' => $category ]);
}
$layout_content = renderTemplate('templates/layout-template.php',[
    'title' => 'OrickHub - History',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'content' => $page_content,
    'category' => $category ]);

print($layout_content);
?>