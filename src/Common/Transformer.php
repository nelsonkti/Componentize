<?php

/**
 * 变换格式
 *
 * @author nelsons
 * @time 2023-09-11 09:16:59
 */

namespace Nelsons\Componentize\Common;

trait Transformer
{
    /**
     * options转Label
     *
     * @param array $data
     * @return array
     * @author nelsons
     * @time 2023-09-11 09:31:31
     */
    protected function optionsToLabel(array $data): array
    {
        if (isset($data[0]) && is_array($data[0]) && array_key_exists('label', $data[0])) {
            return $data;
        }

        $res = [];
        foreach ($data as $k => $v) {
            $res[] = [
                'label' => $v,
                'value' => $k,
            ];
        }

        return $res;
    }
}