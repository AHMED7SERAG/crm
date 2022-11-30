<?php

namespace App\Traits;

trait ModelBasics {

    /**
     * Set your events here
     */
//    public static function boot() {
//        parent::boot();
//
//        self::retrieved(function($model) {
//            if (isset($model->langFields)) {
//                foreach ($model->langFields as $f) {
//                    // Add the custom field as model field
//                    $model->appends[] = $f;
//                    // Set custom field value based on language
//                    $model->$f = $model[$f . '_' . \App::getLocale()];
//                    // To prevent update of custom fields
//                    $model->original[$f] = $model->$f;
//                }
//            }
//        });
//    }

    /**
     * Returns validation messages
     * @return Array
     */
    public static function getMessages($override = []) {
        return [];
    }

    /**
     * Returns validation rules
     * @return Array
     */
    public static function getRules($override = []) {
        return [];
    }

}
