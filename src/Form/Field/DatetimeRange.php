<?php
/**
 * 日期时间范围组件
 *
 * @author nelsons
 * @time 2023-09-06 19:10:18
 */

namespace Nelsons\Componentize\Form\Field;

use Nelsons\Componentize\Form\Field;
use Nelsons\Componentize\RenderAble;

class DatetimeRange extends Field implements RenderAble
{
    protected $type = 'datetime-range';

    protected $format = 'YYYY-MM-DD HH:mm:ss';

    public function format(string $value): self
    {
        $this->format = $value;
        return $this;
    }

    public function render(): array
    {
        $res = [
            'format' => $this->format,
        ];
        return array_merge(parent::render(), $res);
    }
}