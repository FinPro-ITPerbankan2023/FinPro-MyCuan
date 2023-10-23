<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Business extends Model
{
    use HasFactory;

    protected $table = 'business';

    protected $fillable = [
        'user_id',
        'business_name',
        'field_of_business',
        'business_ownership',
        'business_duration',
        'income_avg',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
