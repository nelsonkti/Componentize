<?php
/**
 * 行动类
 *
 * @author nelsons
 * @time 2023-09-06 12:23:04
 */

namespace Nelsons\Componentize\Grid;

class Action
{
    protected $id = '';
    protected $templateId;
    protected $disable;
    protected $actions = [];
    protected $iterm = [];

    public function Id(string $rule)
    {
        $this->id = $rule;
    }

    /**
     * 新增
     *
     * @param $label
     * @param \Closure $callback
     * @return BaseAction
     * @author nelsons
     * @time 2023-09-11 10:13:40
     */
    public function create($label, \Closure $callback): BaseAction
    {
        return $this->operate('create', $label, $callback);
    }

    /**
     * 编辑
     *
     * @param $name
     * @param \Closure $callback
     * @return BaseAction
     * @author nelsons
     * @time 2023-09-11 17:56:58
     */
    public function edit($label, \Closure $callback): BaseAction
    {
        return $this->operate('edit', $label, $callback);
    }

    /**
     * 删除
     *
     * @param $label
     * @param \Closure $callback
     * @return $this
     * @author nelsons
     * @time 2023-09-11 10:14:01
     */
    public function delete($label, \Closure $callback): BaseAction
    {
        return $this->operate('delete', $label, $callback);
    }

    /**
     * 跳转
     *
     * @param $label
     * @return Jump
     * @author nelsons
     * @time 2023-09-11 11:45:30
     */
    public function jump($label): Jump
    {
        $jump = new Jump('jump', $label);
        $this->actions[] = $jump;
        return $jump;
    }

    /**
     * 下载
     *
     * @param $label
     * @return Download
     * @author nelsons
     * @time 2023-09-11 11:45:15
     */
    public function download($label): Download
    {
        $download = new Download('download', $label);
        $this->actions[] = $download;
        return $download;
    }

    /**
     * 开关
     *
     * @param $column
     * @param string $label
     * @return SwitchField
     * @author nelsons
     * @time 2023-09-13 16:38:14
     */
    public function switch($column, string $label = ''): SwitchField
    {
        $switch = new SwitchField($column, $label);

        $this->actions[] = $switch;
        return $switch;
    }


    /**
     * 操作类型
     *
     * @param $type
     * @param $label
     * @param \Closure $callback
     * @return BaseAction
     * @author nelsons
     * @time 2023-09-11 10:14:15
     */
    private function operate($name, $label, \Closure $callback): BaseAction
    {
        $type = "{$name}_action";

        $baseAction = new BaseAction($type, $name, $label);
        $baseAction->form($callback);
        $this->actions[] = $baseAction;
        return $baseAction;
    }

    public function render(): array
    {
        $newAction = [];
        foreach ($this->actions as $v) {
            $newAction[] = $v->render();
        }

        $res['actions'] = $newAction;
        $res['id'] = $this->id;

        return $res;
    }
}