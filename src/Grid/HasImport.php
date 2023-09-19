<?php
/**
 * 导出类
 *
 * @author nelsons
 * @time 2023-09-07 10:09:18
 */

namespace Nelsons\Componentize\Grid;

trait HasImport
{
    /**
     * @var  Export
     */
    protected $import;

    protected function initImport(): self
    {
        $this->import = new Import();
        return $this;
    }
}