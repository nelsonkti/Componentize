<?php
/**
 * 组件接口
 *
 * @author nelsons
 * @time 2023-09-22 15:03:17
 */

namespace Nelsons\Componentize\Common;

interface ComponentInterface
{
    public function render(): array;
}