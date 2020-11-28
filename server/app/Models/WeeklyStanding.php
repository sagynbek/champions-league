<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyStanding extends Model
{
    use HasFactory;
    protected $fillable = ['week_id', 'team_id'];

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
}
