<?php

namespace App\Models;

class OperatingSystem extends Model
{
    /**
     * The fillable operating system attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'version',
        'service_pack',
    ];

    /**
     * Returns the full operating system name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return implode(' ', [$this->name, $this->version, $this->service_pack]);
    }
}
