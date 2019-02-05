<?php
/**
 * Created by PhpStorm.
 * User: ivnikon
 * Date: 05.01.2019
 * Time: 17:07
 */

function renderTemplate($template, $args){
    extract($args);
    if(!file_exists($template)) {
        return "";
    }
    ob_start();
    require_once($template);
    return ob_get_clean();
}

function format_price($price) {
    $price = ceil($price);
    if($price >= 1000) {
        $price = number_format($price, 0, ".", " ");
    }
    return $price . "<b class=\"rub\">р</b>";
}

function esc($str) {
    return htmlspecialchars($str);
}

function time_to_midnight() {
    $hours = 24 - date('H');
    $minuts = 60 - date('i');
    return $hours.':'.$minuts;
}

function get_lot_by_id($id,$lots) {
    foreach($lots as $item) {
        if($item['id'] == $id) {
            return $item;
        }
    }
}

function get_user_by_email($email,$users) {
    foreach($users as $item) {
        if($item['email'] == $email) {
            return $item;
        }
    }
    return false;
}
