<?php

namespace app\Forms;

use app\core\AbstractForm;

/**
 * Пример формы для элемента "Поиск"
 *
 * @author Vladimir Savchuk
 * @link http://www.sav4yk.ru/
 */
class FormFind extends AbstractForm
{
    /**
     * @var string[] массив параметров формы
     */
    private $form_attr = [
        'name' => 'find',
        'action' => '',
        'method' => 'get'
    ];

    /**
     * @var string[] массив элементов формы
     */
    private $fields = [
        ['text', 'find', ['required', 'string', 'maxlength'=>100]],
    ];

    /**
     * @var string[] массив названий элементов формы
     */
    private $filedLabels = [
        'find' => 'Поиск:',
    ];

    /**
     * FormFind constructor.
     */
    public function __construct()
    {
        parent::__construct($this->form_attr, $this->fields, $this->filedLabels);
    }


}
