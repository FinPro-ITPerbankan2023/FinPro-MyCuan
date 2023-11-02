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
    ];

    public function user(): BelongsTo

    {
        return $this->belongsTo(User::class);
    }
}
