<?php
/**
 * 文件描述
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

    public function default($value)
    {
        $this->default = $value;
    }


    protected function formatLabel($arguments = [])
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