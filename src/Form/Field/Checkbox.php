<?php
/**
 * 复选框组件
 *
 * @author nelsons
 * @time 2023-09-06 18:37:50
 */

namespace Nelsons\Componentize\Form\Field;

use Nelsons\Componentize\Common\Transformer;
use Nelsons\Componentize\Form\Field;
use Nelsons\Componentize\RenderAble;

class Checkbox extends Field implements RenderAble
{
    use Transformer;

    protected $type = 'checkbox';

    protected $option;

    public function options(array $value): self
    {
        $this->option = $this->optionsToLabel($value);
        return $this;
    }

    public function render(): array
    {
        $res = array('options' => $this->option);
        return array_merge(parent::render(), $res);
    }
}