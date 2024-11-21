<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;
    protected $fillable= [
        'name', 'details'
    ];

    public function attendee(){
        return $this->hasMany(Attendee::class);
    }
}
