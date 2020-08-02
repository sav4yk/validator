<?php

namespace app\Rules;

use app\core\Rules;

/**
 * Пример класса правила проверки максимально допустимого числа
 *
 * @author Vladimir Savchuk
 * @link http://www.sav4yk.ru/
 */
class MaxnumberRule implements Rules
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
        return (isset($param) && $data <= $param);
    }
}