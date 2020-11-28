<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;
    protected $fillable = ['week', 'season_id'];


    public function season()
    {
        return $this->belongsTo('App\Models\Season');
    }

    public function plays()
    {
        return $this->hasMany('App\Models\Play');
    }

    public function weeklyStandings()
    {
        return $this->hasMany('App\Models\WeeklyStanding');
    }
}
