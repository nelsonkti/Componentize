<?php
/**
 * 抽象组件类
 *
 * @author nelsons
 * @time 2023-09-22 15:04:58
 */

namespace Nelsons\Componentize\Component;

abstract class AbstractComponent extends Component
{
    abstract protected function list();

    abstract protected function filter();

    abstract protected function action();

    abstract protected function export();

    abstract protected function import();

    abstract protected function page();
}