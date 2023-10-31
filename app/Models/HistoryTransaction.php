<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoryTransaction extends Model
{
    use HasFactory;

    protected $table = 'history_transactions';

    protected $fillable = [
      'user_id',
      'loan_id',
      'total_amount_transaction',
      'transcation_date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
