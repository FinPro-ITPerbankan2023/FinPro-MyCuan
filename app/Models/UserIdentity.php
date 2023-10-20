<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIdentity extends Model
{
    use HasFactory;
    protected $table = 'user_identity';
    protected $primaryKey = "id";

    protected $fillable = [
        'user_id',
        'identity_type',
        'identity_number',
    ];
}
