<?php
/**
 * 导入
 *
 * @author nelsons
 * @time 2023-09-14 12:26:15
 */

namespace Nelsons\Componentize\Grid;

use Nelsons\Componentize\Form\Field\Checkbox;
use Nelsons\Componentize\Form\Field\Datetime;
use Nelsons\Componentize\Form\Field\DatetimeRange;
use Nelsons\Componentize\Form\Field\File;
use Nelsons\Componentize\Form\Field\Image;
use Nelsons\Componentize\Form\Field\MultipleFile;
use Nelsons\Componentize\Form\Field\MultipleImage;
use Nelsons\Componentize\Form\Field\MultipleSelect;
use Nelsons\Componentize\Form\Field\Number;
use Nelsons\Componentize\Form\Field\Radio;
use Nelsons\Componentize\Form\Field\Select;
use Nelsons\Componentize\Form\Field\SwitchField;
use Nelsons\Componentize\Form\Field\Text;
use Nelsons\Componentize\Form\Field\Textarea;
use Nelsons\Componentize\Form\Field\Transfer;
use Nelsons\Componentize\Grid\Import\HasDisplay;

/**
 * Class Form.
 *
 * @method Checkbox             checkbox($column, $label = '')
 * @method Datetime             datetime($column, $label = '')
 * @method DatetimeRange        datetimeRange($column, $label = '')
 * @method File                 file($column, $label = '')
 * @method MultipleSelect       multipleSelect($column, $label = '')
 * @method Number               number($column, $label = '')
 * @method Radio                radio($column, $label = '')
 * @method Select               select($column, $label = '')
 * @method SwitchField          switch ($column, $label = '')
 * @method Text                 text($column, $label = '')
 * @method Textarea             textarea($column, $label = '')
 */
class Import
{
    use HasDisplay;

    public function __construct()
    {
        $this->initDisplay();
    }

    protected $fields = [];
    protected $columns = [];
    protected $displays = [];
    protected $form = [];

    public static $fieldClassMap = [
        'checkbox' => Checkbox::class,
        'datetime' => Datetime::class,
        'datetimeRange' => DatetimeRange::class,
        'file' => File::class,
        'multipleSelect' => MultipleSelect::class,
        'number' => Number::class,
        'radio' => Radio::class,
        'select' => Select::class,
        'switch' => SwitchField::class,
        'text' => Text::class,
        'textarea' => Textarea::class,
        'transfer' => Transfer::class,
    ];


    public function ajax($url): self
    {
        $this->form['url'] = $url;
        return $this;
    }

    public function templateFileUrl($url)
    {
        $this->fields['template_file_url'] = $url;
    }

    public function display(\Closure $callback)
    {
        call_user_func($callback, $this->display);
        $this->displays = $this->display->render();
    }

    /**
     * 模板
     *
     * @param $template_id
     * @return void
     * @author nelsons
     * @time 2023-09-06 17:49:50
     */
    public function template($template_id)
    {
        $this->fields['template_id'] = $template_id;
    }

    public function render()
    {
        foreach ($this->columns as $column) {
            $this->form['columns'][] = $column->render();
        }

        $this->fields['form'] = $this->form;
        $this->fields['display'] = $this->displays;

        return $this->fields;
    }

    /**
     * 获取字段类
     *
     * @param $method
     * @return string|null
     * @author nelsons
     * @time 2023-09-06 15:42:59
     */
    public static function findClass($method)
    {
        if (isset(self::$fieldClassMap[$method]) && class_exists(self::$fieldClassMap[$method])) {
            return self::$fieldClassMap[$method];
        }
        return null;
    }

    public function __call($method, $arguments)
    {
        if ($className = static::findClass($method)) {
            $column = $arguments[0] ?? '';
            $element = new $className($column, array_slice($arguments, 1));
            $this->columns[] = $element;
            return $element;
        }

        Exception("Field type [$method] does not exists");
    }

}