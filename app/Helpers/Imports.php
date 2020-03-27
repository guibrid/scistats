<?php

namespace App\Helpers\Imports;

use App\Product;

class Import
{
    /**
     * Delete non numeric caracter and replace ',' by '.'
     *
     * @return string
     */
    public static function cleanNumber(string $string)
    {
        $data = preg_replace("/[^0-9,.]/", "",  str_replace(',', '.', $string));
        return $data;
    }

    /**
     * Get product details by code product
     *
     * @return string
     */
    public static function getProduct(string $code)
    {
        $product = Product::where('code', $code)->first();
        return $product;
    }
}