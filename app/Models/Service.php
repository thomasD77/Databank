<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'archived',
    ];

    public function servicecategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    //Veel op Veel relaties

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_service');
    }
}
