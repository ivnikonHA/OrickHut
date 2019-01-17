<?php
date_default_timezone_set("Europe/Moscow");
require_once 'functions.php';
$is_auth = rand(0, 1);

$user_name = 'ivnikon'; // укажите здесь ваше имя
$user_avatar = 'img/user.jpg';

$category = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];
$lots = [
    [
        'name' => '2014 Rossignol District Snowboard',
        'category' => $category[0],
        'price' => 10999,
        'picture' => 'img/lot-1.jpg'
    ],
    [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => $category[0],
        'price' => 159999,
        'picture' => 'img/lot-2.jpg'
    ],
    [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => $category[1],
        'price' => 8000,
        'picture' => 'img/lot-3.jpg'
    ],
    [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => $category[2],
        'price' => 10999,
        'picture' => 'img/lot-4.jpg'
    ],
    [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => $category[3],
        'price' => 7500,
        'picture' => 'img/lot-5.jpg'
    ],
    [
        'name' => 'Маска Oakley Canopy',
        'category' => $category[5],
        'price' => 5400,
        'picture' => 'img/lot-6.jpg'
    ]
];

$page_content = renderTemplate('templates/index.php', ['lots'=>$lots]);
$layout_content = renderTemplate('templates/layout.php',[
    'title' => 'OrickHub - Main',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'content' => $page_content,
    'category' => $category ]);

print($layout_content);
?>

