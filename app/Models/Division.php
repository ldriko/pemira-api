<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'event_id',
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
}
