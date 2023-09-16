<?php
/**
 * 跳转
 *
 * @author nelsons
 * @time 2023-09-11 10:28:06
 */

namespace Nelsons\Componentize\Grid;

use Nelsons\Componentize\RenderAble;

class Url implements RenderAble
{
    protected $url = '';

    public function url($url): self
    {
        $this->url = $url;
        return $this;
    }

    public function render(): array
    {
        return [
            'url' => $this->url,
        ];
    }
}