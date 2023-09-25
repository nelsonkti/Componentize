<?php
/**
 * 组件
 *
 * @author nelsons
 * @time 2023-09-22 15:02:17
 */

namespace Nelsons\Componentize\Component;

use Nelsons\Componentize\Grid;

class Component implements ComponentInterface
{
    /**
     * @var Grid
     */
    public $grid;

    public function __construct()
    {
        $this->initGrid();
    }

    private function initGrid()
    {
        $this->grid = new Grid();
    }

    private function getClassName(): string
    {
        return AbstractComponent::class;
    }

    private function getMethods(): array
    {
        $reflectionClass = new \ReflectionClass($this->getClassName());

        return $reflectionClass->getMethods();
    }

    private function run(): Grid
    {
        $className = $this->getClassName();
        foreach ($this->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() === $className) {
                $methodName = $method->getName();
                $this->$methodName();
            }
        }
        return $this->grid;
    }

    public function render(): array
    {
        return $this->run()->render();
    }
}