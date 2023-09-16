<?php
/**
 * 数字组件
 *
 * @author nelsons
 * @time 2023-09-06 19:11:05
 */

namespace Nelsons\Componentize\Form\Field;

use Nelsons\Componentize\Form\Field;
use Nelsons\Componentize\RenderAble;

class Number extends Field implements RenderAble
{
    protected $type = 'number';

    protected $format = 'int';

    public function format(string $value): self
    {
        $this->format = $value;
        return $this;
    }

    public function render(): array
    {
        $res = ['format' => $this->format];
        return array_merge(parent::render(), $res);
    }
}