<?php
/**
 * 文件描述
 *
 * @author nelsons
 * @time 2023-09-12 16:39:10
 */

namespace Nelsons\Componentize\Grid;

use Nelsons\Componentize\Form\HasForm;

class BaseAction
{
    use HasForm;

    protected $name = '';
    protected $type = '';
    protected $label = '';
    protected $fields = [];

    public function __construct($type, $name, $label)
    {
        $this->initForm();
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * 模板
     *
     * @param $template_id
     * @return void
     * @author nelsons
     * @time 2023-09-06 17:49:50
     */
    public function template($template_id): self
    {
        $this->fields['template_id'] = $template_id;
        return $this;
    }

    /**
     * 是否禁用
     *
     * @param $rule
     * @return $this
     * @author nelsons
     * @time 2023-09-11 17:58:48
     */
    public function disable($rule): self
    {
        $this->fields['disable'] = $rule;
        return $this;
    }

    /**
     * 请求
     *
     * @param $url
     * @return $this
     * @author nelsons
     * @time 2023-09-12 17:32:04
     */
    public function ajax($url): self
    {
        $this->fields['url'] = $url;
        return $this;
    }

    /**
     * 表单
     *
     * @param $callback
     * @return void
     * @author nelsons
     * @time 2023-09-12 17:30:58
     */
    public function form($callback)
    {
        call_user_func($callback, $this->form);
    }



    public function render(): array
    {
        $res = [
            'type' => $this->type,
            'name' => $this->name,
            'label' => $this->label,
        ];

        $res = array_merge($res, $this->fields);
        $res['form'] = $this->form->render();
        return $res;
    }

}