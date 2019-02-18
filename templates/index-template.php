<?php
/**
 * Created by PhpStorm.
 * User: ivnikon
 * Date: 05.01.2019
 * Time: 16:51
 */
?>
<main class="container">
<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
<p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
<ul class="promo__list">
    <!--заполните этот список из массива категорий-->
    <?php foreach ($category as $key => $val): ?>
        <li class="promo__item">
            <a class="promo__link" href="pages/all-lots.html"><?=$val['category_name']; ?></a>
        </li>
    <?php endforeach; ?>
</ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <!--заполните этот список из массива с товарами-->
        <?php foreach ($lots as $key => $val): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=$val['picture']; ?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=esc($val['category']); ?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.php?lot_id=<?=$val['id']; ?>"><?=esc($val['name']); ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?php print(format_price(esc($val['price']))); ?></span>
                        </div>
                        <div class="lot__timer timer">
                            <?=time_to_midnight() ?>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
</main>
