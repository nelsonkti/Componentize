<?php
/**
 * 导出组件
 *
 * @author nelsons
 * @time 2023-09-07 10:04:02
 */

namespace Nelsons\Componentize\Grid;

use Nelsons\Componentize\Grid\Export\HasFields;
use Nelsons\Componentize\Grid\Filter\Cascader;
use Nelsons\Componentize\Grid\Filter\Checkbox;
use Nelsons\Componentize\Grid\Filter\Column;
use Nelsons\Componentize\Grid\Filter\Datetime;
use Nelsons\Componentize\Grid\Filter\DateTimeRange;
use Nelsons\Componentize\Grid\Filter\MultipleSelect;
use Nelsons\Componentize\Grid\Filter\Number;
use Nelsons\Componentize\Grid\Filter\NumberRange;
use Nelsons\Componentize\Grid\Filter\Radio;
use Nelsons\Componentize\Grid\Filter\SwitchField;
use Nelsons\Componentize\Grid\Filter\Select;

/**
 * Class Filter.
 *
 * @method Cascader            cascader($column, $label = '')
 * @method Checkbox            checkbox($column, $label = '')
 * @method Column              column($column, $label = '')
 * @method Datetime            datetime($column, $label = '')
 * @method DatetimeRange       datetimeRange($column, $label = '')
 * @method Number              number($column, $label = '')
 * @method NumberRange         numberRange($column, $label = '')
 * @method Radio               radio($column, $label = '')
 * @method SwitchField         switch ($column, $label = '')
 * @method Select              select($column, $label = '')
 * @method MultipleSelect      multipleSelect ($column, $label = '')
 */
class Export
{
    use HasFields;

    public function __construct()
    {
        $this->initExportFields();
    }

    protected $ajax;
    protected $columns = [];
    protected $fields = [];
    protected $templateId = '';

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


    public function ajax($url): self
    {
        $this->fields['url'] = $url;
        return $this;
    }

    /**
     * 标题
     *
     * @param $title
     * @return $this
     * @author nelsons
     * @time 2023-09-07 11:17:25
     */
    public function title($title): self
    {
        $this->fields['title'] = $title;
        return $this;
    }

    /**
     * 是否是异步导出
     *
     * @return $this
     * @author nelsons
     * @time 2023-09-11 11:52:57
     */
    public function async(): self
    {
        $this->fields['async'] = true;
        return $this;
    }

    /**
     * 模板
     *
     * @param $template_id
     * @return void
     * @author nelsons
     * @time 2023-09-06 17:49:50
     */
    public function template($template_id): self
    {
        $this->fields['template_id'] = $template_id;
        return $this;
    }

    /**
     * 导出字段
     *
     * @param $label
     * @param \Closure $callback
     * @return void
     * @author nelsons
     * @time 2023-09-25 09:11:31
     */
    public function fields($label, \Closure $callback)
    {
        call_user_func($callback, $this->exportFields);
        $this->fields['fields']['label'] = $label;
        $this->fields['fields']['columns'] = $this->exportFields->render();
    }


    public function render()
    {
        $res = [];
        foreach ($this->columns as $column) {
            $res['filter'][] = $column->render();
        }

        return array_merge($this->fields, $res);
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