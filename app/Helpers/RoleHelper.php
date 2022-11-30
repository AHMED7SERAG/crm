<?php
namespace App\Helpers;


use App\Models\Permission;

class RoleHelper {

    /**
     * get permission object by name
     *
     * @param string $name
     *
     * @returns void
     */
    public static function getPermission($name)
    {
        return Permission::where('name', $name)->first();
    }

}

