<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected static function booted(): void
    {
//        static::addGlobalScope('status', function (Builder $builder) {
//           $builder->where('active',true);
//        });
    }
}
