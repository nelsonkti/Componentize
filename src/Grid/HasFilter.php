<?php
/**
 * 过滤器
 *
 * @author nelsons
 * @time 2023-09-04 11:08:57
 */

namespace Nelsons\Componentize\Grid;

trait HasFilter
{
    /**
     * @var  Filter
     */
    protected $filter;

    protected function initFilter(): self
    {
        $this->filter = new Filter();
        return $this;
    }
}