<?php
require_once 'functions.php';
require_once 'data.php';
//require_once 'user_data.php';
require_once 'db_connect.php';

//session_start();
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
        $email = $form['email'];
        $sql =  "SELECT * FROM users WHERE user_email = '$email'";
        $res = mysqli_query($link, $sql);
        $user = mysqli_fetch_assoc($res);
        $password_hash = $user['user_password'];
        if(!password_verify($form['password'], $password_hash)) {
            $errors['password'] = 'Вы ввели неправильный пароль';
            $page_content = renderTemplate('templates/login-template.php', [
                'form' => $form,
                'errors' => $errors,
                'category' => $category ]);
        } else {

            $_SESSION['user'] = $user;
            header("Location: /OrickHut/index.php");
            exit;
        }
    }
} else {
    $page_content = renderTemplate('templates/login-template.php', [
        'category' => $category ]);
}

// $page_content = renderTemplate('templates/login-template.php', [
//     'lots' => $lots,
//     'category' => $category ]);
$layout_content = renderTemplate('templates/layout-template.php',[
    'title' => 'OrickHub - Login',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => 'img\\' . $user_avatar,
    'content' => $page_content,
    'category' => $category ]);

print($layout_content);
?>
