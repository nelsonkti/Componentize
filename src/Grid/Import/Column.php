<?php
/**
 * 字段组件
 *
 * @author nelsons
 * @time 2023-09-02 15:58:04
 */

namespace Nelsons\Componentize\Grid\Import;

class Column
{
    protected $type = 'text';
    protected $name;
    protected $label;
    protected $sortable = false;
    protected $style = '';
    protected $iterm = [];

    public function __construct($name, $label = '')
    {
        $this->name = $name;
        $this->label = $label ?: $name;
    }

    /**
     * 是否可以排序
     *
     * @return $this
     * @author nelsons
     * @time 2023-09-11 15:53:12
     */
    public function sortable(): self
    {
        $this->sortable = true;
        return $this;
    }

    /**
     * 设置style
     *
     * @param string $style
     * @return $this
     * @author nelsons
     * @time 2023-09-11 15:53:25
     */
    public function style(string $style): self
    {
        $this->iterm['style'] = $style;
        return $this;
    }

    /**
     * 标签
     *
     * @desc 颜色可选`danger`、`warning`、`info`、`primary`、`default`、`success`
     * @param string $style
     * @return $this
     * @author nelsons
     * @time 2023-09-11 15:33:14
     */
    public function label(string $style = 'success'): self
    {
        $this->type = 'label';
        $this->iterm['label_color'] = $style;
        return $this;
    }



    public function render(): array
    {
        $res = [
            'type' => $this->type,
            'name' => $this->name,
            'label' => $this->label,
            'sortable' => $this->sortable,
        ];
        return array_merge($res, $this->iterm);
    }
}