<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDetail extends Model
{
    use HasFactory;
    protected $table = 'user_detail';

    protected $fillable = [
        'user_id',
        'date_birth',
        'birth_place',
        'street',
        'province',
        'city',
        'district',
        'post_code',
        'phone_number',
    ];
    public function user(): BelongsTo

    {

        return $this->belongsTo(User::class);

    }

}
