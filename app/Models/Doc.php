<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    use HasFactory;

    protected $fillable = ([
        'type',
        'description',
        'client_id'
    ]);

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
