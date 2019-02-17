<?php
require_once 'functions.php';
require_once 'mysql_helper.php';
require_once 'db_connect.php';


// $category = [];
// foreach($result as $key => $value) {
//     $category[] = $value['category_name'];
// }

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST;
    $required = ['email', 'password', 'name', 'message'];
    $errors = [];

    foreach($required as $key){
        if(empty($form[$key])){
            $errors[$key] = 'Это поле нужно заполнить';
        }
    }

    if(isset($_FILES['picture']['name'])) {
        $path = 'img/'.$_FILES['picture']['name'];
        $res = move_uploaded_file($_FILES['picture']['tmp_name'], $path);
    }
    if(isset($path)) {
        $form['picture'] = $path;
    }


    if(count($errors)) {
        $page_content = renderTemplate('templates/sign-up-template.php', [
            'form' => $form,
            'errors' => $errors,
            'category' => $category
        ]);
    } else {
        $sql = 'INSERT INTO users (user_reg_date, user_email, user_name,
         user_password, user_avatar, user_contacts)
         VALUES (NOW(), ?, ?, ?, ?, ?)';
        $password = password_hash($form['password'], PASSWORD_DEFAULT);
        $stmt = db_get_prepare_stmt($link, $sql,
            [$form['email'], $form['name'], $password, $form['picture'], $form['message']]);
        $res = mysqli_stmt_execute($stmt);
        if($res) {
            header('Location: index.php');
        }

    }
} else {
    $page_content = renderTemplate('templates/sign-up-template.php', [
        'category' => $category
    ]);
}

$layout_content = renderTemplate('templates/layout-template.php',[
    'title' => 'OrickHub - Sign-up',
    'is_auth' => false,
    'user_name' => '',
    'user_avatar' => '',
    'content' => $page_content,
    'category' => $category ]);

print($layout_content);
?>
