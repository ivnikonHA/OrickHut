<?php
require_once 'functions.php';
require_once 'data.php';
require_once 'user_data.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST;
    $required = ['email', 'password'];
    $errors = [];

    foreach($required as $key) {
        if(empty($form[$key])) {
            $errors[$key] = 'Это поле надо заполнить.'; 
        }
    }

    if(count($errors)) {
        $page_content = renderTemplate('templates/login-template.php', [
            'form' => $form,
            'errors' => $errors,
            'category' => $category ]);
    } else {
        $user = search_user_by_email($users,$form['email']);
        if()
    }
} else {
    $page_content = renderTemplate('templates/login-template.php', [
        'category' => $category ]);
}

// $page_content = renderTemplate('templates/login-template.php', [
//     'lots' => $lots,
//     'category' => $category ]);
$layout_content = renderTemplate('templates/layout.php',[
    'title' => 'OrickHub - Login',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'content' => $page_content,
    'category' => $category ]);

print($layout_content);
?>