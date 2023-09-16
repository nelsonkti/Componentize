<?php
/**
 * 字段基类
 *
 * @author nelsons
 * @time 2023-09-08 14:14:52
 */

namespace Nelsons\Componentize\Grid\Export;

trait HasFields
{
    /**
     * @var  Fields
     */
    protected $exportFields;

    protected function initExportFields()
    {
        $this->exportFields = new Fields();
    }
}