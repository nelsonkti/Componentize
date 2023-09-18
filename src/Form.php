<?php
/**
 * 表单
 *
 * @author nelsons
 * @time 2023-09-06 15:08:02
 */

namespace Nelsons\Componentize;

use Form\Field\Checkbox;
use Form\Field\Datetime;
use Form\Field\DateTimeRange;
use Form\Field\File;
use Nelsons\Componentize\Form\Field\Image;
use Nelsons\Componentize\Form\Field\MultipleFile;
use Nelsons\Componentize\Form\Field\MultipleImage;
use Nelsons\Componentize\Form\Field\MultipleSelect;
use Nelsons\Componentize\Form\Field\Number;
use Nelsons\Componentize\Form\Field\Radio;
use Nelsons\Componentize\Form\Field\SwitchField;
use Nelsons\Componentize\Form\Field\Text;
use Nelsons\Componentize\Form\Field\Select;
use Nelsons\Componentize\Form\Field\Textarea;
use Nelsons\Componentize\Form\Field\Transfer;

/**
 * Class Form.
 *
 * @method Checkbox             checkbox($column, $label = '')
 * @method Datetime             datetime($column, $label = '')
 * @method DatetimeRange        datetimeRange($column, $label = '')
 * @method File                 file($column, $label = '')
 * @method Image                image($column, $label = '')
 * @method MultipleFile         multipleFile($column, $label = '')
 * @method MultipleImage        multipleImage($column, $label = '')
 * @method MultipleSelect       multipleSelect($column, $label = '')
 * @method Number               number($column, $label = '')
 * @method Radio                radio($column, $label = '')
 * @method Select               select($column, $label = '')
 * @method SwitchField          switch ($column, $label = '')
 * @method Text                 text($column, $label = '')
 * @method Textarea             textarea($column, $label = '')
 * @method Transfer             transfer($column, $label = '')
 */
class Form
{
    protected $columns = [];
    protected $title = '';
    protected $url;

    public static $fields = [
        'checkbox' => Checkbox::class,
        'datetime' => Datetime::class,
        'datetimeRange' => DatetimeRange::class,
        'file' => File::class,
        'image' => Image::class,
        'multipleFile' => MultipleFile::class,
        'multipleImage' => MultipleImage::class,
        'multipleSelect' => MultipleSelect::class,
        'number' => Number::class,
        'radio' => Radio::class,
        'select' => Select::class,
        'switch' => SwitchField::class,
        'text' => Text::class,
        'textarea' => Textarea::class,
        'transfer' => Transfer::class,
    ];


    /**
     * 标题
     *
     * @param $name
     * @return void
     * @author nelsons
     * @time 2023-09-08 17:43:30
     */
    public function title($name)
    {
        $this->title = $name;
    }

    /**
     * 请求
     *
     * @param $name
     * @return void
     * @author nelsons
     * @time 2023-09-08 17:43:30
     */
    public function ajax($url)
    {
        $this->url = $url;
    }

    /**
     * 获取字段类
     *
     * @param $method
     * @return string|null
     * @author nelsons
     * @time 2023-09-06 15:42:59
     */
    public static function findFieldClass($method)
    {
        if (isset(self::$fields[$method]) && class_exists(self::$fields[$method])) {
            return self::$fields[$method];
        }
        return null;
    }

    /**
     * 提供
     *
     * @return array
     * @author nelsons
     * @time 2023-09-02 17:13:23
     */
    public function render(): array
    {
        $res = $columns = [];
        $res['title'] = $this->title;
        if ($this->url) {
            $res['url'] = $this->url;
        }
        foreach ($this->columns as $item) {
            $columns[] = $item->render();
        }
        $columns && $res['columns'] = $columns;
        return $res;
    }

    public function __call($method, $arguments)
    {
        if ($className = static::findFieldClass($method)) {
            $column = $arguments[0] ?? '';
            $element = new $className($column, array_slice($arguments, 1));
            $this->columns[] = $element;
            return $element;
        }

        throw new \Exception("Form's Field type [$method] does not exists");
    }
}