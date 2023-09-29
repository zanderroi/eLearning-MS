<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;

    protected $guard = 'teacher';

    protected $fillable = [
        'user_id',
        'id_number',
        'subject',
        'department',
        'program',
        'advisory_year',
        'advisory_section',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
