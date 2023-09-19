<?php
/**
 * 开关组件
 *
 * @author nelsons
 * @time 2023-09-06 18:57:19
 */

namespace Nelsons\Componentize\Grid\Filter;

use Nelsons\Componentize\RenderAble;

class SwitchField extends AbstractFilter implements RenderAble
{
    protected $type = 'switch';

    protected $state;

    /**
     * 开关值
     *
     * @param $value
     * @return $this
     * @author 傅增耀
     * @time 2023-09-18 10:01:38
     */
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