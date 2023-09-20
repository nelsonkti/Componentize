<?php
/**
 * 开关
 *
 * @author nelsons
 * @time 2023-09-06 18:57:19
 */

namespace Nelsons\Componentize\Form\Field;

use Nelsons\Componentize\Form\Field;
use Nelsons\Componentize\RenderAble;

class SwitchField extends Field implements RenderAble
{
    protected $type = 'switch';

    protected $state;

    public function state($value): self
    {
        $this->state = $value;
        return $this;
    }

    public function render(): array
    {
        $res = [
            'states' => $this->state,
        ];
        return array_merge(parent::render(), $res);
    }
}