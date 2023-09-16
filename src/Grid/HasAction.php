<?php
/**
 * 文件描述
 *
 * @author nelsons
 * @time 2023-09-06 12:24:49
 */

namespace Nelsons\Componentize\Grid;

trait HasAction
{
    /**
     * @var Action
     */
    protected $action;

    protected function initAction()
    {
        $this->action = new Action();
        return $this;
    }

}