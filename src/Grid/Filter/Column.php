<?php
/**
 * 字段组件
 *
 * @author nelsons
 * @time 2023-09-02 17:20:20
 */

namespace Nelsons\Componentize\Grid\Filter;

use Nelsons\Componentize\Form\Field\Radio;
use Nelsons\Componentize\Form\Field\Select;
use Nelsons\Componentize\Form\Field\Text;
use Nelsons\Componentize\Grid\Checkbox;
use Nelsons\Componentize\RenderAble;

class Column extends AbstractFilter implements RenderAble
{
    protected $type = 'column';
}