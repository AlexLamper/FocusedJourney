<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todo';

    protected $fillable = [
        'name',
        'description',
        'priority',
        'due_date',
        'status',
    ];

    /**
     * Define the inverse of the relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
