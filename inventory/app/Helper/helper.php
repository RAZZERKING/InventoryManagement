<?php

namespace App\Helper;

class Helper
{
    public static function IdGenerator($model, $trow, $length = 4, $prefix)
    {
        $data = $model::orderBy('kode_barang', 'desc')->first();
        if (!$data) {
            $og_length = $length;
            $last_num = '';
        } else {
            $code = substr($data->$trow, strlen($prefix) + 1);
            $actial_last_number = ($code / 1) * 1;
            $increment_last_number = $actial_last_number + 1;
            $last_num_length = strlen($increment_last_number);
            $og_length = $length - $last_num_length;
            $last_num = $increment_last_number;
        }
        $zeros = "";
        for ($i = 0; $i < $og_length; $i++) {
            $zeros .= "0";
        }
        return $prefix . '-' . $zeros . $last_num;
    }
}
