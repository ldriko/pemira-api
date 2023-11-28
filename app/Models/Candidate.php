<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'division_id',
        'first',
        'second',
        'vision',
        'mission',
        'order'

    ];

    public function ballots()
    {
        return $this->belongsToMany(Ballot::class, 'ballot_details');
    }
}
