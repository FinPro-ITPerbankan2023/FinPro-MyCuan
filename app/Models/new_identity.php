<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class new_identity extends Model
{
    use HasFactory;

    protected $table = 'new_identity';


    protected $fillable = [
        'identity_number'
    ];
}
