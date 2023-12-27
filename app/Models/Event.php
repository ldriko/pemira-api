<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'logo',
        'open_election_at',
        'close_election_at',
    ];

    public function divisions()
    {
        return $this->hasMany(Division::class);
    }

    public function ballots()
    {
        return $this->hasMany(Ballot::class);
    }

    public function acceptedBallots()
    {
        return $this->ballots()->where('accepted', 1);
    }
}
