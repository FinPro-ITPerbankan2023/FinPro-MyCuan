<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $table = 'user_details';
    protected $fillable = [
        'user_id',
        'full_name',
        'number_identity',
        'date_birth',
        'birth_place',
        'street',
        'province',
        'city',
        'district',
        'zip_code',
        'account_number',
        'account_name',
        'bank_name',
    ];

    public function user() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
