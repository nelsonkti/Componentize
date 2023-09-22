<?php
/**
 * 字段
 *
 * @author nelsons
 * @time 2023-09-02 15:58:04
 */

namespace Nelsons\Componentize\Grid;

class Column
{
    protected $type = 'text';
    protected $name;
    protected $label;
    protected $sortable = false;
    protected $style = '';
    protected $iterm = [];

    public function __construct($name, $label = '')
    {
        $this->name = $name;
        $this->label = $label ?: $name;
    }

    /**
     * 是否可以排序
     *
     * @return $this
     * @author nelsons
     * @time 2023-09-11 15:53:12
     */
    public function sortable(): self
    {
        $this->sortable = true;
        return $this;
    }

    /**
     * 设置style
     *
     * @param string $style
     * @return $this
     * @author nelsons
     * @time 2023-09-11 15:53:25
     */
    public function style(string $style): self
    {
        $this->iterm['style'] = $style;
        return $this;
    }

    /**
     * 标签
     *
     * @desc 颜色可选`danger`、`warning`、`info`、`primary`、`default`、`success`
     * @param string|array $style
     * @return $this
     * @author nelsons
     * @time 2023-09-11 15:33:14
     */
    public function label($style = 'success'): self
    {
        $this->type = 'label';
        $this->iterm['label_color'] = $style;
        return $this;
    }

    /**
     * 是否可以下载
     *
     * @return $this
     * @author nelsons
     * @time 2023-09-11 15:52:32
     */
    public function download(): self
    {
        $this->iterm['download'] = true;
        return $this;
    }

    /**
     * 复制组件
     *
     * @return $this
     * @author nelsons
     * @time 2023-09-11 15:52:45
     */
    public function copyable(): self
    {
        $this->iterm['copyable'] = true;
        return $this;
    }

    /**
     * 二维码
     *
     * @return $this
     * @author nelsons
     * @time 2023-09-11 15:52:57
     */
    public function qrcode(): self
    {
        $this->type = 'image';
        $this->iterm['qrcode'] = true;
        return $this;
    }

    /**
     * 设置显示图片的大小
     *
     * @param $width
     * @param $height
     * @return $this
     * @author nelsons
     * @time 2023-09-11 15:51:05
     */
    public function image($width, $height): self
    {
        $this->type = 'image';
        $this->iterm['width'] = $width;
        $this->iterm['height'] = $height;
        return $this;
    }

    /**
     * 是否是链接
     *
     * @return $this
     * @author nelsons
     * @time 2023-09-11 15:50:44
     */
    public function link(): self
    {
        $this->type = 'link';
        return $this;
    }

    /**
     * 限制大小
     *
     * @param int $limit
     * @return $this
     * @author nelsons
     * @time 2023-09-11 15:50:36
     */
    public function limit(int $limit): self
    {
        $this->iterm['limit'] = $limit;
        return $this;
    }

    /**
     * 开关
     *
     * @param $states
     * @return $this
     * @author nelsons
     * @time 2023-09-11 16:32:07
     */
    public function switch($states = []): self
    {
        $this->type = 'switch';
        $this->iterm['states'] = $states;
        return $this;
    }

    /**
     * 是否可以编辑
     *
     * @param $url
     * @return $this
     * @author nelsons
     * @time 2023-09-11 16:32:18
     */
    public function editable($url): self
    {
        $this->iterm['editable'] = true;
        $this->iterm['url'] = $url;
        return $this;
    }

    public function render(): array
    {
        $res = [
            'type' => $this->type,
            'name' => $this->name,
            'label' => $this->label,
            'sortable' => $this->sortable,
        ];
        return array_merge($res, $this->iterm);
    }
}