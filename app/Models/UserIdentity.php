<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIdentity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'identity_type',
        'identity_number',
        'identity_image',
        'selfie_image',
    ];
    public function userDetail() : \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(UserDetail::class,'user_id','user_identity');
    }
}
