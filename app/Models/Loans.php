<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Loans extends Model
{
    use HasFactory;

    protected $table = 'loans';

    protected $fillable = [
        'user_id',
        'loan_status',
        'amount',
        'loan_duration',
        'application_date',
        'approval_date',
        'denied_date',
        'loan_purpose'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($loan) {
            // Check if loan_status is changing from 'Pending' to 'Approved'
            if ($loan->isDirty('loan_status') && $loan->loan_status === 'Approved') {
                // Update approval_date with the current timestamp
                $loan->approval_date = DB::raw('CURRENT_TIMESTAMP');
            }

            // Check if loan_status is changing from 'Pending' to 'Rejected'
            if ($loan->isDirty('loan_status') && $loan->loan_status === 'Rejected') {
                // Update denied_date with the current timestamp
                $loan->denied_date = DB::raw('CURRENT_TIMESTAMP');
            }

            // Check if loan_status is changing from 'Approved' to 'Rejected'
            if ($loan->isDirty('loan_status') && $loan->getOriginal('loan_status') === 'Approved' && $loan->loan_status === 'Rejected') {
                // Move approval_date to denied_date
                $loan->denied_date = $loan->approval_date;
                $loan->approval_date = null;
            }

            // Check if loan_status is changing from 'Rejected' to 'Approved'
            if ($loan->isDirty('loan_status') && $loan->getOriginal('loan_status') === 'Rejected' && $loan->loan_status === 'Approved') {
                // Move denied_date to approval_date
                $loan->approval_date = $loan->denied_date;
                $loan->denied_date = null;
            }
            if ($loan->isDirty('loan_status') && $loan->loan_status === 'Pending') {
                // Set both approval_date and denied_date to null
                $loan->approval_date = null;
                $loan->denied_date = null;
            }
        });
    }
}
