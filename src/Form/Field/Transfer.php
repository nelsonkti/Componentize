<?php
/**
 * 穿梭器
 *
 * @author nelsons
 * @time 2023-09-06 19:13:04
 */

namespace Nelsons\Componentize\Form\Field;

use Nelsons\Componentize\Common\Transformer;
use Nelsons\Componentize\Form\Field;
use Nelsons\Componentize\RenderAble;

class Transfer extends Field implements RenderAble
{
    use Transformer;

    protected $type = 'transfer';

    protected $option;

    public function options(array $value): self
    {
        $this->option = $this->optionsToLabel($value);
        return $this;
    }

    public function render(): array
    {
        $res = array('options' => $this->option);
        return array_merge(parent::render(), $res);
    }
}