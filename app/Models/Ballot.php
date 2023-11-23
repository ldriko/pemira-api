<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ballot extends Model
{
    use HasFactory;

    public function ballotDetails()
    {
        return $this->hasMany(BallotDetail::class);
        
    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'ballot_details');
    }
}

