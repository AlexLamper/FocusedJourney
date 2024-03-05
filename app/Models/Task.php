<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'priority',
        'timestamp',
    ];

    /**
     * Define the inverse of the relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
