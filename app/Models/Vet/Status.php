<?php

namespace App\Models\Vet;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;



class Status extends Model
{
    const STATUS_ACTIVE = "active";

    const STATUS_INACTIVE = "inactive";

      protected $table = "clinic_statuses";

      protected $fillable = [
          "id",
          "name",

      ];

      public function users(){
          return $this->belongsTo(User::class,"id");
      }

}
