<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

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
        return $this->belongsTo(User::class);
    }
}
