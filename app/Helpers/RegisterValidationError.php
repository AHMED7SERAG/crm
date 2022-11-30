<?php

namespace App\Helpers;

class RegisterValidationError
{
    /**
     * For check if errors exists in validation errors array
     *
     * @param array $arr
     * @param array $errors
     *
     * @return bool
     */
    public static function displayOrNot($arr, $errors)
    {
        if($errors->count() > 0){
            foreach ($arr as $ar){
                if($errors->has($ar)){
                    return true;
                }
            }
        }
        return false;
    }
}
