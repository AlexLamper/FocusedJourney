<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodaysFocus extends Model
{
    protected $table = 'todays_focus';

    protected $fillable = [
        'text',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
