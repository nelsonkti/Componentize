<?php
/**
 * 图标
 *
 * @author nelsons
 * @time 2023-09-15 16:32:10
 */

namespace Nelsons\Componentize\Grid;

class Echarts
{
    protected $type = 'echarts';
    protected $name;
    protected $label;
    protected $template_id;
    protected $echarts_type = '';
    protected $iterm = [];

    public function __construct($name, $label = '')
    {
        $this->name = $name;
        $this->label = $label ?: $name;
    }

    /**
     * 类型
     *
     * @param $type
     * @return $this
     * @author nelsons
     * @time 2023-09-15 17:16:41
     */
    public function type($type): self
    {
        $this->echarts_type = $type;
        return $this;
    }

    public function render(): array
    {
        $res = [
            'type' => $this->type,
            'name' => $this->name,
            'label' => $this->label,
            'echarts_type' => $this->echarts_type,
        ];
        return array_merge($res, $this->iterm);
    }
}