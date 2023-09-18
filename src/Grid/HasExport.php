<?php
/**
 * 导出类型
 *
 * @author nelsons
 * @time 2023-09-07 10:09:18
 */

namespace Nelsons\Componentize\Grid;


trait HasExport
{
    /**
     * @var  Export
     */
    protected $export;

    protected function initExport(): self
    {
        $this->export = new Export();
        return $this;
    }
}