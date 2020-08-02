<?php

namespace web;
include '..\autoloader.php';

/**
 * Пример пользовательского скрипта использования форм с валидацией
 *
 * @author Vladimir Savchuk
 * @link http://www.sav4yk.ru/
 */

use app\Forms\FormFind;
use app\Forms\FormProfile;
?>
<h2>Пример использования скрипта формы с валидацией</h2>
<h3>Форма, которую можно использовать на странице "Профиль"</h3>
    <p>Форма: method - post, action - ''</p>
    <p>Имя: обязательно, строка, не менее 3 символов</p>
    <p>Возраст: число от 18 до 100</p>
    <p>О себе: от 10 до 100 символов</p>
    <p>Мне больше 18ти: обязательно</p>
    <p>Почта: правильный формат почты</p>
<?php
$form = new FormProfile();
$form->create();

if (isset($_POST['profile_submit'])) {
    $form->save();
}
?>
<hr>
<h3>Форма, которую можно использовать на странице "Поиск" или как отдельный элемент в header</h3>
    <p>Форма: method - get, action - ''</p>
    <p>Поиск: обязательно, строка, не более 100 символов</p>
<?php
$form = new FormFind();
$form->create();
if (isset($_GET['find_submit'])) {
    $form->save();
}