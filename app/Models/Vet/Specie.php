<?php

namespace App\Models\Vet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specie extends Model
{
    use SoftDeletes;

    protected $table = "species";

    protected $fillable = [
        "name"
    ];

    public function pets()
    {
        return $this->belongsTo(Pet::class,"id");
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class,"id");
    }

}
