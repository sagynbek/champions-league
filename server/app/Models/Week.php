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
        return $this->hasMany('App\Models\WeeklyStanding')->orderBy('points', 'desc');
    }

    public function previousWeek()
    {
        return Week::where('week', $this->week - 1)->where('season_id', $this->season_id)->first();
    }
}
