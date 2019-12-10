<?php

namespace App\Helpers;

use App\UserCategory;

class VendorHelper
{

    /**
     * @param $text
     * @return mixed
     */
    public static function getVendorCategories()
    {
        $category_ids = UserCategory::select('category_id')
            ->where('user_id', auth()->user()->id)
            ->get()
            ->pluck('category_id')
            ->toArray();
        return $category_ids;
    }
}