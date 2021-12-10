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

    public function docType()
    {
        return $this->belongsTo(DocType::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
