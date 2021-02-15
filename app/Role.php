<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permission;

class Role extends Model
{
    protected $guarded = [];

    public function permission()
    {
        return $this->hasOne(Permission::class);
    }
}
