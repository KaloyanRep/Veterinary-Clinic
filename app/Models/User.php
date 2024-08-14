<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use app\Models\Vet\Clinic;
use app\Models\Vet\Pet;
use app\Models\Vet\Vet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function vets()
    {
          return $this->hasOne(Vet::class,"id");
    }

    public function clinics()
    {
        return $this->hasMany(Clinic::class,"id");
    }

    public function pets()
    {
        return $this->hasMany(Pet::class,"id");
    }

    protected function firstName()
    {
        return Attribute::make(
          get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value)
        );
    }

}
