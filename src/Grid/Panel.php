<?php
/**
 * 面板类型
 *
 * @author nelsons
 * @time 2023-09-15 10:57:10
 */

namespace Nelsons\Componentize\Grid;

class Panel
{
    protected $type = 'panel';
    protected $name;
    protected $label;
    protected $template_id;
    protected $iterm = [];

    public function __construct($name, $label = '')
    {
        $this->name = $name;
        $this->label = $label ?: $name;
    }

    public function template($template_id)
    {
        $this->template_id = $template_id;
    }

    public function render(): array
    {
        $res = [
            'type' => $this->type,
            'name' => $this->name,
            'label' => $this->label,
            'template_id' => $this->template_id,
        ];
        return array_merge($res, $this->iterm);
    }


}