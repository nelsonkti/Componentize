<?php
/**
 * 组件
 *
 * @author nelsons
 * @time 2023-09-22 15:02:17
 */

namespace Nelsons\Componentize\Common;

use Nelsons\Componentize\Grid;

class Component implements ComponentInterface
{
    /**
     * @var Grid
     */
    public $grid;

    private $layout = ['list', 'action', 'filter', 'export', 'import'];


    public function __construct()
    {
        $this->initGrid();
    }

    private function initGrid()
    {
        $this->grid = new Grid();
    }

    private function methodExists($method): bool
    {
        return method_exists($this, $method);
    }

    private function run(): Grid
    {
        foreach ($this->layout as $func) {
            if (!$this->methodExists($func)) {
                continue;
            }
            $this->$func();
        }
        return $this->grid;
    }

    public function render(): array
    {
        return $this->run()->render();
    }
}