<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    public function isComplete()
    {
        return "Es completo";
    }

    public function scopeIncomplete($query) // Task::incomplete()
    {
        return $query->where('completed', 0);
    }

    /*public static function incomplete()   // Task::incomplete()
    {
        return static::where('completed', 0)->get();
    }*/
}
