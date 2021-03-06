<?php

namespace App\Models;

use Larapacks\Authorization\Traits\RolePermissionsTrait;

class Role extends Model
{
    use RolePermissionsTrait;

    /**
     * The fillable role attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'label',
    ];

    /**
     * Returns an HTML display label for the current role.
     *
     * @return string
     */
    public function getDisplayLabelAttribute()
    {
        return sprintf('<span class="label label-primary"><i class="fa fa-users"></i> %s</span>', $this->label);
    }
}
