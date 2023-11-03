<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserIdentity extends Model
{
    use HasFactory;
    protected $table = 'user_identity';
    protected $fillable = [
        'user_id',
        'identity_number',
        'identity_image',
        'selfie_image',
    ];

    public function user(): BelongsTo

    {

        return $this->belongsTo(User::class);

    }
}
