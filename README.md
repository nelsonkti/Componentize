# Componentize

**Componentize** 是一个结合了组件化和模块化的库，可以让您以更高效的方式使用组件和模块来管理和组织代码库。

## Installation

您可以通过 Composer 来安装此库：

```bash
composer require nelsonkti/componentize
```

## Requirements

- PHP >= 7.0

## Usage

要使用此库，只需通过 Composer 安装，然后在代码中导入所需的类。

### Example

```php
use Nelsons\Componentize\Grid;
use Nelsons\Componentize\Form;

$grid = new Grid();
$grid->column('id', 'ID')->sortAble();
$grid->column('name', '商品名称')->copyable();
```

### 筛选器
```php
# 筛选器
$grid->filter(function (Grid\Filter $filter) {
    $filter->checkbox('export_node', '导出节点')->options(array(
                '11' => '不限', '22' => '待分配订单',
        ))->canCheckAll();
    $filter->datetimeRange('order_time', '订单时间')->date()
    $filter->select('order_number2', '订单号2')->options(array(
                '不限', '待分配订单', '已分配订单', '挂起订单', '已催收订单', '催收中订单'
    ));
});
```

### 增删改
```php
# action
$grid->action(function (Grid\Action $action) {
    $action->create('新增员工', function (Form $form) {
        $form->title('新增员工');
        $form->text('name', '用户名称')->required()->default('张三');
        $form->select('nationality', '国籍')->options(['泰国', '香港', '中国'])->default(3);
    })
    $action->delete('删除', function (Form $form) {
       $form->title('删除员工');
    });
});
```

### 导出
```php
# 导出
$grid->export(function (Grid\Export $export) {
   $export->title('导出')->ajax('post:xxxxx')->async();
   $export->checkbox('export_node', '导出节点')->options(array(
    '11' => '不限', '22' => '待分配订单',
    ))->canCheckAll();
    $export->column('order_number', '订单号');
    $export->datetime('创建时间', 'create_time')->format('YYYY-MM-DD');
    $export->fields(function (Grid\Export\Fields $fields) {
        $fields->checkbox('order_number2222', '订单号2')->options(array(
            '不限', '待分配订单', '已分配订单', '挂起订单', '已催收订单', '催收中订单'
        ))->canCheckAll()->default(1);
    });
});
```

### 导入
```php
# 导入
$grid->import(function (Grid\Import $import) {
    $import->ajax('post:xxxx');
    $import->templateFileUrl('post:xxxx');
    $import->select('collection_label', '催收标签')->options(array(
        '自定义', '盲发订单', '盲发订单'
    ));
    $import->select('collection_user_id', '催收员')->options(array(
        '王五', '张六', '刘七'
    ));
});
```


### 统计
```php
# 统计
$grid->panel('statistics_list')->template('xxxxx');
$grid->echarts('order_statistic')->type('line');
```