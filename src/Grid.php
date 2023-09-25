<?php
/**
 * 布局
 *
 * @author nelsons
 * @time 2023-09-02 15:39:20
 */

namespace Nelsons\Componentize;

use Nelsons\Componentize\Grid\Column;
use Nelsons\Componentize\Grid\Echarts;
use Nelsons\Componentize\Grid\HasAction;
use Nelsons\Componentize\Grid\HasExport;
use Nelsons\Componentize\Grid\HasFilter;
use Nelsons\Componentize\Grid\HasImport;
use Nelsons\Componentize\Grid\Panel;

class Grid
{
    use HasFilter, HasAction, HasExport, HasImport;

    public function __construct()
    {
        $this->initFilter()->initAction()->initExport()->initImport();
    }

    protected $columns = [];

    protected $grid = [];

    protected $fields = [];

    public function ajax(string $url)
    {
        $this->fields['url'] = $url;
    }

    /**
     * 列表提示
     *
     * @param $name
     * @author nelsons
     * @time 2023-09-22 14:54:43
     */
    public function message($name)
    {
        $this->fields['list-message'] = $name;
    }

    /**
     * 字段
     *
     * @param $name
     * @param string $label
     * @return Column
     * @author nelsons
     * @time 2023-09-02 16:44:25
     */
    public function column($name, string $label = ''): Column
    {
        $column = new Column($name, $label);
        $this->columns[] = $column;
        return $column;
    }

    /**
     * 面板
     *
     * @param $name
     * @param string $label
     * @return Panel
     * @author nelsons
     * @time 2023-09-15 16:37:36
     */
    public function panel($name, string $label = ''): panel
    {
        $column = new Panel($name, $label);
        $this->columns[] = $column;
        return $column;
    }

    /**
     * 图标
     *
     * @param $name
     * @param string $label
     * @return Echarts
     * @author nelsons
     * @time 2023-09-15 17:03:08
     */
    public function echarts($name, string $label = ''): Echarts
    {
        $column = new Echarts($name, $label);
        $this->columns[] = $column;
        return $column;
    }

    /**
     * 筛选
     *
     * @param \Closure $callback
     * @return void
     * @author nelsons
     * @time 2023-09-08 16:25:02
     */
    public function filter(\Closure $callback)
    {
        call_user_func($callback, $this->filter);
        $this->setGird('filter', $this->filter);
    }

    /**
     * 导出
     *
     * @param \Closure $callback
     * @return void
     * @author nelsons
     * @time 2023-09-08 16:25:23
     */
    public function export(\Closure $callback)
    {
        call_user_func($callback, $this->export);
        $this->setGird('export', $this->export);
    }

    /**
     * 导入
     *
     * @param \Closure $callback
     * @return void
     * @author nelsons
     * @time 2023-09-08 16:25:23
     */
    public function import(\Closure $callback)
    {
        call_user_func($callback, $this->import);
        $this->setGird('import', $this->import);
    }


    /**
     * 动作
     *
     * @param \Closure $callback
     * @return void
     * @author nelsons
     * @time 2023-09-08 16:25:33
     */
    public function action(\Closure $callback)
    {
        call_user_func($callback, $this->action);
        $this->setGird('action', $this->action);
    }

    /**
     * 页面选项卡组件
     *
     * @param array $pages
     * @return void
     * @author nelsons
     * @time 2023-09-25 10:25:55
     */
    public function tabPages(array $pages)
    {
        $this->fields['tab-pages'] = $pages;
    }

    /**
     * 存入gird
     *
     * @param $name
     * @param $value
     * @return void
     * @author nelsons
     * @time 2023-09-08 16:26:03
     */
    private function setGird($name, $value)
    {
        $this->grid[$name] = $value;
    }


    /**
     * 判断是否存在
     *
     * @param $object
     * @return bool
     * @author nelsons
     * @time 2023-09-06 16:51:27
     */
    private function hasRender($object): bool
    {
        return method_exists($object, 'render');
    }

    /**
     * 字段
     *
     * @return void
     * @author nelsons
     * @time 2023-09-25 10:13:59
     */
    public function renderColumn()
    {
        foreach ($this->columns as $column) {
            $this->fields['list'][] = $column->render();
        }
    }

    /**
     * 提供
     *
     * @return array
     * @author nelsons
     * @time 2023-09-02 17:13:23
     */
    public function render()
    {
        $this->renderColumn();

        foreach ($this->grid as $k => $item) {
            if (!$this->hasRender($item)) {
                $this->fields[$k][] = $item;
                continue;
            }
            $this->fields[$k][] = $item->render();
        }

        return $this->fields;
    }

}