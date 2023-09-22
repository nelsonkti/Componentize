<?php
/**
 * 过滤器
 *
 * @author nelsons
 * @time 2023-09-07 15:31:18
 */

namespace Nelsons\Componentize\Grid\Filter;

use Nelsons\Componentize\Form\Field;

abstract class AbstractFilter
{
    protected $column;
    protected $label;
    protected $type;
    protected $default;
    protected $placeholder;

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
     * @author nelsons
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
     * @author nelsons
     * @time 2023-09-18 09:59:12
     */
    protected function formatLabel(array $arguments = [])
    {
        $column = is_array($this->column) ? current($this->column) : $this->column;

        return $arguments[0] ?? ucfirst($column);
    }

    /**
     * 输入框提示
     *
     * @param $value
     * @return $this
     * @author nelsons
     * @time 2023-09-18 09:56:54
     */
    public function placeholder($value): self
    {
        $this->placeholder = $value;
        return $this;
    }

    public function render()
    {
        return [
            'column' => $this->column,
            'label' => $this->label,
            'type' => $this->type,
            'default' => $this->default,
            'placeholder' => $this->placeholder,
        ];
    }
}