<?php

namespace App\Models\Vet;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worktime extends Model
{
    use SoftDeletes;

    protected $table = "work_times";

    protected $fillable = [
        "day_of_week",
        "timeTo",
        "timeFrom",
    ];

    public function workable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo('workable');
    }

    // Add your accessors for timeFrom
    public function getTimeFromAttribute($value)
    {
        try {
            return $value ? Carbon::createFromFormat('H:i:s', $value)->format('H:i') : null;
        } catch (\Exception $e) {
            // Optionally log the error or handle it as needed
            return $value;  // Return the original value if there's a format issue
        }
    }

    public function getTimeToAttribute($value)
    {
        try {
            return $value ? Carbon::createFromFormat('H:i:s', $value)->format('H:i') : null;
        } catch (\Exception $e) {
            // Optionally log the error or handle it as needed
            return $value;  // Return the original value if there's a format issue
        }
    }
}

