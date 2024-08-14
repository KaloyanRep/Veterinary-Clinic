<?php

namespace App\Models\Vet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialization extends Model
{
    use SoftDeletes;

    protected $table = "specializations";

    protected $fillable = [
        "vet_id",
        "specie_id",
    ];

    public function vets()
    {
        return $this->belongsTo(Vet::class,"id");
    }

    public function species()
    {
        return $this->belongsTo(Specie::class,"id");
    }


}
