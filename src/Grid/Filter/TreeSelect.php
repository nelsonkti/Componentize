<?php
/**
 * 树选择
 *
 * @author nelsons
 * @time 2023-09-11 12:04:24
 */

namespace Nelsons\Componentize\Grid\Filter;

use Nelsons\Componentize\Common\Transformer;
use Nelsons\Componentize\RenderAble;

class TreeSelect extends AbstractFilter implements RenderAble
{
    use Transformer;

    protected $type = 'tree-select';

    protected $option;
    protected $ajax;
    protected $fields;
    protected $multiple = false;

    public function options($value): self
    {
        $this->option = $value;
        return $this;
    }

    public function ajax($url): self
    {
        $this->ajax = $url;
        return $this;
    }

    public function multiple(): self
    {
        $this->multiple = true;
        return $this;
    }

    public function render(): array
    {
        $res = [
            'options' => $this->option,
            'url' => $this->ajax,
        ];
        return array_merge(parent::render(), $res);
    }
}