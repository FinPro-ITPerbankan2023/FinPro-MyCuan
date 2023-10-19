<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'date_birth',
        'address',
        'phone_number',
        'mother_maiden',
        'user_identity',
    ];
}
