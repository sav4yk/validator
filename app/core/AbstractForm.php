<?php

namespace app\core;

/**
 * AbstractForm - абстрактный класс предназначенный для создания различных форм (<form></form>) и
 * валидации отправленных данных (с помощью класса core\Validator)
 *
 * Примеры применения в класса Forms\FormFind и Forms\FormProfile
 *
 * @author Vladimir Savchuk
 * @link http://www.sav4yk.ru/
 */
abstract class AbstractForm
{
    /**
     * описание
     *
     * @var array массив элементов формы
     */
    private $fields;

    /**
     * @var array массив параметров формы
     */
    private $form_attr;

    /**
     * @var array массив названий элементов формы
     */
    private $filedLabels;

    /**
     * AbstractForm constructor.
     * @param array $form_attr
     * @param array $fields
     * @param array $filedLabels
     */
    public function __construct($form_attr = [], $fields = [], $filedLabels = [])
    {
        $this->fields = $fields;
        $this->form_attr = $form_attr;
        $this->filedLabels = $filedLabels;
    }

    /**
     * Получение данных из массива $_REQUEST, валидация и сохраннеие получаемых данных
     *
     * @param array $data массив значений элементов формы
     * @return bool|string сохранение|вывод ошибок
     */
    public function save(array $data = [])
    {
        if (isset($_REQUEST[$this->form_attr['name'] . '_submit'])) {
            $data = [];
            foreach ($this->fields as $field) {
                if (isset($_REQUEST[$field[1]]))
                    $data[$field[1]] =
                        $_REQUEST[$field[1]];
            }
        }
        $validator = new Validator($this->getRules(), $data);
        $errors = $validator->Validate();
        if ($errors === false) {
            //saveData();
            echo "Data saved\n";
            return true;
        } else {
            foreach ($errors as $error) {
                print "<p>" . $error . "</p>";
            }
            return 'Ошибки';
        }
    }

    /**
     * Выборка массива правил из массива элементов формы
     *
     * @return array массив правил
     */
    private function getRules()
    {
        $rules = [];
        foreach ($this->fields as $field) {
            $rules[] = [$field[1], $field[2]];
        }
        return $rules;
    }

    /**
     * Создание и вывод html-разметки формы
     * @return string
     */
    public function create()
    {
        $form = '<form action="' . $this->form_attr['action'] . '" method="' . $this->form_attr['method'] . '">';
        foreach ($this->fields as $field) {
            if ($field[0] == 'textarea') {
                $form .= '<p>' . $this->filedLabels[$field[1]] .
                    ' <textarea name="' . $field[1] . '" /></textarea></p>';
            } elseif ($field[0] == 'checkbox') {
                $form .= '<p>' . $this->filedLabels[$field[1]] .
                    ' <input type="' . $field[0] . '" name="' . $field[1] . '" value="agree"  /></p>';
            } else
            $form .= '<p>' . $this->filedLabels[$field[1]] .
                ' <input type="' . $field[0] . '" name="' . $field[1] . '" value=""  /></p>';
        }
        $form .= '<p><input type="submit" name="' . $this->form_attr['name'] . '_submit"/></p></form>';
        echo $form;
    }

}