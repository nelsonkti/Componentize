<?php
/**
 * 开关类
 *
 * @author nelsons
 * @time 2023-09-13 16:14:37
 */

namespace Nelsons\Componentize\Grid;

class SwitchField
{
    protected $type = 'switch_action';
    protected $state;
    protected $name;
    protected $column;
    protected $url;

    public function __construct($column, $name)
    {
        $this->column = $column;
        $this->name = $name;
    }


    public function state($value): self
    {
        $this->state = $value;
        return $this;
    }

    public function url($url): self
    {
        $this->url = $url;
        return $this;
    }

    public function render(): array
    {
        return [
            'name' => $this->name,
            'column' => $this->column,
            'type' => $this->type,
            'state' => $this->state,
            'url' => $this->url
        ];
    }
}