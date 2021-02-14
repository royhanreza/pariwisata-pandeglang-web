<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    use HasFactory;

    public function vehicles()
    {
        $this->hasMany(Vehicle::class);
    }
}
