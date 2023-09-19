<?php
/**
 * 数字组件
 *
 * @author nelsons
 * @time 2023-09-06 19:11:05
 */

namespace Nelsons\Componentize\Grid\Filter;

use Nelsons\Componentize\RenderAble;

class Number extends AbstractFilter implements RenderAble
{
    protected $type = 'number';
}