<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable= [
        'name',
        'email',
        'phone',
        'attendee_id',
        'date',
    ];
    public function attendee(){
        return $this->belongsTo(Attendee::class);
    }
}
