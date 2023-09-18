<?php

/**
 * 时间日期格式
 *
 * @author nelsons
 * @time 2023-09-07 16:53:47
 */

namespace Nelsons\Componentize\Grid;

trait TimeFormatTrait
{
    protected $format = 'YYYY-MM-DD HH:mm:ss';

    /**
     * 时间格式
     *
     * @param string $value
     * @return Filter\DateTimeRange|Filter\Datetime|TimeFormatTrait
     * @author nelsons
     * @time 2023-09-08 16:15:40
     */
    public function format(string $value): self
    {
        $this->format = $value;
        return $this;
    }

    /**
     * 日期
     *
     * @return Filter\DateTimeRange|Filter\Datetime|TimeFormatTrait
     * @author nelsons
     * @time 2023-09-08 16:15:54
     */
    public function date(): self
    {
        $this->format = 'YYYY-MM-DD';
        return $this;
    }

    /**
     * 时间
     *
     * @return Filter\DateTimeRange|Filter\Datetime|TimeFormatTrait
     * @author nelsons
     * @time 2023-09-08 16:16:05
     */
    public function time(): self
    {
        $this->format = 'HH:mm:ss';
        return $this;
    }

    /**
     * 年份
     *
     * @return Filter\DateTimeRange|Filter\Datetime|TimeFormatTrait
     * @author nelsons
     * @time 2023-09-08 16:16:13
     */
    public function year(): self
    {
        $this->format = 'YYYY';
        return $this;
    }

    /**
     * 月份
     *
     * @return Filter\DateTimeRange|Filter\Datetime|TimeFormatTrait
     * @author nelsons
     * @time 2023-09-08 16:16:19
     */
    public function month(): self
    {
        $this->format = 'MM';
        return $this;
    }

    /**
     * 几号
     *
     * @return Filter\DateTimeRange|Filter\Datetime|TimeFormatTrait
     * @author nelsons
     * @time 2023-09-08 16:17:08
     */
    public function day(): self
    {
        $this->format = 'DD';
        return $this;
    }
}