<?php
/**
 * 日期范围组件
 *
 * @author nelsons
 * @time 2023-09-06 19:10:18
 */

namespace Nelsons\Componentize\Grid\Filter;

use Nelsons\Componentize\Grid\TimeFormatTrait;
use Nelsons\Componentize\RenderAble;

class DateTimeRange extends AbstractFilter implements RenderAble
{
    use TimeFormatTrait;

    protected $type = 'datetime-range';

    public function render(): array
    {
        $res = array('format' => $this->format);
        return array_merge(parent::render(), $res);
    }
}