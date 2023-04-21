<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'email',
    ];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
}
