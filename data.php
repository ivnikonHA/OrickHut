<?php

$is_auth = false;//rand(0, 1);

$user_name = 'ivnikon'; // укажите здесь ваше имя
$user_avatar = 'img/user.jpg';

$category = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];
$lots = [
    [
        'id' => 1,
        'name' => '2014 Rossignol District Snowboard',
        'category' => $category[0],
        'price' => 10999,
        'picture' => 'img/lot-1.jpg'
    ],
    [
        'id' => 2,
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => $category[0],
        'price' => 159999,
        'picture' => 'img/lot-2.jpg'
    ],
    [
        'id' => 3,
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => $category[1],
        'price' => 8000,
        'picture' => 'img/lot-3.jpg'
    ],
    [
        'id' => 4,
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => $category[2],
        'price' => 10999,
        'picture' => 'img/lot-4.jpg'
    ],
    [
        'id' => 5,
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => $category[3],
        'price' => 7500,
        'picture' => 'img/lot-5.jpg'
    ],
    [
        'id' => 6,
        'name' => 'Маска Oakley Canopy',
        'category' => $category[5],
        'price' => 5400,
        'picture' => 'img/lot-6.jpg'
    ]
];
