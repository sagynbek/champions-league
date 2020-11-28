<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Play extends Model
{
    use HasFactory;

    public function team1()
    {
        return $this->belongsTo('App\Models\Team', 'team1_id', 'id');
    }

    public function team2()
    {
        return $this->belongsTo('App\Models\Team', 'team2_id', 'id');
    }
}
