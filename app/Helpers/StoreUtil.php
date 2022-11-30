<?php
namespace App\Helpers;


use App\Models\ShopUsersRatings;

class StoreUtil {


    /**
     * for get all stars count
     *
     * @param $id
     * @return array
     */
    static function ratingBar($id)
    {
        $rates = [];
        $rates['1'] = ShopUsersRatings::where('shop', $id)->where('rate', 1)->count();
        $rates['2'] = ShopUsersRatings::where('shop', $id)->where('rate', 2)->count();
        $rates['3'] = ShopUsersRatings::where('shop', $id)->where('rate', 3)->count();
        $rates['4'] = ShopUsersRatings::where('shop', $id)->where('rate', 4)->count();
        $rates['5'] = ShopUsersRatings::where('shop', $id)->where('rate', 5)->count();
        return $rates;
    }
}

