<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function Child()
    {
        return $this->hasMany(Event::class, 'parent_id')->orderBy('parent_id');
    }

    public function timeline()
    {
        return $this->belongsTo(Timeline::class);
    }
}
