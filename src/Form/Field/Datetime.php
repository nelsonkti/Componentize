<?php
/**
 * 日期时间组件
 *
 * @author nelsons
 * @time 2023-09-06 19:08:02
 */

namespace Nelsons\Componentize\Form\Field;

use Nelsons\Componentize\Form\Field;
use Nelsons\Componentize\Grid\TimeFormatTrait;
use Nelsons\Componentize\RenderAble;

class Datetime extends Field implements RenderAble
{
    use TimeFormatTrait;

    protected $type = 'datetime';

    protected $format = 'YYYY-MM-DD HH:mm:ss';

    public function render(): array
    {
        $res = ['format' => $this->format];
        return array_merge(parent::render(), $res);
    }
}