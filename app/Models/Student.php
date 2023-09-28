<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $guard = 'student';

    protected $fillable = [
        'user_id',
        'grade',
        'section',
        'lrn',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
