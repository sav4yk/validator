<?php

namespace app\core;

/**
 * AbstractValidator - класс определяющий правило(объект правила),
 * по которому будет проверяться определенный элемент формы
 */
abstract class AbstractValidator
{
    /**
     * @var Rules объект правил
     */
    private $rule;

    /**
     * Установка объекта
     * @param Rules $rule
     */
    public function setRule(Rules $rule)
    {
        $this->rule = $rule;
    }

    /**
     * Делегирование выполнения проверки одному из классов правил.
     * @param string $data значение элемента формы
     * @param string $param параметр проверки
     * @return bool результат проверки
     */
    public function checkError($data, $param = '')
    {
        return $this->rule->doValidate($data, $param);
    }

}
