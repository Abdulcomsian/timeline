<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLineInvitePeople extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function timeline()
    {
        return $this->belongsTo(TimeLine::class,'time_line_id','id');
    }
}
