<?php
/**
 * 字段组件
 *
 * @author nelsons
 * @time 2023-09-02 17:20:20
 */

namespace Nelsons\Componentize\Grid\Filter;

use Nelsons\Componentize\RenderAble;

class Column extends AbstractFilter implements RenderAble
{
    protected $type = 'column';
}