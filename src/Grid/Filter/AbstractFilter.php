<?php
/**
 * 过滤器
 *
 * @author nelsons
 * @time 2023-09-07 15:31:18
 */

namespace Nelsons\Componentize\Grid\Filter;

abstract class AbstractFilter
{
    protected $column;
    protected $label;
    protected $type;
    protected $default;

    public function __construct($column, $arguments = [])
    {
        $this->column = $column;
        $this->label = $this->formatLabel($arguments) ?: $column;
    }

    /**
     * 默认
     *
     * @param $value
     * @return void
     * @author 傅增耀
     * @time 2023-09-18 09:59:22
     */
    public function default($value)
    {
        $this->default = $value;
    }

    /**
     * label格式
     *
     * @param array $arguments
     * @return mixed|string
     * @author 傅增耀
     * @time 2023-09-18 09:59:12
     */
    protected function formatLabel(array $arguments = [])
    {
        $column = is_array($this->column) ? current($this->column) : $this->column;

        return $arguments[0] ?? ucfirst($column);
    }

    public function render()
    {
        return [
            'column' => $this->column,
            'label' => $this->label,
            'type' => $this->type,
            'default' => $this->default,
        ];
    }
}