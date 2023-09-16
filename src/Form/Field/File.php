<?php
/**
 * 文件组件
 *
 * @author nelsons
 * @time 2023-09-06 19:01:53
 */

namespace Nelsons\Componentize\Form\Field;

use Nelsons\Componentize\Form\Field;
use Nelsons\Componentize\RenderAble;

class File extends Field implements RenderAble
{
    protected $type = 'file';

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