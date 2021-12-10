<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocType extends Model
{
    use HasFactory;

    protected $fillable = ([
        'type',
    ]);

    public function docs()
    {
        return $this->hasMany(Doc::class);
    }


}
