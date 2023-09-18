<?php
/**
 * 显示组件
 *
 * @author nelsons
 * @time 2023-09-14 16:34:58
 */

namespace Nelsons\Componentize\Grid\Import;

/**
 * Class Import.
 *
 * @method Column    column($column, $label = '')
 */
class Display
{
    use HasDisplay;

    protected $columns = [];
    protected $fields = [];

    public static $fieldClassMap = [
        'column' => Column::class,
    ];

    /**
     * 标题
     *
     * @param $title
     * @return void
     * @author 傅增耀
     * @time 2023-09-18 10:06:52
     */
    public function title($title)
    {
        $this->fields['title'] = $title;
    }

    /**
     * 消息描述
     *
     * @param $column
     * @return void
     * @author 傅增耀
     * @time 2023-09-18 10:02:59
     */
    public function message($column)
    {
        $this->fields['message'] = $column;
    }

    public function download($column, $label = '导出结果')
    {
        $this->fields['download'] = [
            'column' => $column,
            'label' => $label,
        ];
    }


    public function render()
    {
        foreach ($this->columns as $v) {
            $this->fields['columns'][] = $v->render();
        }

        return $this->fields;
    }

    /**
     * 获取字段类
     *
     * @param $method
     * @return string|null
     * @author nelsons
     * @time 2023-09-06 15:42:59
     */
    public static function findClass($method)
    {
        if (isset(self::$fieldClassMap[$method]) && class_exists(self::$fieldClassMap[$method])) {
            return self::$fieldClassMap[$method];
        }
        return null;
    }

    public function __call($method, $arguments)
    {
        if ($className = static::findClass($method)) {
            $column = $arguments[0] ?? '';
            $element = new $className($column, array_slice($arguments, 1));
            $this->columns[] = $element;
            return $element;
        }

        throw new \Exception("Field type [$method] does not exists");
    }
}