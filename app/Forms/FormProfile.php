<?php

namespace app\Forms;

use app\core\AbstractForm;

/**
 * Пример формы для страницы "Профиль пользователя"
 *
 * @author Vladimir Savchuk
 * @link http://www.sav4yk.ru/
 */
class FormProfile extends AbstractForm
{
    /**
     * @var string[] массив параметров формы
     */
    private $form_attr = [
        'name' => 'profile',
        'action' => '',
        'method' => 'post'
    ];

    /**
     * @var string[] массив элементов формы
     */
    private $fields = [
        ['text', 'name', ['required', 'string', 'minlength' => 3]],
        ['number', 'age', ['numeric', 'minnumber' => 18, 'maxnumber'=>100]],
        ['textarea', 'about', ['maxlength' => 100, 'minlength' => 10]],
        ['checkbox', 'agree',['required']],
        ['text', 'email', ['email']],
    ];

    /**
     * @var string[] массив названий элементов формы
     */
    private $filedLabels = [
        'name' => 'Ваше имя:',
        'age' => 'Ваш возраст:',
        'about' => 'Немного о себе:',
        'agree' => 'Мне больше 18ти',
        'email' => 'Ваша почта:',
    ];

    /**
     * FormProfile constructor.
     */
    public function __construct()
    {
        parent::__construct($this->form_attr, $this->fields, $this->filedLabels);
    }
}
