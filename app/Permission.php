<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Role;

class Permission extends Model
{
    protected $guarded = [];
    protected $casts = [
        'name' => 'array',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
