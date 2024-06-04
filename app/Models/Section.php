<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
