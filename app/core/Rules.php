<?php

namespace app\core;

/**
 * Rules - интерфейс, определяющий общую метод для всех поддерживаемых правил
 *
 * AbstractValidator использует этот интерфейс для вызова метода проверки
 * заданного правила
 */
interface Rules
{
    /**
     * Метод выполнения проверки одному правил
     *
     * @param string $data значение элемента формы
     * @param string $param параметр проверки
     * @return bool результат проверки
     */
    public function doValidate($data, $param = ''): bool;
}