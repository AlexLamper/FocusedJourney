<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'priority',
        'timestamp',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
