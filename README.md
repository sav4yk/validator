<p>
    <h1>Формы с валидацией</h1>
</p>

<p>Набор классов для быстрого создания и валидации форм.</p>
<p>Реализованы несколько популярных правил валидации. 
Добавляя свои классы в папку app\Rules и app\Forms, можно расширить существующий функционал под свои нужды. 
Примеры классов расположены в этих же папках.</p>
 

Структура папок
-------------------

    app/                    содержит все реализованные классы
        core/               содержит классы, реализующие логику валидации
        Forms/              содержит формы
        Rules/              содержит правила валидации
    web/                    содержит пример использования   

Использование
-------------
Скопируйте к себе в проект папку app. В файле, в котором хотите использовать форму с валидацией, напишите:
```php
use app\Forms\FormProfile;

$form = new FormProfile();
$form->create();

if (isset($_POST['profile_submit'])) {
    $form->save();
}
```
При необходимости создайте свои формы и правила или отредактируйте существующие

Конфигурация
-------------

### Правила

Для использования нового правила создайте класс app/Rules/[Your]Rule.php

```php
namespace app\Rules;

use app\core\Rules;

class YourRule implements Rules
{
    /**
     * Вместо $result пропишите свое условие валидации
     *
     * @param string $data значение элемента формы, которое присылает пользователь
     * @param string $param параметр проверки (например, $data>$param)
     * @return bool результат проверки (true - прошли данные проверкуб false - нет)
     */
    public function doValidate($data, $param = ''): bool
    {
        return $result;
    }
}
```
### Формы

Для использования новой формы создайте класс app/Forms/Form[New].php

```php
<?php

namespace app\Forms;

use app\core\AbstractForm;

class FormNew extends AbstractForm
{
    /**
     * Массив параметров формы:
     * name - имя формы
     * action - адрес, страницы валидации и сохранения результатов
     * method - метод отправки данных (POST/GET)
     */
    private $form_attr = [
        'name' => 'new',
        'action' => '',
        'method' => 'get'
    ];

    /**
     * Массив элементов формы:
     * формат - [type, name, [rule1, rule2]], где
     * type - тип поля (text, number, email, ulr, textarea)
     * name - имя элемента
     * rule1, rule2 - название правил (email, maxlength, minlength, maxnumber, minnumber, number, required, string)
     */
    private $fields = [
        ['text', 'find', ['required', 'string', 'maxlength'=>100]],
    ];

    /**
     * Массив названий элементов формы:
     * формат - name => title, где
     * name - имя элемента
     * title - название рядом с элементом формы
     */
    private $filedLabels = [
        'find' => 'Поиск:',
    ];

    /**
     * Конструктор формы (не имзенять).
     */
    public function __construct()
    {
        parent::__construct($this->form_attr, $this->fields, $this->filedLabels);
    }
}
```







