<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    use HasFactory;

    protected $fillable = ['season_id', 'team_id', 'initial_strength', 'computed_strength'];

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
}
