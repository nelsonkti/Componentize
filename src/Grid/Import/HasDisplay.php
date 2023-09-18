<?php
/**
 * 显示
 *
 * @author nelsons
 * @time 2023-09-14 16:35:52
 */

namespace Nelsons\Componentize\Grid\Import;


trait HasDisplay
{
    /**
     * @var  Display
     */
    protected $display;

    protected function initDisplay()
    {
        $this->display = new Display();
    }
}