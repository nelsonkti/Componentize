<?php
/**
 * 切换组件
 *
 * @author nelsons
 * @time 2023-09-25 11:00:39
 */

namespace Nelsons\Componentize\Grid\Filter;

use Nelsons\Componentize\Common\Transformer;
use Nelsons\Componentize\RenderAble;

class Toggle extends AbstractFilter implements RenderAble
{
    use Transformer;

    protected $type = 'toggle';

    protected $option;
    protected $ajax;
    protected $fields;

    public function options($value): self
    {
        $this->option = $this->optionsToLabel($value);
        return $this;
    }

    public function render(): array
    {
        $res = [
            'options' => $this->option,
        ];
        return array_merge(parent::render(), $res);
    }
}