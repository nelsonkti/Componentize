<?php

/**
 * 字段
 *
 * @author nelsons
 * @time 2023-09-08 12:19:44
 */

namespace Nelsons\Componentize\Grid\Export;

use Nelsons\Componentize\Grid\Filter\Cascader;
use Nelsons\Componentize\Grid\Filter\Checkbox;
use Nelsons\Componentize\Grid\Filter\Column;
use Nelsons\Componentize\Grid\Filter\Datetime;
use Nelsons\Componentize\Grid\Filter\DateTimeRange;
use Nelsons\Componentize\Grid\Filter\MultipleSelect;
use Nelsons\Componentize\Grid\Filter\Number;
use Nelsons\Componentize\Grid\Filter\NumberRange;
use Nelsons\Componentize\Grid\Filter\Radio;
use Nelsons\Componentize\Grid\Filter\Select;
use Nelsons\Componentize\Grid\Filter\SwitchField;

/**
 * Class Filter.
 *
 * @method Checkbox  checkbox($column, $label = '')
 */
class Fields
{
    use HasFields;

    protected $columns = [];

    public static $fieldClassMap = [
        'cascader' => Cascader::class,
        'checkbox' => Checkbox::class,
        'column' => Column::class,
        'datetime' => Datetime::class,
        'datetimeRange' => DatetimeRange::class,
        'number' => Number::class,
        'numberRange' => NumberRange::class,
        'radio' => Radio::class,
        'switch' => SwitchField::class,
        'select' => Select::class,
        'multipleSelect' => MultipleSelect::class,
    ];


    public function render()
    {
        $res = [];
        foreach ($this->columns as $v) {
            $res[] = $v->render();
        }

        return $res;
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

        throw new \Exception("Field type [$method] does not exists");
    }

}