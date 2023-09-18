<?php
/**
 * 文本区域组件
 *
 * @author nelsons
 * @time 2023-09-06 18:54:07
 */

namespace Nelsons\Componentize\Form\Field;

use Nelsons\Componentize\Form\Field;
use Nelsons\Componentize\RenderAble;

class Textarea extends Field implements RenderAble
{
    protected $type = 'textarea';

    protected $option;
    protected $fields = [];

    /**
     * 限制多少行
     *
     * @param int $rows
     * @return void
     * @author 傅增耀
     * @time 2023-09-18 09:56:18
     */
    public function rows(int $rows)
    {
        $this->fields['rows'] = $rows;
    }

    public function render(): array
    {
        $this->fields['options'] = $this->option;

        return array_merge(parent::render(), $this->fields);
    }
}