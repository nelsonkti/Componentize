<?php
/**
 * 图片组件
 *
 * @author nelsons
 * @time 2023-09-06 19:05:09
 */

namespace Nelsons\Componentize\Form\Field;

use Nelsons\Componentize\Form\Field;
use Nelsons\Componentize\RenderAble;

class Image extends Field implements RenderAble
{
    protected $type = 'image';

    protected $downloadable;

    public function downloadable(): self
    {
        $this->downloadable = true;
        return $this;
    }

    public function render(): array
    {
        $res = [
            'downloadable' => $this->downloadable,
        ];
        return array_merge(parent::render(), $res);
    }
}