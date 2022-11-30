<?php

namespace App\Traits;

trait FormTrait
{
    public function formTrait(string $route_name, int $id, string $method, $icon = '')
    {
        $btn = '<form action=' . route($route_name, $id) . ' class="my-1 my-xl-0" method="POST" style="display: inline-block;">';
        $btn .= '<input name="_method" type="hidden" value=' . $method .'><input name="_token" type="hidden" value="' . csrf_token() . '">';
        $btn .= '<button type="submit" class="btn btn-jinja  btn-sm ml-1 mr-1">'. $icon .'</button>';
        $btn .= '</form>';
        return $btn;
    }
}
