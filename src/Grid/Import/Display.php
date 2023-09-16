<?php
/**
 * 文件描述
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

    public function title($title)
    {
        $this->fields['title'] = $title;
    }

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

        Exception("Field type [$method] does not exists");
    }
}