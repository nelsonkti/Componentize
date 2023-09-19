<?php
/**
 * 复选框 组件库
 *
 * @author nelsons
 * @time 2023-09-06 18:37:50
 */

namespace Nelsons\Componentize\Grid\Filter;

use Nelsons\Componentize\Common\Transformer;
use Nelsons\Componentize\RenderAble;

class Checkbox extends AbstractFilter implements RenderAble
{
    use Transformer;

    protected $type = 'checkbox';

    protected $ajax = [];
    protected $option = [];
    protected $canCheckAll = false;

    public function options(array $value): self
    {
        $this->option = $this->optionsToLabel($value);
        return $this;
    }

    /**
     * 是否允许全选
     *
     * @return $this
     * @author 傅增耀
     * @time 2023-09-18 10:00:50
     */
    public function canCheckAll(): self
    {
        $this->canCheckAll = true;
        return $this;
    }

    public function render(): array
    {
        $res = [
            'options' => $this->option,
            'can_check_all' => $this->canCheckAll,
        ];
        return array_merge(parent::render(), $res);
    }

}