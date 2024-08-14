<?php

namespace App\Models\Vet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use SoftDeletes;

    protected $table = "prescriptions";

    protected $fillable = [
        "vet_id",
        "owner_id",
    ];

    public function visits()
    {
        return $this->belongsTo(Visit::class,"visit_id");
    }

    public function pets()
    {
        return $this->belongsTo(Pet::class,"pet_id");
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class,"owner_id");
    }

    public function vets()
    {
        return $this->belongsTo(Vet::class,"vet_id");
    }

}
