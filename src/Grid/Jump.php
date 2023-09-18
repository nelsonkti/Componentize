<?php
/**
 * 跳转
 *
 * @author nelsons
 * @time 2023-09-11 10:28:06
 */

namespace Nelsons\Componentize\Grid;

use Nelsons\Componentize\RenderAble;

class Jump extends Url implements RenderAble
{
    const SELF = '_self';
    const BLANK = '_blank';
    const PARENT = '_parent';
    const TOP = '_top';

    protected $type = 'jump_action';
    protected $name;
    protected $label;
    protected $target = '';
    protected $targetArr = [self::SELF, self::BLANK, self::PARENT, self::TOP];

    public function __construct($name, $label)
    {
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * 跳转方式
     *
     * @param $target
     * @return $this
     * @throws \Exception
     * @author 傅增耀
     * @time 2023-09-18 10:10:54
     */
    public function target($target): self
    {
        if (!in_array($target, $this->targetArr)) {
            throw new \Exception('[target] 类型错误');
        }
        $this->target = $target;
        return $this;
    }

    public function render(): array
    {
        $res = [
            'type' => $this->type,
            'name' => $this->name,
            'label' => $this->label,
            'target' => $this->target,
        ];
        return array_merge(parent::render(), $res);
    }
}