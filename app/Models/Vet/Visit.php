<?php

namespace App\Models\Vet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Visit extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "visits";

    protected $fillable = [
        "vet_id",
        "pet_id",
        "arrived_at",
        "total_amount",
        "diagnose",
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'arrived_at',
        'deleted_at',
    ];

    public function pets()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
    }

    public function clinics()
    {
        return $this->belongsTo(Clinic::class, "clinic_id");
    }

    public function vet()
    {
        return $this->belongsTo(Vet::class, 'vet_id');
    }
}
