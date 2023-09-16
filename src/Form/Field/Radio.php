<?php
/**
 * radio 组件
 *
 * @author nelsons
 * @time 2023-09-06 18:52:06
 */

namespace Nelsons\Componentize\Form\Field;

use Nelsons\Componentize\Common\Transformer;
use Nelsons\Componentize\Form\Field;
use Nelsons\Componentize\RenderAble;

class Radio extends Field implements RenderAble
{
    use Transformer;

    protected $type = 'radio';

    protected $option;

    public function options(array $value): self
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