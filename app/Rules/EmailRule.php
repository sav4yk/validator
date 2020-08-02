<?php

namespace app\Rules;

use app\core\Rules;

/**
 * Пример класса правила проверки правильности почты(email)
 *
 * @author Vladimir Savchuk
 * @link http://www.sav4yk.ru/
 */
class EmailRule implements Rules
{
    /**
     * Выполнение делегированной проверки
     *
     * @param string $data значение элемента формы
     * @param string $param параметр проверки
     * @return bool результат проверки
     */
    public function doValidate($data, $param = ''): bool
    {
        return (empty($data) || !(filter_var($data, FILTER_VALIDATE_EMAIL) == false));
    }
}