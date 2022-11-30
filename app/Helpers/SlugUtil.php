<?php
namespace App\Helpers;


use Illuminate\Support\Str;

class SlugUtil {

    /**
     * @param $model
     * @param $title
     * @param int $id
     * @return string
     */
    public static function createSlug($model, $title, $id = 0)
    {
        $slug = Str::slug($title);
        $allSlugs = self::getRelatedSlugs($model, $slug, $id);
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
    }

    /**
     * @param $model
     * @param $slug
     * @param int $id
     * @return mixed
     */
    public static function getRelatedSlugs($model, $slug, $id = 0)
    {
        $model = '\App\Models\\' . $model;
        return $model::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }


}

