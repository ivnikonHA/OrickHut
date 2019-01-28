<?php
require_once 'functions.php';
require_once 'data.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;

    $required = ['lot-name','category','message','lot-rate','lot-step','lot-date'];
    $numbers = ['lot-rate','lot-step'];
    $dict = [
        'lot-name' => 'Название',
        'category' => 'Категория',
        'message' => 'Описание',
        'lot-rate' => 'Начальная цена',
        'lot-step' => 'Шаг ставки',
        'lot-date' => 'Дата окончания торгов'
    ];
    $errors = [];

    // foreach($numbers as $key) {
    //     if(!filter_var($key, FILTER_VALIDATE_INT|FILTER_VALIDATE_FLOAT)) {
    //         $errors[$key] = 'Это должно быть числом.';
    //     }
    // }

    foreach($required as $key) {
        if(empty($_POST[$key])) {
            $errors[$key] = 'Это поле надо заполнить.';
        }
    }

    // if(isset($_FILES['photo2']['name'])) {
    //     $path = $_FILES['photo2']['name'];
    //     $res = move_uploaded_file($_FILES['photo2']['tmp_name'], 'img/'.$path);
    // }
    // if(isset($path)) {
    //     $lot['path'] = $path;
    // }

    if(count($errors)) {
        $page_content = renderTemplate('templates/add-template.php',
            [
                'lot' => $lot,
                'category' => $category,
                'errors' => $errors
            ]);
    } else {
        $page_content = renderTemplate('templates/lot.php',
        [
            'lot' => $lot,
            'category' => $category
        ]);
    }
} else {
    $page_content = renderTemplate('templates/add-template.php',
            [
                'category' => $category,
            ]);
}

$layout_content = renderTemplate('templates/layout.php',[
    'title' => 'Добавление лота',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'content' => $page_content,
    'category' => $category ]);

print($layout_content);
?>
