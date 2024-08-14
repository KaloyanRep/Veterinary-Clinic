<?php

namespace App\Models\Vet;

use App\Models\BaseModel;
use App\Models\Scopes\StatusScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory; //ima go
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Owner extends BaseModel
{
    use SoftDeletes;
    use HasFactory;

    protected $table = "owners";

    protected $fillable = [
        "name",
        "address",
        "email",
        "phone",
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class,"owner_id");
    }

    public function prescriptions()
    {
        return $this->hasManyThrough(Prescription::class,Pet::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class,"id");
    }

    public function clinics()
    {
     return $this->hasManyThrough(Clinic::class,Visit::class);
    }

    public function vets()
    {
        return $this->hasOne(Vet::class,"id");
    }

}
