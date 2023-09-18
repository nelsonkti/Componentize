<?php

/**
 * 文本输入框
 *
 * @author nelsons
 * @time 2023-09-06 15:12:53
 */

namespace Nelsons\Componentize\Form\Field;

use Nelsons\Componentize\Form\Field;
use Nelsons\Componentize\RenderAble;

class Text extends Field implements RenderAble
{
    protected $type = 'input-text';
}