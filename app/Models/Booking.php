<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_id',
        'remarks',
        'archived',
        'host',
        'password',
        'login',
    ];

    // Een op Veel relaties
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    //Veel op Veel relaties
    public function services()
    {
        return $this->belongsToMany(Service::class, 'booking_service');
    }




}
