<?php
/**
 * 下载
 *
 * @author nelsons
 * @time 2023-09-11 11:30:27
 */

namespace Nelsons\Componentize\Grid;

class Download extends Url
{
    protected $type = 'download_action';
    protected $name;
    protected $label;
    protected $downloadable = true;

    public function __construct($name, $label)
    {
        $this->name = $name;
        $this->label = $label;
    }

    public function render(): array
    {
        $res = [
            'type' => $this->type,
            'name' => $this->name,
            'label' => $this->label,
            'downloadable' => $this->downloadable,
        ];
        return array_merge(parent::render(), $res);
    }
}