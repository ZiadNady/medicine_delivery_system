<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'pharmacy_id',
        'name',
        'address',
    ];

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }
}
