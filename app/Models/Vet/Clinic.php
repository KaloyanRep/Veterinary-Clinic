<?php

namespace App\Models\Vet;

use App\Casts\TimeCast;
use App\Models\BaseModel;
use App\Models\Scopes\StatusScope;
use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Clinic extends BaseModel
{
    use SoftDeletes;

    protected $table = "clinics";

    protected $dates = [

    ];
    protected $fillable = [
        "id",
        "name",
        "type",
        "address",
    ];

    public function worktime()
    {
        return $this->morphMany(Worktime::class,"workable");
    }

    public function visits()
    {
        return $this->hasMany(Visit::class,"clinic_id");
    }

    public function users()
    {
        return $this->belongsTo(User::class,"id");
    }

    protected $casts = [
        'your_time_to_cast' => TimeCast::class
    ];

}
