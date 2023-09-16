<?php
/**
 * 数字范围组件
 *
 * @author nelsons
 * @time 2023-09-07 16:06:34
 */

namespace Nelsons\Componentize\Grid\Filter;

use Nelsons\Componentize\RenderAble;

class NumberRange extends AbstractFilter implements RenderAble
{
    protected $type = 'number-range';

    protected $format = 'int';

    public function format(string $value): self
    {
        $this->format = $value;
        return $this;
    }

    public function render(): array
    {
        $res = [
            'format' => $this->format,
        ];
        return array_merge(parent::render(), $res);
    }

}