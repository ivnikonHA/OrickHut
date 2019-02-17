<?php
require_once 'functions.php';

connect_to_db();
$link = mysqli_connect('localhost', 'root', '', 'oh');
if($link == false) {
    print("Error: ".mysqli_connect|_error());
}

mysqli_query($link, 'SET CHARSET utf8');

$result = mysqli_fetch_all(mysqli_query($link,
    'SELECT category_name FROM categories'), MYSQLI_ASSOC);
$category = [];
foreach($result as $key => $value) {
    $category[] = $value['category_name'];
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST;
    $required = ['email', 'password', 'name', 'message'];
    $errors = [];

    foreach($required as $key){
        if(empty($form[$key])){
            $errors[$key] = 'Это поле нужно заполнить';
        }
    }

    if(count($errors)) {
        $page_content = renderTemplate('templates/sign-up-template.php', [
            'form' => $form,
            'errors' => $errors,
            'category' => $category
        ]);
    }
} else {
    $page_content = renderTemplate('templates/sign-up-template.php', [
        'category' => $category
    ]);
}

$layout_content = renderTemplate('templates/layout-template.php',[
    'title' => 'OrickHub - Sign-out',
    'is_auth' => false,
    'user_name' => '',
    'user_avatar' => '',
    'content' => $page_content,
    'category' => $category ]);

print($layout_content);
?>
