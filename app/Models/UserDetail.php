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
        'full_name',
        'date_birth',
        'birth_place',
        'street',
        'province',
        'city',
        'district',
        'post_code',
        'account_number',
        'account_name',
        'bank_name',
    ];
    public function user(): BelongsTo

    {

        return $this->belongsTo(User::class);

    }

}
