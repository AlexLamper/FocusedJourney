<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'plannings';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'user_id', // Assuming each planning belongs to a user
        'title',
        'description',
        'date',
        // Add more attributes as needed
    ];

    // Define any relationships with other models
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
