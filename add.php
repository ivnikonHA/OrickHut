<?php
require_once 'functions.php';
require_once 'data.php';

if(!$is_auth) {
    http_response_code(403);
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;

    // var_dump($_POST);

    $required = ['name','category','message','price','lot-step','lot-date'];
    $numbers = ['price','lot-step'];
    $dict = [
        'name' => 'Название',
        'category' => 'Категория',
        'message' => 'Описание',
        'price' => 'Начальная цена',
        'lot-step' => 'Шаг ставки',
        'lot-date' => 'Дата окончания торгов'
    ];
    $errors = [];

    foreach($numbers as $key) {
        if(!is_numeric($lot[$key])) {
            $errors[$key] = 'Это должно быть числом.';
        }
    }

    foreach($required as $key) {
        if(empty($_POST[$key])) {
            $errors[$key] = 'Это поле надо заполнить.';
        }
    }

    if(isset($_FILES['picture']['name'])) {
        $path = 'img/'.$_FILES['picture']['name'];
        $res = move_uploaded_file($_FILES['picture']['tmp_name'], $path);
    }
    if(isset($path)) {
        $lot['picture'] = $path;
    }

    if(count($errors)) {
        // var_dump($errors);
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
