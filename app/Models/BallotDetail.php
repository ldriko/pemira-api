<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BallotDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'ballot_details';
}
