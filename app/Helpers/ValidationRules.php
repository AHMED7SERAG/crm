<?php

namespace App\Helpers;

class ValidationRules {
    /*
     * @params $arr = ['title', 'description']/array of custom rules ex, $custom_rules=['name'=>max:50,'desc'=>max:50]
     * @return $validation_rules = ['title_' . app()->getLocale() => 'required_without_all:' . $title_rule|max:50,
      'description_' . app()->getLocale() => 'required_without_all:' . $description_rule|max:50]
     */

    public static function getValidation($arr, $custom_rules) {
        $languages = \App\Models\Language::select('code', 'name', 'id')->get();
        $validation_rules = [];
        foreach ($arr as $item) {
            $item_lang = [];
            foreach ($languages as $langu) {
                if ($langu->code != app()->getLocale()) {
                    $item_lang[] = $item . '_' . $langu->code;
                    $validation_rules[$item . '_' . $langu->code] = 'nullable'. $custom_rules[$item];
                }
            }
            $validation_rules[$item . '_' . app()->getLocale()] = 'required_without_all:' . implode(',', $item_lang). $custom_rules[$item];
        }
        return $validation_rules;
    }

    /*
     * @params $arr = ['title', 'description']/$rules_array=['shop_name'=>'max:50','description'=>'max:50']
     * @return $validation_rules = ['title_ar' => 'max:50','title_en' => 'max:50','description_ar' => 'max:50','description_ar' => 'max:50']
     */

    public static function getCutomValidation($arr, $rules_array) {
        $languages = \App\Models\Language::select('code', 'name', 'id')->get();
        $validation_rules = [];
        foreach ($arr as $item) {
            foreach ($languages as $langu) {
                if ($langu->code != app()->getLocale()) {
                    $validation_rules[$item . '_' . $langu->code] = $rules_array[$item];
                }
            }
        }
        return $validation_rules;
    }

}
