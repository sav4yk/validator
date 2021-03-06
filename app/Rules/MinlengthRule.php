<?php

namespace app\Rules;

use app\core\Rules;

/**
 * Пример класса правила проверки минимальной длины строки
 *
 * @author Vladimir Savchuk
 * @link http://www.sav4yk.ru/
 */
class MinlengthRule implements Rules
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
        if (isset($data) && !empty($param)  && (mb_strlen($data) >= (int)$param))
            return true;
        elseif (!isset($data) || empty($data))
            return true;
        else
            return false;
    }
}