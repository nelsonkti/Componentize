<?php
/**
 * 日期时间组件
 *
 * @author nelsons
 * @time 2023-09-06 19:08:02
 */

namespace Nelsons\Componentize\Grid\Filter;

use Nelsons\Componentize\Grid\TimeFormatTrait;
use Nelsons\Componentize\RenderAble;

class Datetime extends AbstractFilter implements RenderAble
{
    use TimeFormatTrait;

    protected $type = 'datetime';

    public function render(): array
    {
        $res = ['format' => $this->format];
        return array_merge(parent::render(), $res);
    }
}