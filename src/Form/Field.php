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

    protected function formatLabel($arguments = [])
    {
        $column = is_array($this->column) ? current($this->column) : $this->column;

        return $arguments[0] ?? ucfirst($column);
    }


    public function rules($rule): self
    {
        $this->rule = $rule;
        return $this;
    }

    public function default($default): self
    {
        $this->default = $default;

        return $this;
    }

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

    public function required($isRequired = true): self
    {
        $this->required = $isRequired;
        return $this;
    }

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