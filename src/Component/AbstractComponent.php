<?php
/**
 * 抽象组件类
 *
 * @author nelsons
 * @time 2023-09-22 15:04:58
 */

namespace Nelsons\Componentize\Common;

abstract class AbstractComponent extends Component
{
    abstract public function list();

    abstract public function filter();

    abstract public function action();

    abstract public function export();

    abstract public function import();
}