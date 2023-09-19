<?php
/**
 * 表单
 *
 * @author nelsons
 * @time 2023-09-06 16:05:39
 */

namespace Nelsons\Componentize\Form;

use Nelsons\Componentize\Form;

trait HasForm
{
    /**
     * @var  Form
     */
    public $form;

    public function initForm()
    {
        $this->form = new Form();
    }
}