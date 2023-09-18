<?php
/**
 * 文件描述
 *
 * @author nelsons
 * @time 2023-09-06 15:26:10
 */

namespace Nelsons\Componentize\Form;

class Field
{
    protected $type = '';
    protected $rule;
    protected $column;
    protected $label;
    protected $icon;
    protected $default;
    protected $placeholder;
    protected $required;
    protected $disable;

    public function __construct($column, $arguments = [])
    {
        $this->column = $column;
        $this->label = $this->formatLabel($arguments) ?: $column;
    }

    /**
     * label 格式
     *
     * @param array $arguments
     * @return mixed|string
     * @author 傅增耀
     * @time 2023-09-18 09:58:01
     */
    protected function formatLabel(array $arguments = [])
    {
        $column = is_array($this->column) ? current($this->column) : $this->column;

        return $arguments[0] ?? ucfirst($column);
    }

    /**
     * 规则
     *
     * @param $rule
     * @return $this
     * @author 傅增耀
     * @time 2023-09-18 09:56:43
     */
    public function rules($rule): self
    {
        $this->rule = $rule;
        return $this;
    }

    /**
     * 默认值
     *
     * @param $default
     * @return $this
     * @author 傅增耀
     * @time 2023-09-18 09:57:52
     */
    public function default($default): self
    {
        $this->default = $default;

        return $this;
    }

    /**
     * 输入框提示
     *
     * @param $value
     * @return $this
     * @author 傅增耀
     * @time 2023-09-18 09:56:54
     */
    public function placeholder($value): self
    {
        $this->placeholder = $value;
        return $this;
    }

    public function icon($icon): self
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * 是否必须
     *
     * @param bool $isRequired
     * @return $this
     * @author 傅增耀
     * @time 2023-09-18 09:57:28
     */
    public function required(bool $isRequired = true): self
    {
        $this->required = $isRequired;
        return $this;
    }

    /**
     * 是否禁用
     *
     * @return $this
     * @author 傅增耀
     * @time 2023-09-18 09:57:16
     */
    public function disable(): self
    {
        $this->disable = true;
        return $this;
    }

    public function render(): array
    {
        return [
            'type' => $this->type,
            'column' => $this->column,
            'label' => $this->label,
            'icon' => $this->icon,
            'rule' => $this->rule,
            'default' => $this->default,
            'required' => $this->required,
            'placeholder' => $this->placeholder,
        ];
    }
}