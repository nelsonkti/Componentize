<?php
/**
 * 多选组件
 *
 * @author nelsons
 * @time 2023-09-06 18:53:15
 */

namespace Nelsons\Componentize\Grid\Filter;

use Nelsons\Componentize\Common\Transformer;
use Nelsons\Componentize\RenderAble;

class MultipleSelect extends AbstractFilter implements RenderAble
{
    use Transformer;

    protected $type = 'multiple-select';

    protected $option;
    protected $ajax;
    protected $fields;

    public function options($value): self
    {
        $this->option = $this->optionsToLabel($value);
        return $this;
    }

    public function ajax($url): self
    {
        $this->ajax = $url;
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