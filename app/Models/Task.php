<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task',
        'user_id',
        'status',
    ];
    
    // protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
