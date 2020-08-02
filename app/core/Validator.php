<?php

namespace app\core;

/**
 * Validator - класс, запускающий для каждого элемента формы
 *
 * Примеры использования указаны в классах Forms\FormFind и Forms\FormProfile
 *
 * @author Vladimir Savchuk
 * @link http://www.sav4yk.ru/
 */
class Validator extends AbstractValidator
{
    /**
     * @var string[] массив формулировок ошибок
     */
    public $errorText = [
        'required' => ' обязательно к заполнению',
        'numeric' => ' может быть только числом',
        'string' => ' может быть только строкой',
        'minnumber' => ' слишком мальнькое',
        'maxnumber' => ' слишком большое',
        'minlength' => ' слишком короткое',
        'maxlength' => ' слишком длинное',
        'email' => ' содержит неправильный адрес почты'
    ];

    /**
     * @var array массив правил
     */
    private $rules;

    /**
     * @var array массив значений элементов формы
     */
    private $data;

    /**
     * Validator constructor.
     * @param array $rules массив правил
     * @param array $data массив значений элементов формы
     */
    public function __construct(array $rules, array $data)
    {
        $this->rules = $rules;
        $this->data = $data;
    }

    /**
     * Поочередная проверка каждого элемента формы на каждое заданное правило
     *
     * @return array|false массив ошибок|наличие ошибок
     */
    public function validate()
    {
        $errors = [];
        foreach ($this->rules as $item) {
            foreach ($item[1] as $key => $val) {
                if (!isset($this->data[$item[0]])) {
                    $this->data[$item[0]] = '';
                }
                if (is_numeric($key)) {
                    $rule = $val;
                    $param = '';
                } else {
                    $rule = $key;
                    $param = $val;
                }
                $error = $this->errorText[$rule];
                $rule = 'app\Rules\\' . $rule . 'Rule';

                $this->setRule(new $rule());
                $result = $this->checkError($this->data[$item[0]], $param);
                if (!$result) $errors[] = 'Значение поля ' . $item[0] . $error;
            }
        }
        if (count($errors) > 0) {
            return $errors;
        } else {
            return false;
        }
    }

}