<?php
/**
 * 级联组件
 *
 * @author nelsons
 * @time 2023-09-07 16:09:57
 */

namespace Nelsons\Componentize\Grid\Filter;

use Nelsons\Componentize\Common\Transformer;
use Nelsons\Componentize\RenderAble;

class Cascader extends AbstractFilter implements RenderAble
{
    use Transformer;

    protected $type = 'cascader';
    protected $option = [];
    protected $ajax;

    public function options(array $value): self
    {
        $this->option = $this->optionsToLabel($value);
        return $this;
    }

    /**
     * 请求链接
     *
     * @param $url
     * @return $this
     * @author nelsons
     * @time 2023-09-18 10:00:32
     */
    public function ajax($url): self
    {
        $this->ajax = $url;
        return $this;
    }

    public function render(): array
    {
        $res = [
            'options' => $this->option,
            'url' => $this->ajax,
        ];
        return array_merge(parent::render(), $res);
    }
}