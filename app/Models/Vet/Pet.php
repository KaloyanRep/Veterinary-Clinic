<?php

namespace App\Models\Vet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use SoftDeletes;

    protected $table="pets";

    protected $fillable = [
        "name",
        "owner_id",
        "color",
        "gender",
        "neutered",
    ];

    public function species()
    {
        return $this->hasMany(Specie::class,"pet_id");
    }

    public function owner()
    {
        return $this->hasOne(Owner::class,"owner_id");
    }

    public function visits()
    {
        return $this->hasMany(Visit::class,"pet_id");
    }

    public function vets()
    {
        return $this->hasOne(Vet::class,"pet_id");
    }

    public function prescrioptions()
    {
        return $this->belongsTo(Prescription::class,"owner_id");
    }
}
