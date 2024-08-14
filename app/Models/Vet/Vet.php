<?php

namespace App\Models\Vet;

use App\Models\BaseModel;
use App\Models\Scopes\StatusScope;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Vet extends BaseModel
{
    use SoftDeletes;

    protected $table = "vets";

    protected $fillable = [
        "name",
        "position_id",
        "email",
        "address",
        "phone",
        "city",
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function visits()
    {
        return $this->hasMany(Visit::class, "id");
    }

    public function specializations()
    {
        return $this->hasMany(Specialization::class, "id");
    }

    public function prescription()
    {
        return $this->hasManyThrough(Prescription::class, Pet::class);
    }

    public function worktime()
    {
        return $this->morphMany(Worktime::class, "workable");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "id");
    }
}




