<?php
/**
 * 多个文件 组件
 *
 * @author nelsons
 * @time 2023-09-06 19:17:33
 */

namespace Nelsons\Componentize\Form\Field;

use Nelsons\Componentize\Common\Transformer;
use Nelsons\Componentize\Form\Field;
use Nelsons\Componentize\RenderAble;

class MultipleFile extends Field implements RenderAble
{
    use Transformer;

    protected $type = 'multiple-file';

    protected $option;
    protected $sortable = false;
    protected $downloadable = false;

    public function options(array $value): self
    {
        $this->option = $this->optionsToLabel($value);
        return $this;
    }

    public function downloadable(): self
    {
        $this->downloadable = true;
        return $this;
    }

    public function sortable(): self
    {
        $this->sortable = true;
        return $this;
    }

    public function render(): array
    {
        $res = [
            'options' => $this->option,
            'downloadable' => $this->downloadable,
        ];
        return array_merge(parent::render(), $res);
    }
}